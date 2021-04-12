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
          if ($g['penyakit_kode'] == $p['kode_penyakit']) {
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

    

    // ini perhitungan
    foreach ($penyakit as $pen) {
      $perjumlahan = 0;
      $evidence = 0;
      $total = 0;
      $bobot = [];
      $phi = [];
      $phie = [];
      if (isset($sakit[$pen['kode_penyakit']])) {
        // echo $pen['kode_penyakit'];
        foreach ($sakit[$pen['kode_penyakit']] as $itung) {
          // echo $itung['bobot'];
          $perjumlahan = $perjumlahan + $itung['bobot'];
          $bobot[] = $itung['bobot'];
        }
        // print_r($bobot);
        // print_r($perjumlahan);
       

        foreach ($bobot as $i => $value) {
          $phi[] = $value/$perjumlahan;
          $a = $value/$perjumlahan;
          $evidence = $evidence + ($a * $value);
          // echo $evidence."<br>";
        }
        // print_r($phi);
        // print_r($evidence);

        foreach ($bobot as $l => $alue) {
          $phie[] = ($phi[$l] * $alue) / $evidence;
          $a = ($phi[$l] * $alue) / $evidence;
          $total = $total + ($alue * $a);
        }
        // print_r($phie);
        // print_r($total);
        // $hasil_akhir[$pen['kode_penyakit']] = $total * 100;
        $hasil_akhir[] = array (
          'nama_penyakit' => $pen['nama_penyakit'],
          'kode_penyakit' => $pen['kode_penyakit'],
          'persentase'    => $total * 100,
          'solusi'        => $pen['solusi'],
        );
        $hasilJumlah[] = $total * 100;
      }
    }

    

   
     // print_r($hasil_akhir);
    // print_r($hasilJumlah);
  

    $maxJumlah = max($hasilJumlah);
    $newHasilAkhir = array_filter($hasil_akhir, function($hasil) use ($maxJumlah) {
      if ($hasil['persentase'] == $maxJumlah) {
        return true;
      }
      return false;
    });

    if (count($newHasilAkhir) == 1) {
      foreach ($newHasilAkhir as $has) {
        $tampil_hasil = array (
          'nama_penyakit' => $has['nama_penyakit'],
          'kode_penyakit' => $has['kode_penyakit'],
          'persentase'    => $has['persentase'],
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
          'persentase'    => $has['persentase'],
          'solusi'        => $has['solusi']
        );


      // $hasil = array(
      // 'kode_penyakit' => $this->input->post('penyakit_kode'),
      // 'nama_penyakit' => $this->input->post('nama_penyakit'),
      // 'persentase' => $this->input->post('persentase'),
      // 'solusi' => $this->session->userdata('solusi'),
      // );

      // $this->db->input_data($hasil, 'hasil');

      // redirect('user/hasil');
         
      }



   
    }

    // print_r($tampil_hasil);
    // print_r($newHasilAkhir);
    // print_r($sakit);

    echo "</pre>";





// baru

   $data = array(
        'penyakit_kode' => $tampil_hasil['kode_penyakit'],
        'persentase' => $tampil_hasil['persentase'],
      );

      $this->db->insert('hasil', $data);
   

    $hasil = array(
      'sakit' => $sakit,
      'tampil_hasil' => $tampil_hasil,
    );

    $data2['title'] = 'Sistem Pakar Penyakit Tanaman Pisang';
    $this->load->view('templates/header', $data2);
    $this->load->view('user/hasil',$hasil);
    $this->load->view('templates/footer');
      


      }
    }



   

  