<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Senior_model extends CI_Model
{
    var $table = 'personal_info';

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function senior_list()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data)
    {
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
    }

    public function update($where,$data)
    {
      $this->db->update($this->table, $data, $where);
      return $this->db->affected_rows();
    }
    
}