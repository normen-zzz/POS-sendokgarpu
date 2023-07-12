<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('Dashboard');
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
                
                    $user_db = $this->auth->userdata($input['username']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        redirect('login');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id_user'],
                            'role'  => $user_db['role'],
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
}
