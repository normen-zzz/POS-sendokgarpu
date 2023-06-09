<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
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
        $data['title'] = "Product Out";
        $data['barangkeluar'] = $this->admin->getBarangkeluar();
        $data['jenis'] = $this->admin->getCategory();
        $this->template->load('templates/dashboard', 'barang_keluar/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'Date', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'Product Name', 'required');

        $input = $this->input->post('barang_id', true);
        if ($input != NULL) {
            $stok = $this->admin->get('barang', ['id_barang' => $input])['stok'];
            $stok_valid = $stok + 1;

            $this->form_validation->set_rules(
                'jumlah_keluar',
                'Jumlah Keluar',
                "required|trim|numeric|greater_than[0]|less_than[{$stok_valid}]",
                [
                    'less_than' => "The number of exits cannot be more than {$stok}"
                ]
            );
        }
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Product Out";
            $data['barang'] = $this->admin->get('barang', null, ['stok >' => 0]);

            // Mendapatkan dan men-generate kode transaksi barang keluar
            $kode = 'T-BK-' . date('ymd');
            $kode_terakhir = $this->admin->getMax('barang_keluar', 'id_barang_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_keluar'] = $kode . $number;

            $this->template->load('templates/dashboard', 'barang_keluar/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'updated_stock' => date('Y-m-d h:i:s ')
            ];
            $id = $this->input->post('barang_id');
            $insert = $this->admin->insert('barang_keluar', $input);
            $insert = $this->admin->update('barang', 'id_barang', $id,  $data);

            if ($insert) {
                if ($this->db->affected_rows() > 0) {
                    set_pesan('data saved successfully!');
                    redirect('barangkeluar');
                } else {
                    set_pesan('failed to save data!');
                    redirect('barangkeluar/add');
                }
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang_keluar', 'id_barang_keluar', $id)) {
            set_pesan('data deleted successfully!');
        } else {
            set_pesan('failed to deleted data!', false);
        }
        redirect('barangkeluar');
    }
}
