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
        $this->db->order_by('pi_pk','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function load_barangay()
    {
        $this->db->select('DISTINCT (`barangay`) ');
        $this->db->from('purok');
        $this->db->order_by('barangay','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function load_purok($barangay)
    {
        $this->db->select('DISTINCT (`purok`) ');
        $this->db->from('purok');
        $this->db->where('barangay', $barangay);
        $this->db->order_by('purok','DESC');
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

    public function upload_qr($id, $filename)
    {
      $data = array(
        'pi_pk' => $id,
        'qr_code' => $filename
      );  

      $this->db->where('pi_pk', $id);
      $query = $this->db->get('person_validation');

      if($query->result()){

          $this->db->where('pi_pk', $id);
          $this->db->update('person_validation', $data);
          return $this->db->affected_rows();

      }else{

          $result= $this->db->insert('person_validation',$data);
          return $result;

      }
    }
    
}