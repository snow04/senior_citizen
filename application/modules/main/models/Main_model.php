<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model
{
    var $table = 'default';
    var $view = '';

    var $username = '';
    var $password = '';
    var $hash = '';

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    function get($user, $pass){
        $this->username = $user;
        $this->password= $pass;
    }

    function register($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function registerClinic($data)
    {
        $this->db->insert('clinic_owner', $data);
        return $this->db->insert_id();
    }

    public function updateClinic($where,$data)
    {
        $this->db->update('clinic_owner', $data, $where);
        return $this->db->affected_rows();
    }

    function registerPatient($data)
    {
        $this->db->insert('patient', $data);
        return $this->db->insert_id();
    }

    public function updatePatient($where,$data)
    {
        $this->db->update('patient', $data, $where);
        return $this->db->affected_rows();
    }

    function getHash($hash){
        $this->hash = $hash;
    }
    
    function validate_username($payts)
    {
        $this->db->select('*');
        $this->db->from($payts);
        $this->db->where('username', $this->username);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function validate_password()
    {
        if(password_verify($this->password, $this->hash))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}