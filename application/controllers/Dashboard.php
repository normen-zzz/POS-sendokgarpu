<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        // echo "masuk dashboard";
        $data = [
            'title' => 'Dashboard'
        ];
        $this->template->load('front/templates/dashboard', 'front/dashboard', $data);
    }
}
