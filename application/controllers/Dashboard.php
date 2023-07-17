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
            redirect('auth');
        }
    }

    public function index()
    {
        $this->_has_login();
        // echo "masuk dashboard";
        $data = [
            'title' => 'Dashboard',
            'user' =>  $this->user,
            'category' => $this->db->get('category'),
            'product' => $this->db->get('product'),
        ];
        $this->template->load('front/templates/dashboard', 'front/dashboard', $data);
    }

    public function getProductByCategory()
    {
        $id_category = $this->input->get('id_category');
        $data = array();
        $product = $this->db->get_where('product', array('id_category' => $id_category))->result_array();

        foreach ($product as $product1) {
            $data[] = $product1;
        }

        echo json_encode($data);
    }

    public function add_to_cart()
    {

        $cart = array();

        $product = $this->db->get_where('product', array('id_product' => $this->input->get('id_product')))->row_array();

        if ($this->cart->contents() == NULL) {
            $data = array(
                'id' => $this->input->get('id_product'),
                'qty' => 1,
                'price' => $product['price_product'],
                'name' => $product['name_product'],
                'photo' => $product['image'],
                'discount' => 0
            );
            $this->cart->insert($data);
        }
        else{
            
            $discount = 0;
            foreach ($this->cart->contents() as $keranjang) {
                $discount += $keranjang['discount'];
                break;
            }
            $data = array(
                'id' => $this->input->get('id_product'),
                'qty' => 1,
                'price' => $product['price_product'],
                'name' => $product['name_product'],
                'photo' => $product['image'],
                'discount' => $discount
            );
            $this->cart->insert($data);
        }
       


        foreach ($this->cart->contents() as $items) {
            $cart[] = $items;
        }
        echo json_encode($cart);
    }

    public function destroyCart()
    {
        $this->cart->destroy();
        redirect('dashboard');
    }

    public function destroyCartById($id_product)
    {
        $cart_contents = $this->cart->contents();

        foreach ($cart_contents as $item) {
            if ($item['id'] == $id_product) {
                $data = array(
                    'rowid' => $item['rowid'],
                    'qty' => 0
                );

                $this->cart->update($data);
                break;
            }
        }
        redirect('dashboard');
    }


    public function showCart()
    {
        $data = $this->cart->contents();
        var_dump($data);
    }

    public function editCartUnit()
    {
        $cart = array();
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty'   => $this->input->post('newQty'),
        );

        if ($this->cart->update($data)) {
            foreach ($this->cart->contents() as $items) {
                $cart[] = $items;
            }
            echo json_encode($cart);
        }
    }
}
