<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rjtp_model extends CI_Model {

    public $table = 'tb_program';
    public $kd = 'id';
    public $id = 'id_pelayanan';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }
    
    // get all
    function get_all($id = 2) {
        $this->db->order_by($this->kd, $this->order);
        $this->db->where('id_pelayanan', $id);
        return $this->db->get('tb_program')->result();

        
    }

    // get data by kd
    function get_by_kd($kd) {
        $this->db->where($this->kd, $kd);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kode_program', $q);
        $this->db->or_like('nama_program', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->kd, $this->order);
        $this->db->like('kode_program', $q);
        $this->db->or_like('nama_program', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($kd, $data) {
        $this->db->where($this->kd, $kd);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($kd) {
        $this->db->where($this->kd, $kd);
        $this->db->delete($this->table);
    }

}

/* End of file rjtp_model.php */
/* Location: ./application/models/rjtp_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */