<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'username', 'trim|required',
        [
                'required' => 'Username harus diisi!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',
        [
                'required' => 'Password harus diisi!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        // jika adminnya ada
        if ($admin) {
                // cek password
                if (password_verify($password, $admin['password'])) {
                    $data = [
                        'username' => $admin['username'],
                        // 'password' => $admin['password']
                    ];
                    $this->session->set_userdata($data);
                    // if ($user['role_id'] == 1) {
                        redirect('admin/penyakit');
                    // } else {
                    //     redirect('home');
                    // }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Salah!</div>');
                redirect('auth');
            }
  }


    public function register()
    {   
        // if ($this->session->userdata('username')) {
        //  redirect('user');
        // }

        $this->form_validation->set_rules('username','Username','required|trim', [
                'required' => 'Username harus diisi!',
        ]);

        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[

                'required'   => 'Password harus diisi!',
                'matches'    => 'Password tidak cocok!',
                'min_length' => 'Password terlalu pendek!'
        ]);

        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


        if($this->form_validation->run() == false) {
        $data['title'] = 'Register';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/register');
        $this->load->view('templates/auth_footer');

        } else {
            $data = [
            'username' => htmlspecialchars($this->input->post('username',true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            // 'role_id' => 1,
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat akun anda telah terdaftar</div>');
            redirect('auth');
        }

    }

    

    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
            redirect('auth');
    }


}




























