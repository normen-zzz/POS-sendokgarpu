<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adjust extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();

    $this->load->model('Admin_model', 'admin');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = "Adjust Stock";
    $data['adjust'] = $this->admin->getBarangAdjust();
    $data['jenis'] = $this->admin->getCategory();
    $this->template->load('templates/dashboard', 'adjust/data', $data);
  }


  private function _validasi()
  {
    $this->form_validation->set_rules('id_barang', 'Product Name', 'required|trim');
  }


  public function add()
  {

    $id = $this->input->post('id_barang');
    $this->_validasi();

    if ($this->form_validation->run() == false) {
      $data['title'] = "Product";
      $data['jenis'] = $this->admin->get('jenis');
      $data['barang'] = $this->admin->get('barang');
      $this->template->load('templates/dashboard', 'adjust/add', $data);
    } else {
      $input = $this->input->post(null, true);
      $total_stok = $input['stok'] + $input['adjustment'];
      $data = [
        'stok' => $total_stok,
        'stok_awal' => $input['stok'],
        'adjustment' =>  $input['adjustment'],
        'notes' =>  $input['notes'],
        'updated_stock' => date('Y-m-d h:i:s ')
      ];

      $update = $this->admin->update('barang', 'id_barang', $id, $data);
      // var_dump($id);
      // exit();
      if ($update) {
        set_pesan('data saved successfully!');
        redirect('adjust');
      } else {
        set_pesan('failed to save data!');
        redirect('adjust/add/');
      }
    }
  }
}
