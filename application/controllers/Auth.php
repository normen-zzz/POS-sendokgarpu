<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('pin', 'Pin', 'required');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Login',
              ];
              $this->load->view('front/login/login', $data);
        } else {
            $input = $this->input->post(null, true);

            $cekPin = $this->db->get_where('user',array('pin' => $input['pin']));
            
            if ($cekPin->num_rows() == 1) {
                
                $userDb = $this->db->get_where('user',array('pin' => $input['pin']))->row_array();
                    if ($userDb['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        redirect('login');
                    } else {
                        $userdata = [
                            'user'  => $userDb['id_user'],
                            'role'  => $userDb['role'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('Dashboard');
                    }
               
            } else {
                set_pesan('Pin Belum Terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun';
            $this->template->load('templates/auth', 'auth/register', $data);
        } else {
            $input = $this->input->post(null, true);
            unset($input['password2']);
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role']          = 'gudang';
            $input['foto']          = 'user.png';
            $input['is_active']     = 0;
            $input['created_at']    = time();

            $query = $this->admin->insert('user', $input);
            if ($query) {
                set_pesan('daftar berhasil. Selanjutnya silahkan hubungi admin untuk mengaktifkan akun anda.');
                redirect('login');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('register');
            }
        }
    }
}
