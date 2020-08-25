<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sc_printer extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'sc_printer_model'=>'sc_printer_mdl'
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

        $data['main_content']='sc_printer/index';
        $data['page_name']="ID Printing";
        $data['template_type']="admin";
        $this->load->view('includes/templates',$data);
    }
}