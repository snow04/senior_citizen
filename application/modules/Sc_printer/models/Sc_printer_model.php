<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sc_printer_model extends CI_Model
{
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function load_print()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('pi_pk','DESC');
        $query = $this->db->get();
        return $query->result();
    }
}