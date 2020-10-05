<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data['title'] = 'Sistem Pakar Penyakit Tanaman Pisang';
		$this->load->view('templates/header',$data);
		$this->load->view('user/home');
		$this->load->view('templates/footer');
	}

	public function macam()
	{
		$data['title'] = 'Sistem Pakar Penyakit Tanaman Pisang';
		$this->load->view('templates/header',$data);
		$this->load->view('user/macam');
		$this->load->view('templates/footer');
	}
}
