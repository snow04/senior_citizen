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
}