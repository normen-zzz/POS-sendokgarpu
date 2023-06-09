<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
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
        $data['title'] = "Product In";
        $data['barangmasuk'] = $this->admin->getBarangMasuk();
        $data['jenis'] = $this->admin->getCategory();
        $this->template->load('templates/dashboard', 'barang_masuk/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'Date', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'Product Name', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Product In', 'required|trim|numeric|greater_than[0]');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Product In";
            $data['barang'] = $this->admin->get('barang');

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->admin->getMax('barang_masuk', 'id_barang_masuk', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_masuk'] = $kode . $number;

            $this->template->load('templates/dashboard', 'barang_masuk/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'updated_stock' => date('Y-m-d h:i:s ')
            ];
            $id = $this->input->post('barang_id');
            $insert = $this->admin->insert('barang_masuk', $input);
            $insert = $this->admin->update('barang', 'id_barang', $id,  $data);

            if ($insert) {
                if ($this->db->affected_rows() > 0) {
                    set_pesan('data saved successfully!');
                    redirect('barangmasuk');
                } else {
                    set_pesan('failed to save data!');
                    redirect('barangmasuk/add');
                }
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang_masuk', 'id_barang_masuk', $id)) {
            set_pesan('data deleted successfully!.');
        } else {
            set_pesan('failed to deleted data!.', false);
        }
        redirect('barangmasuk');
    }
}
