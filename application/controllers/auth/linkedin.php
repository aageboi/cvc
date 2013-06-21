<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Linkedin extends CI_Controller {

    public $data;
    public $view = 'auth/';

    public function __construct ()
    {
        parent::__construct();

        if (session('userid'))
            redirect('user');

        $this->load->library('LinkedinApi');
        $this->load->model('usersocmed_model','user_socmed');
    }

    public function index ()
    {
        $this->linkedinapi->get_code();
    }

    public function callback ()
    {
        if ($code = $this->input->get('code')) {

            $data_token = $this->linkedinapi->get_access_token($code);

            //get linkedin ID
            $user     = $this->linkedinapi->get_id($data_token->access_token);

            // check id exists? if no, registration
            if ($user_socmed = $this->user_socmed->get($user->id)) {

                $data = array(
                    'access_token'  => $data_token->access_token,
                    'expires_in'    => time()+$data_token->expires_in,
                    'userid'       => $user_socmed->userid,
                    'socmed'        => 'linkedin',
                );

                if ($this->user_socmed->update($user->id, $data)) {

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

                $data_session = array(
                    'id'            => $user->id,
                    'email'         => $user->emailAddress,
                    'data_token'    => $data_token,
                    'socmed'        => 'linkedin',
                );

                $this->session->set_userdata($data_session);
                redirect('auth/register');

            }

        }
    }
}
