<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyakit extends CI_model
{

     public function tampildata()
    {
        $query = $this->db->select('*')
            ->from('penyakit')
            ->order_by('kode_penyakit', 'ASC')
            ->get();
        return $query->result();
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    }