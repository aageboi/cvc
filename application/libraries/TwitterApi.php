<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/tmhOAuth.php';
require_once APPPATH . 'libraries/tmhUtilities.php';

class TwitterApi {

    public function __construct()
    {
        $this->to =& get_instance();
        $this->to->config->load('socmed');

        $this->cfg   = $this->to->config->item('twitter');

        $this->twttr = new tmhOAuth(array(
            'consumer_key'    => $this->cfg['api_key'],
            'consumer_secret' => $this->cfg['secret_key'],
        ));
    }

    public function verifyToken ($param = array())
    {
        if (! session('oauth'))
            return false;

        $_oauth = session('oauth');

        $this->twttr->config['user_token']  = $_oauth['oauth_token'];
        $this->twttr->config['user_secret'] = $_oauth['oauth_token_secret'];

        $code = $this->twttr->request('POST', $this->twttr->url('oauth/access_token', ''), array(
            'oauth_verifier' => $param['oauth_verifier']
        ));

        if ($code == 200) {
            $accessToken = $this->twttr->extract_params($this->twttr->response['response']);
            // $this->session->set_userdata('access_token', $accessToken);
            $this->to->session->unset_userdata('oauth');
            return $accessToken;
        } else {
            // $this->outputError($this->twttr);
            return false;
        }
    }

    public function getUser ($param = array())
    {
        $this->twttr->config['user_token']  = $param['oauth_token'];
        $this->twttr->config['user_secret'] = $param['oauth_token_secret'];

        $_code = $this->twttr->request('GET',
            $this->twttr->url('1.1/users/show.json', ''),
            array('user_id' => $param['id'])
        );

        if ($_code == 200) {

            $user = json_decode($this->twttr->response['response']);
            $user->oauth_token = $param['oauth_token'];
            $user->oauth_token_secret = $param['oauth_token_secret'];

            return $user;

        } else {
            // $this->outputError($this->twttr);
            return false;
        }
    }

    public function getToken ()
    {
        // $callback = isset($_REQUEST['oob']) ? 'oob' : tmhUtilities::php_self();

        $callback = site_url('auth/twitter');

        $params = array(
            'oauth_callback'     => $callback
        );

        $code = $this->twttr->request('POST', $this->twttr->url('oauth/request_token', ''), $params);

        if ($code == 200) {
            // $this->session->set_userdata('oauth', $this->twttr->extract_params($this->twttr->response['response']));
            $_oauth = $this->twttr->extract_params($this->twttr->response['response']);
            set_session('oauth', $_oauth);

            // $method = ($this->input->get('authenticate')) ? 'authenticate' : 'authorize';
            // $force  = ($this->input->get('force')) ? '&force_login=1' : '';
            $authurl = $this->twttr->url("oauth/authenticate", '') .  "?oauth_token={$_oauth['oauth_token']}";
            header("Location: {$authurl}");
        } else {
            $this->outputError($this->twttr);
        }
    }

    function outputError($tmhOAuth) {
        echo 'Error: ' . $tmhOAuth->response['response'] . PHP_EOL;
        tmhUtilities::pr($tmhOAuth);
    }

}
