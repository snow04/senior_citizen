<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Senior_model extends CI_Model
{
    var $table = 'personal_info';
    var $view = 'vw_doctor';

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
}