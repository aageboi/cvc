<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Facebook.php';

class Facebook extends CI_Controller {

    public $fbuser;
    public $view = 'auth/';

    public function __construct ()
    {
        parent::__construct();

        if (session('userid'))
            redirect('user');

        // $this->load->library('Facebook');

        $this->config->load('socmed');
        $this->cfg   = $this->config->item('facebook');

        $this->facebook = new FacebookApi(array(
            'appId' => $this->cfg['api_key'],
            'secret' => $this->cfg['secret_key']
        ));

        $config_login = array(
            'app_id'  => $this->cfg['api_key'],
            'req_perms' => 'publish_stream,status_update,email',
            'redirect_uri' => site_url('auth/facebook/callback'),
        );

        $this->login_url = $this->facebook->getLoginUrl($config_login);

        $this->logout_url = $this->facebook->getLogoutUrl();

    }

    public function index ()
    {
        $user = $this->facebook->getUser();
        // debug($_SESSION, 1);
        if ($user) {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $this->fbuser = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $this->fbuser = null;
            }
        }

        if ($this->fbuser) {
            $this->callback();
        } else {
            header("Location: ".$this->login_url);
        }
    }

    public function callback ()
    {
        $this->load->model('usersocmed_model','user_socmed');

        // kalau gak ada session fb_appId_access_token, ambil lagi token dari fb
        $token_key = 'fb_'.$this->cfg['api_key'].'_access_token';
        if (! isset($_SESSION[$token_key]))
            $this->get_token();

        $param_user = array(
            'id' => $this->fbuser['id'],
            'socmed' => 'facebook'
        );

        // check id exists? if no, registration
        if ($user_socmed = $this->user_socmed->get_by($param_user)) {

            $data = array(
                'access_token'  => $_SESSION[$token_key],
                'expires_in'    => time(),
                'userid'       => $user_socmed->userid,
                'socmed'        => 'facebook',
            );

            if ($this->user_socmed->update($this->fbuser['id'], $data)) {

                // check on m_users table
                $this->load->model('user_model', 'user');
                if ($_user = $this->user->get($user_socmed->userid)) {
                    set_message('Hai, '.$_user->username.'!');
                    set_session('userid', $_user->id);
                    set_session('username', $_user->username);
                    redirect('cv');
                }
            } else {
                set_message('Gagal menyimpan data.','error');
            }
        } else {

            if (! isset($this->fbuser['email']) || empty($this->fbuser['email']))
                header("Location: ".$this->login_url);

            $data_token = new stdClass();
            $data_token->access_token = $_SESSION['fb_'.$this->cfg['api_key'].'_access_token'];
            $data_token->expires_in = 7200;

            $data_session = array(
                'id'            => $this->fbuser['id'],
                'email'         => $this->fbuser['email'],
                'data_token'    => $data_token,
                'socmed'        => 'facebook',
            );

            $this->session->set_userdata($data_session);
            redirect('auth/register');

        }
    }

    public function get_token ()
    {
        $token_key = 'fb_'.$this->cfg['api_key'].'_access_token';
        if ($this->input->get('code')) {
            $get_token_url = "https://graph.facebook.com/oauth/access_token?".
                "client_id={$this->cfg['api_key']}".
                "&redirect_uri=".site_url('auth/facebook/callback').
                "&client_secret={$this->cfg['secret_key']}".
                "&code={$this->input->get('code')}";
            $_fbdata = get_response('GET', $get_token_url);
            $fbdata = json_decode($_fbdata);
            if (! isset($fbdata->error)) {
                parse_str($_fbdata, $token);
                $_SESSION[$token_key] = $token['access_token'];
                $_SESSION['expires'] = $token['expires'];

                $get_data_url = "https://graph.facebook.com/me?".
                    "access_token=".$token['access_token'];
                $fbuser = get_response('GET', $get_data_url);
                $this->fbuser = json_decode($fbuser, TRUE);

                return $this->fbuser;
            } else {
                set_message($fbdata->error->message, 'error');
                redirect('auth');
            }
        } else {
            set_message('Terjadi kesalahan otentikasi akun facebook Anda. Silakan coba lagi.', 'error');
            redirect('auth');
        }
    }

    public function disconnect ()
    {
        header("Location: ".$this->facebook->getLogoutUrl());
        die();
    }
}
