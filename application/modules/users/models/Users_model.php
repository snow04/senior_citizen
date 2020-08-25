<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function users_load()
    {
        $this->db->select('*');
        $this->db->from('default');
        $query = $this->db->get();
        return $query->result();
    }

    public function group_load()
    {
        $this->db->select('*');
        $this->db->from('usertype');
        $query = $this->db->get();
        return $query->result();
    }

    public function registerUser($data)
    {
      $this->db->insert('default', $data);
      return $this->db->insert_id();
    }

    public function updateUser($where,$data)
    {
      $this->db->update('default', $data, $where);
      return $this->db->affected_rows();
    }
}