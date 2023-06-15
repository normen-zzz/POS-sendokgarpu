<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
        $data['title'] = "Product";
        $data['barang'] = $this->admin->getBarang();
        $data['jenis'] = $this->admin->getCategory();
        $this->template->load('templates/dashboard', 'barang/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_barang', 'Product Name', 'required|trim');
        $this->form_validation->set_rules('jenis_id', 'Category Name', 'required');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Product";
            $data['jenis'] = $this->admin->get('jenis');

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('barang', 'id_barang');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_barang'] = 'B' . $number;

            $this->template->load('templates/dashboard', 'barang/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('barang', $input);

            if ($insert) {
                set_pesan('data saved successfully!');
                redirect('barang');
            } else {
                set_pesan('failed to save data!');
                redirect('barang/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Product";
            $data['jenis'] = $this->admin->get('jenis');
            $data['barang'] = $this->admin->get('barang', ['id_barang' => $id]);
            $this->template->load('templates/dashboard', 'barang/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $barang_awal = $this->admin->get('barang', ['id_barang' => $id]);
            
            $update = $this->admin->update('barang', 'id_barang', $id, $input);
            if ($this->input->post('jenis_id') != $barang_awal['jenis_id']) {
                $data['stok'] = 0;
                $this->admin->update('barang', 'id_barang', $id,  $data);
            }
            if ($update) {
                set_pesan('data edited successfully!');
                redirect('barang');
            } else {
                set_pesan('failed to save data!');
                redirect('barang/edit/' . $id);
            }
            
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang', 'id_barang', $id)) {
            set_pesan('data deleted successfully!');
        } else {
            set_pesan('failed to deleted data!', false);
        }
        redirect('barang');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
