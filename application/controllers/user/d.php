<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends CI_Controller
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

    $data['konsul'] = $this->m_diagnosis->gabungan();

    $data['konsul2'] = $this->m_diagnosis->tampildata();

    $this->load->view('templates/header', $data);
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

    // ini untuk pengelompokan gejala ke penyakit
    foreach ($gejala as $key => $value) {
      foreach ($penyakit as $p) {
        // $sakit[$p['kode_penyakit']] = array();
        foreach ($gejala[$key] as $g) {
          if ($g['kode_penyakit'] == $p['kode_penyakit']) {
            $sakit[$p['kode_penyakit']][] = array(
              'kode_gejala' => $g['kode_gejala'],
              'nama_gejala' => $g['nama_gejala'],
              'probabilitas' => $g['probabilitas']
            );
          }
        }
      }
    }

    // print_r($sakit);
    // print_r($gejala);
    // print_r($penyakit);

    // ini perhitungan
    foreach ($penyakit as $pen) {
      $jumlah = 0;
      $jumlah2 = 0;
      $jumlah3 = 0;
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
        // print_r($itu);
        foreach ($itu as $i => $value) {
          $hasil1[] = $value/$jumlah;
          $a = $value/$jumlah;
          $jumlah2 = $jumlah2 + ($a * $value);
          // echo $jumlah2."<br>";
        }
        // print_r($hasil1);
        // print_r($jumlah2);
        foreach ($itu as $l => $alue) {
          $hasil2[] = ($hasil1[$l] * $alue) / $jumlah2;
          $a = ($hasil1[$l] * $alue) / $jumlah2;
          $jumlah3 = $jumlah3 + ($alue * $a);
        }
        // $hasil_akhir[$pen['kode_penyakit']] = $jumlah3 * 100;
        $hasil_akhir[] = array (
          'nama_penyakit' => $pen['nama_penyakit'],
          'kode_penyakit' => $pen['kode_penyakit'],
          'presentase'    => $jumlah3 * 100
        );
      }
        $hasilhitung[$pen['kode_penyakit']] = $jumlah3;
    }

    echo max($hasilhitung);

    // Ambil nilai terbesar 
    $besar = 0;
    $kecil = 0;
    foreach ($hasil_akhir as $key) {
      // $besar = $key['presentase'];
      if ($besar < $key['presentase']) {
        $besar = $key['presentase'];
        $tampil_hasil = array (
          'nama_penyakit' => $key['nama_penyakit'],
          'kode_penyakit' => $key['kode_penyakit'],
          'presentase'    => $key['presentase']
        );
      }else{
        $kecil > $key['presentase'];
         $kecil = $key['presentase'];
      }
    }
    echo $besar."<br>";
    echo $kecil."<br>";
    print_r($hasil_akhir);
    echo "</pre>";

    $no = 1;
    echo "Penyakit Terdeteksi <strong>".$tampil_hasil['nama_penyakit']."</strong> dengan nilai ".number_format($tampil_hasil['presentase'],6)."%<br><br>";
    echo "Gejala yang dipilih :<br>";
    foreach ($sakit as $id => $v ) {
      foreach ($sakit[$id] as $gej) {
        echo $no++.". ".$gej['nama_gejala']."<br>";
      }
      
    }

  }
}
