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

    private function _has_login()
    {
        if (!$this->session->has_userdata('login_session')) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $this->_has_login();
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

    public function add_to_cart()
    {

        $cart = array();

        $product = $this->db->get_where('product',array('id_product' => $this->input->get('id_product')))->row_array();
        $data = array(
            'id' => $this->input->get('id_product'),
            'qty' => 1,
            'price' => $product['price_product'],
            'name' => $product['nama_product'],
            'photo' => $product['image'],
        );
        $this->cart->insert($data);
        

        foreach ($this->cart->contents() as $items){
            $cart[] = $items;
        }
        echo json_encode($cart);
    }

    public function destroyCart() {
        $this->cart->destroy();
    }

    public function showCart() {
        var_dump($this->cart->contents());
    }
}
