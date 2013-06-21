<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $data;
    public $view = 'user/';

    public function __construct ()
    {
        parent::__construct();

        if (! session('userid')) {
            set_message('You must be sign in first.', 'error');
            redirect('auth');
        }
    }

    public function index ()
    {
        $this->load->model('userprofile_model', 'userprofile');

        $this->data['data'] = array();

        if ($user = $this->userprofile->get_by('userid', session('userid'))) {

            $this->data['data'] = array(
                'name'      => $user->firstname.' '.$user->lastname,
                'nickname'  => $user->nickname,
                'gender'    => '', // $user_l->convert_gender($user->gender),
                'religion'  => $user->religion,
                'country'   => '', // $user_l->convert_area($user->country, 'title'),
                'province'  => '', // $user_l->convert_area($user->province, 'title'),
                'city'      => '', // $user_l->convert_area($user->city, 'title'),
                'address'   => $user->address,
                'phone'     => $user->phone,
                'mobile'    => '', // $user_l->convert_mobile($user->mobile),
                'url'       => $user->blog_url,
                'avatar'    => $user->avatar,
            );

        } else {

            set_message('Empty user data', 'error');

        }

        $this->data['content'] = $this->view . 'home';
        $this->data['yield'] = $this->view . 'dashboard';
        $this->load->view('layout', $this->data);
    }

    public function setting ()
    {
        echo 'setting';
        die();
    }

    public function logout ()
    {
        $session_logged_in = array(
            'userid' => '',
            'username' => '',
        );
        $this->session->unset_userdata($session_logged_in);
        redirect('');
    }
}
