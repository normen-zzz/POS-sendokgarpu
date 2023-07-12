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
            'user' =>  $this->user,
            'kategori' => $this->db->get('kategori')
        ];
        $this->template->load('front/templates/dashboard', 'front/dashboard', $data);
    }

    public function getProductByCategory()
    {
        $id_kategori = $this->input->get('id_kategori');
        $data = array();
        $product = $this->db->get_where('product', array('id_kategori' => $id_kategori))->result_array();

        foreach ($product as $product1) {
            $data[] = $product1;
        }

        echo json_encode($data);
    }
}
