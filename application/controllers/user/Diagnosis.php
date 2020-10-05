<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosis extends CI_Controller {

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

     $data['konsul'] = $this->m_diagnosis->gabungan();

       $data['konsul2'] = $this->m_diagnosis->tampildata();

		$this->load->view('templates/header',$data);
		$this->load->view('user/diagnosis');
		$this->load->view('templates/footer');
	}

	public function proses()
	{

		echo "<pre>";
    $penyakit = $this->m_diagnosis->get()->result_array();
    // $data['k'] = $this->m_diagnosis->get2()->result_array();

        foreach ($this->input->post('selectall') as $key => $value) {
          $gejala[$value] = $this->m_diagnosis->get2($value)->result_array();
        }

        // ini untuk pengelompokan kegala ke penyakit
        foreach ($gejala as $key => $value) {
           foreach ($penyakit as $p) {
            // $sakit[$p['kode_penyakit']] = array();
            foreach ($gejala[$key] as $g ) {
              if ($g['kode_penyakit'] == $p['kode_penyakit']) {
                $sakit[$p['kode_penyakit']][] = array(
                   'kode_gejala' => $g['kode_gejala'],
                   'probabilitas' => $g['probabilitas']
                );
              }
               
            }
           }
        }

        // ini perhitungan
        
        // foreach ($penyakit as $pen) {
        //  $jumlah = 0;
        //  $jumlah2 = 0;
        //   $itu = [];
        //   $hasil1 = [];
        //   $hasil2 = [];
        //  if (isset($sakit[$pen['kode_penyakit']])) {
        //     // echo $pen['kode_penyakit'];
        //    foreach ($sakit[$pen['kode_penyakit']] as $itung) {
        //       echo $itung['probabilitas'];
         //     $jumlah = $jumlah + $itung['probabilitas'];
         //     $itu[] = $itung['probabilitas'];
         //   }
         //   foreach ($itu as $i => $value) {
         //     $hasil1[] = $value / $jumlah;
         //   }
        //     print_r($hasil1); echo "<br>";
         //    foreach ($hasil1 as $j => $lue) {
         //     $hasil2[] = $lue * $itu[$j];
         //   }
        //     print_r($hasil2); echo "<br>";
         //   foreach ($hasil2 as $k => $vale) {
         //     $jumlah2 = $jumlah2 + $vale;
         //   }
        //     print_r($jumlah2); echo "<br>";
         //   foreach ($itu as $l => $alue) {
         //     $final_yak[] = ($hasil1[$l]*$alue)/$jumlah2;
         //   }
        //     // echo "2 <br>";
        //  }
        // }

        foreach ($penyakit as $pen) {
          $jumlah = 0;
          $jumlah2 = 0;
          // $jumlah3 = 0;
          $itu = [];
          $hasil1 = [];
          $hasil2 = [];
          if (isset($sakit[$pen['kode_penyakit']])) {
            // echo $pen['kode_penyakit'];
            foreach ($sakit[$pen['kode_penyakit']] as $itung) {
              // echo $itung['probabilitas'];
              $jumlah = $jumlah + $itung['probabilitas'];
              $itu[] = $itung['probabilitas'];
            }
            foreach ($itu as $i => $value) {
              $hasil1[] = $value / $jumlah;
              $a = $value / $jumlah;
              $jumlah2 = $jumlah2 + ($a * $value);
            }
            foreach ($itu as $l => $alue) {
              $hasil2[] = ($hasil1[$l]*$alue)/$jumlah2;
              $a = ($hasil1[$l]*$alue)/$jumlah2;
              $jumlah3[$pen['kode_penyakit']] = $jumlah2 + ($a * $alue);
            }
          }
        }

     
       // print_r($gejala); echo "<br>";
       // print_r($penyakit); echo "<br>";
       // print_r($sakit);
       // print_r($jumlah);
       // print_r($hasil2);
       print_r($jumlah3);
     echo "</pre>";

	}
}
