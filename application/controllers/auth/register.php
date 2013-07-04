<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public $data;
    public $view = 'auth/';

    public function __construct ()
    {
        parent::__construct();

        if (session('userid'))
            redirect('user');
    }

    public function index ()
    {
        $this->load->library('form_validation');

        $this->data['email'] = (session('email')) ? session('email') : '';
        $this->data['username'] = '';

        if (! is_get()) {
            $username           = filter_var($this->input->post('username'), FILTER_SANITIZE_STRING);
            $email              = filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL);
            $password           = filter_var($this->input->post('password'), FILTER_SANITIZE_STRING);
            $confirm_password   = filter_var($this->input->post('confirm'), FILTER_SANITIZE_STRING);

            // validation input
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|required|matches[password]');

            if ($this->form_validation->run() !== FALSE) {

                // insert into database
                $data_input = array(
                    'username'  => $username,
                    'email'     => $email,
                    'password'  => generate_password($password, $email)
                );


                $this->load->model('user_model', 'user');
                if ($user = $this->user->insert($data_input)) {

                    // integrate socmed id with user
                    if (session('socmed')) {

                        if ($this->integrate_socmed($this->db->insert_id())) {
                            // otomatis login untuk socmed
                            set_session('userid', $this->db->insert_id());
                            set_session('username', $username);

                            $this->session->unset_userdata('socmed');

                            redirect('user');
                        }

                    } else {

                        // send email activation
                        $key    = md5($email.time());
                        $this->send_activation_key($email, $key);

                        redirect('auth/register/sukses');
                    }

                }
            }
        }

        $this->load->view($this->view . 'register', $this->data);
    }

    public function sukses ()
    {
        $this->load->view($this->view . 'success_register');
    }

    private function integrate_socmed ($id)
    {
        if ($id && session('socmed')) {

            //insert into user socmed
            $data_socmed = array(
                'id'            => session('id'),
                'userid'        => $id,
                'access_token'  => session('data_token')->access_token,
                'expires_in'    => time() + session('data_token')->expires_in,
                'socmed'        => session('socmed'),
            );

            $this->load->model('usersocmed_model', 'user_socmed');
            $this->user_socmed->insert($data_socmed);

            // get profile from socmed and save it to user profile
            if (session('socmed') == 'linkedin') {
                $this->load->library('LinkedinApi');

                $socmed_profile = $this->linkedinapi->get_profile(session('data_token')->access_token);
                $data_profile = array(
                    'userid'    => $id,
                    'firstname' => (isset($socmed_profile->firstName) ? $socmed_profile->firstName : ''),
                    'lastname'  => (isset($socmed_profile->lastName) ? $socmed_profile->lastName : ''),
                    'nickname'  => (isset($socmed_profile->nickName) ? $socmed_profile->nickName : ''),
                    'gender'    => (isset($socmed_profile->gender) ? $socmed_profile->gender : ''),
                    'religion'  => (isset($socmed_profile->religion) ? $socmed_profile->religion : ''),
                    'country'   => (isset($socmed_profile->country) ? $socmed_profile->country : 0),
                    'city'      => (isset($socmed_profile->city) ? $socmed_profile->city : 0),
                    'province'  => (isset($socmed_profile->province) ? $socmed_profile->province : 0),
                    'address'   => (isset($socmed_profile->address) ? $socmed_profile->address : ''),
                    'phone'     => (isset($socmed_profile->phoneNumbers->values[0]) ? $socmed_profile->phoneNumbers->values[0] : '')
                );
            } elseif (session('socmed') == 'facebook') {

                $fbdata = get_response('GET', 'https://graph.facebook.com/'.session('id').
                    '?access_token='.session('data_token')->access_token);
                $socmed_profile = json_decode($fbdata);

                $data_profile = array(
                    'userid' => (int) $id,
                    'firstname' => (isset($socmed_profile->first_name) ? $socmed_profile->first_name : ''),
                    'lastname'  => (isset($socmed_profile->last_name) ? $socmed_profile->last_name : ''),
                    'nickname'  => (isset($socmed_profile->username) ? $socmed_profile->username : ''),
                    'gender'    => (isset($socmed_profile->gender) ? substr($socmed_profile->gender,0,1) : ''),
                    'religion'  => '',
                    'address'   => (isset($socmed_profile->hometown->name) ? $socmed_profile->hometown->name : ''),
                    'country'   => 0,
                    'city'      => 0,
                    'province'  => 0,
                    'phone'     => '',
                );
            } elseif (session('socmed') == 'twitter') {
                $this->load->library('TwitterApi');

                $data_token = session('data_token');

                list($_data['oauth_token'], $_data['oauth_token_secret']) = explode(" -||- ", $data_token->access_token);
                $_data['id'] = session('id');

                $socmed_profile = $this->twitterapi->getUser($_data);

                $data_profile = array(
                    'userid' => (int) $id,
                    'firstname' => (isset($socmed_profile->name) ? $socmed_profile->name : ''),
                    'lastname'  => '',
                    'nickname'  => (isset($socmed_profile->screen_name) ? $socmed_profile->screen_name : ''),
                    'gender'    => '',
                    'religion'  => '',
                    'address'   => '',
                    'country'   => 0,
                    'city'      => 0,
                    'province'  => 0,
                    'phone'     => '',
                );
            }

            $this->load->model('userprofile_model', 'user_profile');
            $this->user_profile->insert($data_profile);

            $array_items = array(
                'id'            => '',
                'email'         => '',
                'data_token'    => '',
            );
            $this->session->unset_userdata($array_items);
        }

        return false;
    }

    private function send_activation_key($email, $key)
    {
        $this->load->helper('email');

        $body = $this->load->view('auth/mail_activation', array('key' => $key), true);

        send_email($email, 'buatcv.com - Activation Email', $body);

        return true;
    }
}
