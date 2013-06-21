<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $data;
    public $view = 'auth/';

    public function __construct ()
    {
        parent::__construct();

        if (session('userid'))
            redirect('user');
    }

    // login Page
    public function index ()
    {
        $this->load->library('form_validation');
        $this->data['username'] = '';

        if (! is_get()) {

            $username           = filter_var($this->input->post('username'), FILTER_SANITIZE_STRING);
            $password           = filter_var($this->input->post('password'), FILTER_SANITIZE_STRING);

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {
                $this->load->model('user_model','user');
                if ($user = $this->user->get_by('username', $username)) {
                    $password = generate_password($password, $user->email);
                    if ($password == $user->password) {
                        set_session('userid', $user->id);
                        set_session('username', $user->username);
                        redirect('cv');
                    } else {
                        set_message('Wrong password', 'error');
                    }
                } else {
                    set_message('User not found', 'error');
                }
            }
        }

        $this->load->view($this->view . 'home', $this->data);
    }
}
