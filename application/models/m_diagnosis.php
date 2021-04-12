<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_diagnosis extends CI_model{
    


    	  public function tampildata()
    {
    	$query = $this->db->select('*')
        ->from('gejala')
        ->order_by('kode_gejala', 'DESC')
        ->get();
        return $query->result();
    }

    public function gabungan()
    {
    	$this->db->select('*');
    	$this->db->from('aturan');
    	$this->db->join('gejala','gejala.kode_gejala=aturan.gejala_kode');
    	$this->db->order_by('id_aturan','DESC');
    	$query = $this->db->get();
    	return $query;
    }

    public function get()
    {
        return $this->db->get('penyakit');
    }

    public function get2($dgejala)
    {
         $this->db->select('aturan.*,gejala.*');
        $this->db->from('aturan');
    	$this->db->join('gejala','gejala.kode_gejala=aturan.gejala_kode');
         $this->db->where('aturan.gejala_kode',$dgejala);
        $query = $this->db->get();
        return $query;


    }
    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }


    }