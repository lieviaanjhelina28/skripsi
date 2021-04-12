<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        $this->load->model('m_aturan');
    }
    
 }
    public function index()
    {
        $data['title'] = 'Data Aturan';
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['aturan'] = $this->m_aturan->tampildata();
        $data['penyakit'] = $this->db->get('penyakit')->result();
        $data['gejala'] = $this->db->get('gejala')->result();

          $this->form_validation->set_rules('penyakit_kode','penyakit_kode','required|trim', [

                'required' => 'Kode Penyakit Harus Diisi!'
        ]);

        $this->form_validation->set_rules('gejala_kode','gejala_kode','required|trim', [

                'required' => 'Kode Gejala Harus Diisi!'
        ]);

        $this->form_validation->set_rules('bobot','bobot','required|trim', [

                'required' => 'bobot Harus Diisi!'
        ]);


        if($this->form_validation->run() == false) {  
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/aturan/data_aturan');
        $this->load->view('templates/admin_footer');
        } else{     
         
         $data = [
            'penyakit_kode' => $this->input->post('penyakit_kode'),
            'gejala_kode'   => $this->input->post('gejala_kode'),
            'bobot'  => $this->input->post('bobot')
            

                
            ];
// print_r($data);
            $this->m_aturan->input_data($data,'aturan');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Aturan Berhasil Ditambah</div>');
            redirect('admin/aturan');
    }
 }


 public function ubah($id_aturan)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Halaman Ubah Data Penyakit';
        $where = array('id_aturan' => $id_aturan);
        $data['aturan'] = $this->m_aturan->edit_data($where,'aturan')->result();
        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/aturan/ubah_aturan',$data);
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $id_aturan = $this->input->post('id_aturan');
        $penyakit_kode = $this->input->post('penyakit_kode');
        $gejala_kode = $this->input->post('gejala_kode');
        $bobot = $this->input->post('bobot');

        $data = [
            // 'id_aturan' => $id_aturan,
            'penyakit_kode' => $penyakit_kode,
            'gejala_kode' => $gejala_kode,
            'bobot' => $bobot
        ];

        $where = array(
            'id_aturan' => $id_aturan
        );

        $this->m_aturan->update($where,$data, 'aturan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible text-center" role="alert">Data aturan Berhasil Diubah</div>');
            redirect('admin/aturan');
        redirect('admin/aturan');

    }
    public function hapus($id_aturan)
        {
            $where = array('id_aturan' => $id_aturan);
            $this->m_aturan->hapus_data($where, 'aturan');
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data Aturan Berhasil Dihapus</div>');
            redirect('admin/aturan');
        }


    
        }