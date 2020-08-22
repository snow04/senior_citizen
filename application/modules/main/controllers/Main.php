<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller 
{
    var $username = '';
    var $password = '';
    var $err = '';

    var $id = '';
    var $firstname = '';
    var $lastname = '';
    var $error = '';

    function __construct() 
    {
        parent::__construct();
        $mdl=array(
            'main_model'=>'main_mdl'
        );
        $this->loader_model->loadMdl($mdl);
    }

    public function index()
    {
        $data['main_content']='main/index';
        $data['page_name']="Main";
        $data['template_type']="default";
        $this->load->view('includes/templates',$data);
    }

    // Signup function /w saving picture . . 

    // public function patientSignUp()
    // {
    //     $profile_picture= 'p_'.strtolower(str_replace(' ', '_', $this->input->post('firstname')).'_'.$this->input->post('lastname'));
        
    //     $config['upload_path']          = './uploads/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['file_name'] = $profile_picture;

    //     $this->load->library('upload', $config);

    //     if ( ! $this->upload->do_upload('profile_picture'))
    //     {
    //             $this->error = array('error' => $this->upload->display_errors());
    //     }
    //     else
    //     {
    //             $data = array('upload_data' => $this->upload->data());

    //             $data2 = array(
    //                 'firstname' => $this->input->post('firstname'),
    //                 'lastname' => $this->input->post('lastname'),
    //                 'birthdate' => $this->input->post('birthdate'),
    //                 'username' => strtolower($this->input->post('username')),
    //                 'password' => password_hash(strtolower($this->input->post('password')), PASSWORD_DEFAULT),
    //                 'profile_picture' => $profile_picture,
    //                 'status' => 'active'
    //             );
        
    //             $insert = 0;
    //             if($this->input->post('id') !=='')
    //             {
    //                 $insert = $this->main_mdl->updatePatient(array("id" => $this->input->post('id')), $data2);
    //             }
    //             else
    //             {
    //                 $insert = $this->main_mdl->registerPatient($data2);
    //             }
    //             echo json_encode(array("status" => TRUE, "id"=> $insert));
    //     }
        
        
        
    // }

    // Register without saving picture . .  
    public function register()
    {
        $data = array(
            'username' => 'gab04',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'firstname'  => 'Armando Gabriel',
            'lastname'  => 'Nieve IV',
            'email' => 'agabriel.nieve@gmail.com',
            'status'  => 1,
        );

        $insert = $this->main_mdl->register($data);
        echo json_encode(array("status" => TRUE, "id" => $insert));
    }

    public function get($type)
    {
        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');

        if($type == 'default')
        {
            $res = $this->loginDefault();
        }
        // customize your login here . . .

        $data = array();

        $data['status'] = $res;

        if($res)
        {
            $data['id'] = $this->id;
            $data['username'] = $this->username;
            $data['firstname'] = $this->password;
            $data['lastname'] = $this->lastname;

        }
        else
        {
            $data['err'] = $this->err;
        }
        echo json_encode($data);
    }

    public function loginDefault()
    {
        $this->main_mdl->get($this->username, $this->password);

        $res = $this->main_mdl->validate_username('default');
        if($res)
        {
            $this->main_mdl->getHash($res[0]->password);
            $this->id = $res[0]->id;
            $this->lastname = $res[0]->lastname;
            $this->firstname = $res[0]->firstname;

            if($this->main_mdl->validate_password())
            {
                return true;
            }
            else
            {
                $this->err.='Password not found!<br>';
                return false;
            }
        }
        else
        {
            $this->err.='Username not found!<br>';
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('');
    }
    
    public function ask_credentials()
    {
        $newsession = array(
            'id'        => $this->input->post('id'),
            'username'  => $this->input->post('username'),
            'lastname'  => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'logged_in' => true
        );
        
        $this->session->set_userdata($newsession);
        echo json_encode(array('status'=>true));
    }
}
