<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $datajson = base_url() . 'database/product.json';
        $getFile = file_get_contents($datajson);
        $data = json_decode($getFile, true);

        $this->db->trans_begin();
        foreach ($data as $row) {
            $input = [
                'id_barang' => $row['id_barang'],
                'nama_barang' => $row['nama_barang'],
                'stok' => $row['stok'],
                'jenis_id' => $row['jenis_id']
            ];
            $this->admin->insert('barang', $input);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode("Failed to Save Data");
        } else {
            $this->db->trans_commit();
            echo json_encode("Success!");
        }
    }
}
