<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

   public function index(){
        $data = [
          'title' => 'Login',
          'user' => $this->db->get('user')->result_array()
        ];
        $this->load->view('front/login/login', $data);
   }
}
