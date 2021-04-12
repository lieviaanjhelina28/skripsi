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

    // ini untuk pengelompokan kegala ke penyakit
    foreach ($gejala as $key => $value) {
      foreach ($penyakit as $p) {
        // $sakit[$p['kode_penyakit']] = array();
        foreach ($gejala[$key] as $g) {
          if ($g['kode_penyakit'] == $p['kode_penyakit']) {
            $sakit[$p['kode_penyakit']][] = array(
              'kode_gejala' => $g['kode_gejala'],
              'nama_gejala' => $g['nama_gejala'],
              'bobot' => $g['bobot'],
            );
          }
        }
      }
    }

    // print_r($sakit);
    // print_r($gejala);
    // print_r($penyakit);
    $gejala   = $this->input->post('kode_gejala');
    $it  = $this->input->post('bobot');
    $hasil1  = $this->input->post('phi');
    $jumlah2 = $this->input->post('evidence');
    $hasil2  = $this->input->post('phie');
    $hasilJumlah = $this->input->post('hasil');

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
          // echo $itung['bobot'];
          $jumlah = $jumlah + $itung['bobot'];
          $itu[] = $itung['bobot'];
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
          'presentase'    => $jumlah3 * 100,
          'solusi'        => $pen['solusi'],
        );
        $hasilJumlah[] = $jumlah3 * 100;
      }
    }
    // jumlah evidence print_r($jumlah);

     // perhitungan 2 p(hi) print_r($hasil1);

     // hasil 3 print_r($jumlah2);

    // perhitungan 4 p(hi|e) print_r($hasil2);

   
    // hasil akhir print_r($jumlah3);
    // print_r($jumlah);
    // print_r($hasil1);
    // print_r($jumlah2);
    // print_r($hasil2);
    // print_r($hasilJumlah);
    // print_r($hasil_akhir);

    $maxJumlah = max($hasilJumlah);
    $newHasilAkhir = array_filter($hasil_akhir, function($hasil) use ($maxJumlah) {
      if ($hasil['presentase'] == $maxJumlah) {
        return true;
      }
      return false;
    });

    if (count($newHasilAkhir) == 1) {
      foreach ($newHasilAkhir as $has) {
        $tampil_hasil = array (
          'nama_penyakit' => $has['nama_penyakit'],
          'kode_penyakit' => $has['kode_penyakit'],
          'presentase'    => $has['presentase'],
          'solusi'        => $has['solusi']
        );
      }
    }else if(count($newHasilAkhir) > 1){
      foreach ($newHasilAkhir as $value) {
        $jmlhGejala[$value['kode_penyakit']] = count($sakit[$value['kode_penyakit']]);
      }
      $maxGejala = max($jmlhGejala);
      $newGejalaMax = array_filter($jmlhGejala, function($angka) use($maxGejala) {
        if ($angka == $maxGejala) {
          return true;
        }
        return false;
      });
      $kdPenyakit = array_keys($newGejalaMax);
      $hasilAkhir = array_filter($hasil_akhir, function($hasil) use ($kdPenyakit) {
        if ($hasil['kode_penyakit'] == $kdPenyakit[0]) {
          return true;
        }
        return false;
      });
      foreach ($hasilAkhir as $has) {
        $tampil_hasil = array (
          'nama_penyakit' => $has['nama_penyakit'],
          'kode_penyakit' => $has['kode_penyakit'],
          'presentase'    => $has['presentase'],
          'solusi'        => $has['solusi']
        );
      }
    }

    // print_r($hasilAkhir);
    // print_r($newHasilAkhir);
    // print_r($sakit);
    echo "</pre>";

    $no = 1;
    echo "Penyakit Terdeteksi <strong>".$tampil_hasil['nama_penyakit']."</strong> dengan nilai ".number_format($tampil_hasil['presentase'],6)."%<br><br>";
     echo "Solusi yang diberikan :<br>".$tampil_hasil['solusi']."<br>";


    echo "Gejala yang dipilih :<br>";
    foreach ($sakit as $id => $value) {
      foreach ($sakit[$id] as $gej) {
        echo $no++.". ".$gej['nama_gejala']."<br>";
      }
    }

    
  }
}