<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loader_model extends CI_Model{

    public function css_loader($uri_string)
    {
        // echo '<link href="'.s_url.'mycss/datatable.css" rel="stylesheet" type="text/css" />';

        $date_calendar =array('schedule');
        if (in_array($uri_string, $date_calendar)) 
        {
            // echo '<link href="' . s_url . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" type="text/css" />';
            echo '<link href="'.s_url.'bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
            echo '<link href="'.s_url.'fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />';
        }

        $dt_tables=array('senior');

        if (in_array($uri_string, $dt_tables)) 
        {
            // echo '<link href="' . s_url . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" type="text/css" />';
            echo '<link href="'.s_url.'datatables/datatables.min.css" rel="stylesheet" type="text/css" />';
            echo '<link href="'.s_url.'datatables/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
        }

        $dt_filter_pane = array('senior');

        if (in_array($uri_string, $dt_filter_pane)) 
        {
            echo '<link href="'.s_url.'datatables/searchpanes/css/searchPanes.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
            echo '<link href="'.s_url.'datatables/select/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
        }

        $dt_col_reorder = array('senior');

        if (in_array($uri_string, $dt_col_reorder)) 
        {
            echo '<link href="'.s_url.'datatables/colreorder/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
        }

        if(uri_string() == '' || uri_string() == 'main/sign_choose' || uri_string() == 'main/clinic_login'
        || uri_string() == 'main/patient_login')
        {
            echo '<link href="'.s_url.'mycss/main.css" rel="stylesheet" type="text/css" />';
        }

        if(uri_string() == 'main/clinic_signup')
        {
            echo '<link href="'.s_url.'mycss/clinic_signup.css" rel="stylesheet" type="text/css" />';
        }

        if(uri_string() == 'main/patient_signup')
        {
            echo '<link href="'.s_url.'mycss/patient_signup.css" rel="stylesheet" type="text/css" />';
        }
        
        if(uri_string()== 'profile')
        {
            echo '<link href="'.s_url.'mycss/profile.css" rel="stylesheet" type="text/css" />';
        }
        
    } 

    public function js_pluginLoader($uri_string)
    {
        $date_calendar =array('schedule','profile','patient_history');
        if (in_array($uri_string, $date_calendar)) 
        {
            echo '<script src="' . s_url . 'bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'fullcalendar/fullcalendar.min.js" type="text/javascript" defer></script>';
        }
        
        $dt_tables=array('senior');
        
        if (in_array($uri_string,$dt_tables)) 
        {
            echo '<script src="' . s_url . 'datatables/datatables.min.js" type="text/javascript" defer></script>';
        }

        $dt_filter_pane = array('senior');

        if (in_array($uri_string,$dt_filter_pane)) 
        {
            echo '<script src="' . s_url . 'datatables/searchpanes/js/searchPanes.bootstrap4.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'datatables/select/js/select.bootstrap4.min.js" type="text/javascript" defer></script>';
        }

        $dt_buttons = array('senior');

        if (in_array($uri_string,$dt_buttons)) 
        {
            echo '<script src="' . s_url . 'datatables/buttons/js/buttons.colVis.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'datatables/buttons/js/buttons.bootstrap4.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'datatables/buttons/js/buttons.print.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'datatables/buttons/js/buttons.html5.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'datatables/pdfmake/pdfmake.min.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'datatables/pdfmake/vfs_fonts.js" type="text/javascript" defer></script>';
            echo '<script src="' . s_url . 'datatables/jszip/jszip.min.js" type="text/javascript" defer></script>';
        }

        $dt_col_reorder = array('senior');

        if (in_array($uri_string,$dt_col_reorder)) 
        {
            echo '<script src="' . s_url . 'datatables/colreorder/js/colReorder.bootstrap4.min.js" type="text/javascript" defer></script>';
        }
    }

    public function js_loader($uri_string)
    {

        if(uri_string()=='')
        {
            echo '<script src="'.s_url.'myjs/modules/main/main.js" type="module" defer></script>';
        }

        if(uri_string()=='profile')
        {
            echo '<script src="'.s_url.'myjs/modules/profile/profile.js" type="module" defer></script>';
        }

        if(uri_string()=='senior')
        {
            echo '<script src="'.s_url.'myjs/modules/senior/senior.js" type="module" defer></script>';
        }
        
        // $val = $this->uri->segment(3);
        // if(uri_string()=='student/index/'.$val)
        // {
        //     echo '<script src="'.s_url.'myjs/modules/student/student.js" type="module" defer></script>';
        // }

        

        
        
    }

    public function loadMdl($models) 
    {
        foreach($models as $mdlk=>$mdlv)
        {
            $this->load->model($mdlk,$mdlv);
        }
    }

    
}
