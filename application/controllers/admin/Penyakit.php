<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {
public function __construct()
        {
	parent::__construct();
	 if (!$this->session->userdata('username')) {
            redirect('auth');
	$this->load->model('m_penyakit');

	}
	}
	public function index()
	{

		$data['title'] = 'Data penyakit';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['penyakit'] = $this->m_penyakit->tampildata();

        $this->form_validation->set_rules('kode_penyakit', 'Kode_penyakit', 'required|trim', [

                        'required' => 'Kode Penyakit Harus Diisi!'
                ]);
        $this->form_validation->set_rules('nama_penyakit', 'Nama_penyakit', 'required|trim', [

                        'required' => 'Nama Penyakit Harus Diisi!'
                ]);
        $this->form_validation->set_rules('solusi', 'solusi', 'required|trim', [

                        'required' => 'Solusi Harus Diisi!'
                ]);
        if ($this->form_validation->run() == false) {
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/penyakit/data_penyakit');
		$this->load->view('templates/admin_footer');
	}else{
         
         $data = [
         	   'kode_penyakit' => $this->input->post('kode_penyakit'),
               'nama_penyakit' => $this->input->post('nama_penyakit'),
               'solusi' => $this->input->post('solusi')
          ];

         $this->m_penyakit->input_data($data, 'penyakit');
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible text-center" role="alert">Data Penyakit Berhasil Ditambah</div>');
            redirect('admin/penyakit');
	}
	}

	public function ubah($kode_penyakit)
	{
		   $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Halaman Ubah Data Penyakit';
		$where = array('kode_penyakit' => $kode_penyakit);
		$data['penyakit'] = $this->m_penyakit->edit_data($where,'penyakit')->result();
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/penyakit/ubah_penyakit',$data);
		$this->load->view('templates/admin_footer');
	}

	public function update()
	{
		$kode_penyakit = $this->input->post('kode_penyakit');
		$nama_penyakit = $this->input->post('nama_penyakit');
		$solusi = $this->input->post('solusi');


		$data = [

			'kode_penyakit' => $kode_penyakit,
			'nama_penyakit' => $nama_penyakit,
			'solusi' => $solusi

		];

		$where = array(
			'kode_penyakit' => $kode_penyakit
		);

		$this->m_penyakit->update($where,$data, 'penyakit');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible text-center" role="alert">Data Penyakit Berhasil Diubah</div>');
            redirect('admin/penyakit');
		redirect('admin/penyakit');

	}

	public function hapus($kode_penyakit)
        {
            $where = array('kode_penyakit' => $kode_penyakit);
            $this->m_penyakit->hapus_data($where, 'penyakit');
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Penyakit Berhasil Dihapus</div>');
            redirect('admin/penyakit');
        }
}
