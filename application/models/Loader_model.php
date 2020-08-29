<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loader_model extends CI_Model{

    function css($link)
    {
        echo '<link href="'.s_url.$link.'"  rel="stylesheet" type="text/css"/>';
    }

    function css_load($url, $link)
    {
        if(uri_string() == $url)
        {
            echo '<link href="'.s_url.$link.'" rel="stylesheet" type="text/css" />';
        }
    }

    function js_plug($src)
    {
        echo '<script src="'.s_url.$src.'" type="text/javascript" defer></script>';
    }

    public function js($url, $with_id, $script)
    {
        $val = '/';

        if($with_id)
        {
            $val .= $this->uri->segment(3);
        }
        else
        {
            $val = '';
        }

        if(uri_string()==$url.$val)
        {
            echo '<script src="'.s_url.'myjs/modules/'.$script.'" type="module" defer></script>';
        }
    }

    public function css_loader($uri_string)
    {
        $date_calendar =array('schedule');
        if (in_array($uri_string, $date_calendar)) 
        {
            $this->css('bootstrap-datepicker/css/bootstrap-datepicker.min.css');
            $this->css('fullcalendar/fullcalendar.min.css');
        }

        $dt_tables=array('senior','users','sc_printer');
        if (in_array($uri_string, $dt_tables)) 
        {
            $this->css('datatables/datatables.min.css');
            $this->css('datatables/datatables/css/dataTables.bootstrap4.min.css');
        }

        $dt_filter_pane = array('senior','users','sc_printer');

        if (in_array($uri_string, $dt_filter_pane)) 
        {
            $this->css('datatables/searchpanes/css/searchPanes.bootstrap4.min.css');
            $this->css('datatables/select/css/select.bootstrap4.min.css');
        }

        $dt_col_reorder = array('senior', 'users','sc_printer');

        if (in_array($uri_string, $dt_col_reorder)) 
        {
            $this->css('datatables/colreorder/css/colReorder.bootstrap4.min.css');
        }

        $this->css_load('','mycss/main.css');
        $this->css_load('main/sign_choose', 'mycss/main.css');
        $this->css_load('main/clinic_login', 'mycss/main.css');
        $this->css_load('main/patient_login', 'mycss/main.css');
        $this->css_load('main/clinic_signup', 'mycss/clinic_signup.css');
        $this->css_load('main/patient_signup', 'mycss/patient_signup.css');
        $this->css_load('profile', 'mycss/profile.css');
        $this->css_load('sc_printer', 'mycss/css/sc_printer.css');
    
    }

    
    public function js_pluginLoader($uri_string)
    {
        $date_calendar =array('schedule','profile','patient_history');
        if (in_array($uri_string, $date_calendar)) 
        {
            $this->js_plug('bootstrap-datepicker/js/bootstrap-datepicker.min.js');
            $this->js_plug('fullcalendar/fullcalendar.min.js');
        }
        
        $dt_tables=array('senior', 'users','sc_printer');
        
        if (in_array($uri_string,$dt_tables)) 
        {
            $this->js_plug('datatables/datatables.min.js');
        }

        $dt_filter_pane = array('senior', 'users','sc_printer');

        if (in_array($uri_string,$dt_filter_pane)) 
        {
            $this->js_plug('datatables/searchpanes/js/searchPanes.bootstrap4.min.js');
            $this->js_plug('datatables/select/js/select.bootstrap4.min.js');
        }

        $dt_buttons = array('senior', 'users','sc_printer');

        if (in_array($uri_string,$dt_buttons)) 
        {
            $this->js_plug('datatables/buttons/js/buttons.colVis.min.js');
            $this->js_plug('datatables/buttons/js/buttons.bootstrap4.min.js');
            $this->js_plug('datatables/buttons/js/buttons.print.min.js');
            $this->js_plug('datatables/buttons/js/buttons.html5.min.js');
            $this->js_plug('datatables/pdfmake/pdfmake.min.js');
            $this->js_plug('datatables/pdfmake/vfs_fonts.js');
            $this->js_plug('datatables/jszip/jszip.min.js');
        }

        $dt_col_reorder = array('senior', 'users','sc_printer');

        if (in_array($uri_string,$dt_col_reorder)) 
        {
            $this->js_plug('datatables/colreorder/js/colReorder.bootstrap4.min.js');
        }
    }
    
    public function js_loader($uri_string)
    {

        $this->js('', false, 'main/main.js');
        $this->js('profile', false, 'profile/profile.js');
        $this->js('senior', false, 'senior/senior.js');
        $this->js('users', false, 'users/users.js');
        $this->js('sc_printer', false, 'sc_printer/sc_printer.js');
        
    }

    public function loadMdl($models) 
    {
        foreach($models as $mdlk=>$mdlv)
        {
            $this->load->model($mdlk,$mdlv);
        }
    }
    
}
