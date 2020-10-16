<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // if (!$this->session->userdata('username')) {
    //         redirect('auth');
    $this->load->model('m_diagnosis');
  }

  public function index()
  {
    $data['title'] = 'Sistem Pakar Penyakit Tanaman Pisang';

    $this->load->view('templates/header', $data);
    $this->load->view('user/hasil');
    $this->load->view('templates/footer');
  }
}