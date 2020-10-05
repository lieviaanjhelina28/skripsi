<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {
public function __construct()
        {
	parent::__construct();
 if (!$this->session->userdata('username')) {
            redirect('auth');

	$this->load->model('m_gejala');

	}
    
 }
	public function index()
	{

		$data['title'] = 'Data gejala';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['gejala'] = $this->m_gejala->tampildata();

        $this->form_validation->set_rules('kode_gejala', 'kode_gejala', 'required|trim', [

                        'required' => 'kode Gejala Harus Diisi!'
                ]);

        $this->form_validation->set_rules('nama_gejala', 'nama_gejala', 'required|trim', [

                        'required' => 'Nama Gejala Harus Diisi!'
                ]);
        if ($this->form_validation->run() == false) {
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/gejala/data_gejala');
		$this->load->view('templates/footer');
	}else {
         
         $data = [
         	   'kode_gejala' => $this->input->post('kode_gejala'),
               'nama_gejala' =>  $this->input->post('nama_gejala'),
          ];

         $this->m_gejala->input_data($data, 'gejala');
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible text-center" role="alert">Data gejala Berhasil Ditambah</div>');
            redirect('admin/gejala');
	}
	}

    public function ubah($kode_gejala)
    {
        $data['title'] = 'Halaman Ubah Data gejala';
        $where = array('kode_gejala' => $kode_gejala);
        $data['gejala'] = $this->m_gejala->edit_data($where,'gejala')->result();
        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/gejala/ubah_gejala',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $kode_gejala = $this->input->post('kode_gejala');
        $nama_gejala = $this->input->post('nama_gejala');

        $data = [

            'kode_gejala' => $kode_gejala,
            'nama_gejala' => $nama_gejala
        ];

        $where = array(
            'kode_gejala' => $kode_gejala
        );

        $this->m_gejala->update($where,$data, 'gejala');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible text-center" role="alert">Data gejala Berhasil Diubah</div>');
            redirect('admin/gejala');
        redirect('admin/gejala');

    }

	public function hapus($kode_gejala)
        {
            $where = array('kode_gejala' => $kode_gejala);
            $this->m_gejala->hapus_data($where, 'gejala');
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Gejala Berhasil diHapus</div>');
            redirect('admin/gejala');
        }
}
