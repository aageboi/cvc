<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct ()
    {
        parent::__construct();
        if (session('userid'))
            redirect('user');
    }

    public function index()
    {
        $this->data['yield'] = 'home';
        $this->load->view('layout', $this->data);
    }

    public function wow ()
    {
        echo 'crot';
        die;
    }
}
