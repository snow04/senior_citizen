<?php

if($template_type=="default") 
{
    $this->load->view('includes/header');
    $this->load->view('includes/main');
    $this->load->view('includes/footer');
}

if($template_type == 'admin')

{
    $this->load->view('includes/admin/header');
    $this->load->view('includes/admin/sidebar');
    $this->load->view('includes/admin/navbar');
    $this->load->view('includes/main');
    $this->load->view('includes/admin/footer');
}