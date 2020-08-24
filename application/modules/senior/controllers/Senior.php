<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Senior extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'senior_model'=>'senior_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }

    function validate()
    {
        if(!$this->session->has_userdata('logged_in'))
        {
            redirect(base_url());
        }
    }

    public function index()
    {
        // Call this function whenever you use to load your view / functions . . . 

        $this->validate();

        $data['main_content']='senior/index';
        $data['page_name']="Senior Citizen";
        $data['template_type']="admin";
        $this->load->view('includes/templates',$data);
    }
    public function senior_list()
    {
        $list = $this->senior_mdl->senior_list();
        

        $data = array();

        foreach ($list as $t) 
        {
            $row = array();

            $name = array();
            $name[] = $t->fname;
            $name[] = $t->lname;

            $row['name'] = $name;

            // $row['username'] = $t->username;
            $row['gender'] = $t->sex;
            $row['purok'] = $t->purok;
            $row['barangay'] = $t->barangay;
            $row['picture'] = 'p';
            $row['signature'] = 's';
            $row['thumbmark'] = 't';
           
            $data[] = $row;
        }  
 
        $output = array(
            "data" => $data,
        );
        
        echo json_encode($output);
    }

    function save()
    {
        $data3 = array(
            'fname' => $this->input->post('firstname'),
            'mname' => $this->input->post('middlename'),
            'lname' => $this->input->post('lastname'),
            'birthdate' => $this->input->post('birthdate'),
            'sex' => $this->input->post('gender'),
            'purok' => $this->input->post('purok'),
            'barangay' => $this->input->post('barangay'),
        );
        
        if($this->input->post('id') == '')
        {
            $insert = $this->senior_mdl->save($data3);
        }
        else
        {
            $insert = $this->senior_mdl->update(array("id" => $this->input->post('id')), $data3);
        }

        echo json_encode(array("status" => TRUE, "id"=> $insert));
    }
}