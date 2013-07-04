<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends CI_Controller {

    public $fbuser;
    public $view = 'auth/';

    public function __construct ()
    {
        parent::__construct();

        if (session('userid'))
            redirect('user');

        $this->load->library('TwitterApi');
    }

    public function index ()
    {
        // if twitter calling back
        if ($this->input->get('oauth_verifier')) {

            $param['oauth_verifier'] = $this->input->get('oauth_verifier');

            if ($_tw = $this->twitterapi->verifyToken($param)) {
                $this->load->model('usersocmed_model','user_socmed');

                $param_user = array(
                    'id' => $_tw['user_id'],
                    'socmed' => 'twitter'
                );

                // check id exists? if no, registration
                if ($user_socmed = $this->user_socmed->get_by($param_user)) {

                    $data = array(
                        'access_token'  => $_tw['oauth_token'].' -||- '.$_tw['oauth_token_secret'],
                        'expires_in'    => time(),
                        'userid'       => $user_socmed->userid,
                        'socmed'        => 'twitter',
                    );

                    if ($this->user_socmed->update($_tw['id'], $data)) {

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

                    $data_token = new stdClass();
                    $data_token->access_token = $_tw['oauth_token'].' -||- '.$_tw['oauth_token_secret'];
                    $data_token->expires_in = 7200;

                    $data_session = array(
                        'id'            => $_tw['user_id'],
                        // 'email'         => '',
                        'data_token'    => $data_token,
                        'socmed'        => 'twitter',
                    );

                    set_session($data_session);
                    redirect('auth/register');

                }
            }
        } else {
            $this->twitterapi->getToken();
        }
    }
}
