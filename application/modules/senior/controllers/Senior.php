<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Senior extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $this->load->library('phpqrcode/qrlib');
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
        else{
        }
    }

    function load_barangay()
    {
        echo json_encode($this->senior_mdl->load_barangay());
    }

    function load_purok($barangay)
    {
        $output =  str_replace('%20', ' ', $barangay);
        echo json_encode($this->senior_mdl->load_purok($output));
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
            $row['pi_pk'] = $t->pi_pk;

            // $row['username'] = $t->username;
            $row['gender'] = $t->sex;
            $row['purok'] = $t->purok;
            $row['barangay'] = $t->barangay;
            $row['picture'] = '<button class="btn btn-success btn-sm"><i class="fa fa-id-card"></i></button>';
            $row['signature'] = '<button class="btn btn-primary btn-sm"><i class="fa fa-signature"></i></button>';
            $row['thumbmark'] = '<button class="btn btn-danger btn-sm"><i class="fa fa-fingerprint"></i></button>';
           
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
            'lname' => $this->input->post('lastanme'),
            'birthdate' => $this->input->post('birthdate'),
            'sex' => $this->input->post('gender'),
            'purok' => $this->input->post('purok'),
            'barangay' => $this->input->post('barangay'),
        );
        
        if($this->input->post('id') == '')
        {
            $insert = $this->senior_mdl->save($data3);
            $this->qrcodeGenerator($insert);
        }
        
        else
        {
            $insert = $this->senior_mdl->update(array("id" => $this->input->post('id')), $data3);
        }

        echo json_encode(array("status" => TRUE, "id"=> $insert));
    }

    public function qrcodeGenerator ($id)
	{
		
			//file path for store images
		    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/assets/qr/';
		   
			$text= substr($id, 0,9);
			
			$folder = $SERVERFILEPATH;
			$file_name1 = $id . ".png";
			$file_name = $folder.$file_name1;
            QRcode::png($text,$file_name);
            
            $this->senior_mdl->upload_qr($id,$file_name1);
			
    }
}