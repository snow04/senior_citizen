<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'users_model'=>'users_mdl'
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

        $data['main_content']='users/index';
        $data['page_name']="Users";
        $data['template_type']="admin";
        $this->load->view('includes/templates',$data);
    }
    public function usertype_load()
    {
        $list = $this->users_mdl->group_load();
        echo json_encode($list);
    }
    public function group_load()
    {
        $list = $this->users_mdl->group_load();
        

        $data = array();

        foreach ($list as $t) 
        {
            $row = array();

            $row['usertype'] = $t->usertype;
            $row['description'] = $t->description;

            $row['action'] = '<button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>';
           
            $data[] = $row;
        }  
 
        $output = array(
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    public function users_load()
    {
        $list = $this->users_mdl->users_load();
        

        $data = array();

        foreach ($list as $t) 
        {
            $row = array();

            $name = array();
            $name[] = $t->firstname;
            $name[] = $t->lastname;

            $row['name'] = $name;

            $row['username'] = $t->username;
            $row['email'] = $t->email;
            $row['usertype'] = $t->usertype;
            $row['status'] = $t->status == 1 ? 'Active' : 'Inactive';
            $row['action'] = '<button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
           
            $data[] = $row;
        }  
 
        $output = array(
            "data" => $data,
        );
        
        echo json_encode($output);
    }

    public function registerUser()
    {
        if(!empty($this->input->post('lastname')) &&
        !empty($this->input->post('firstname')) &&
        !empty($this->input->post('username')) &&
        !empty($this->input->post('email')) &&
        !empty($this->input->post('password')) &&
        !empty($this->input->post('usertype'))
        )
        {
            $data3 = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT) ,
                'status' => 1,
                'usertype' => $this->input->post('usertype'),
            );
            
            if($this->input->post('id') == '')
            {
                $insert = $this->users_mdl->registerUser($data3);
            }
            else
            {
                $insert = $this->users_mdl->updateUser(array("id" => $this->input->post('id')), $data3);
            }
    
            echo json_encode(array("status" => TRUE, "id"=> $insert));
        }
        else
        {
            echo json_encode(array("status" => FALSE, "err_msg"=>'All fields are required'));
        }
    }

}