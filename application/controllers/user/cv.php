<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cv extends CI_Controller {

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
        $this->data['content'] = $this->view . 'cv/home';
        $this->data['yield'] = $this->view.'dashboard';
        $this->load->view($this->view.'layout', $this->data);
    }

    public function add ()
    {
        $this->data['content'] = $this->view . 'cv/add';
        $this->data['yield'] = $this->view.'dashboard';
        $this->load->view($this->view.'layout', $this->data);
    }
}
