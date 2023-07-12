<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();

        $this->load->model('Admin_model', 'admin');

        $userId = $this->session->userdata('login_session')['user'];
        $this->user = $this->admin->get('user', ['id_user' => $userId]);
    }

    public function index()
    {
        // echo "masuk dashboard";
        $data = [
            'title' => 'Dashboard',
            'user' =>  $this->user 
        ];
        $this->template->load('front/templates/dashboard', 'front/dashboard', $data);
    }
}
