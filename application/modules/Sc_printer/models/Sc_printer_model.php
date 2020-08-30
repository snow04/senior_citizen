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
        $this->db->select(
        'personal_info.pi_pk,
        personal_info.lname,
        personal_info.fname,
        personal_info.purok,
        personal_info.barangay,
        person_validation.date');
        
        $this->db->from('personal_info');
        $this->db->join('person_validation', 'personal_info.pi_pk = person_validation.pi_pk');
        $this->db->order_by('pi_pk','DESC');
        $this->db->where('picture !=', 'NULL');
        $this->db->where('signature !=', 'NULL OR thumbmark != NULL' );
        $query = $this->db->get();
        return $query->result();
    }
}