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
            $row['picture'] = '<button class="btn btn-success btn-sm btnPictureUpload" id="'.$t->pi_pk.'"><i class="fa fa-id-card"></i></button>';
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


    public function upload()
	{
		// echo "<pre>";
		// print_r($_FILES);
		// print_r($_POST);
		// exit();

        $base64strcount = count($_POST["base64str"]);
        
		for($i=0;$i<$base64strcount;$i++)
		{
            $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/assets/picture/';
			$img_name = time()."_".rand(0,999999).".".FILE_EXT_PNG;
			$img_path = $SERVERFILEPATH.$img_name;
			$img = $_POST["base64str"][$i];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace('data:image/jpg;base64,', '', $img);
			$img = str_replace('data:image/jpeg;base64,', '', $img);
			$img = str_replace('data:image/gif;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$img_data = base64_decode($img);

			$im = imagecreatefromstring($img_data);
			if ($im !== false) 
			{
				//header('Content-Type: image/png');
				imagepng($im, $img_path);
				imagedestroy($im);
			}
			else 
			{
				echo 'An error occurred.';
				exit();
			}

			// Get new sizes
			list($width, $height) = getimagesize($img_path);
			$extension = pathinfo($img_path, PATHINFO_EXTENSION);

			$resize_image_arr = array();
			// array_push($resize_image_arr, array("width" => "75", "height" => "75", "base_path" => BASE_UPLOAD_PATH_75));
			// array_push($resize_image_arr, array("width" => "120", "height" => "120", "base_path" => BASE_UPLOAD_PATH_120));
			array_push($resize_image_arr, array("width" => "500", "height" => "500", "base_path" => $SERVERFILEPATH));

			foreach ($resize_image_arr as $row) 
			{
				// CREATE IMAGES
				$newwidth = $row['width'];
				$newheight = $row['height'];

				// Load
				$destination = imagecreatetruecolor($newwidth, $newheight);
				$source = imagecreatefromstring($img_data);
				
				// Resize
				imagecopyresized($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

				// Output
				imagepng($destination, $row['base_path'].$img_name);
			}
		}
    }
    
    

}