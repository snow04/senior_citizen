<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=strtoupper(getenv('SITENAME'))." | ";echo (empty($page_name))?"":ucwords($page_name)?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="<?=s_url?>sweetalert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?=s_url?>fontawesome/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=s_url?>bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />


        <link href="<?=s_url?>mycss/simple-sidebar.css" rel="stylesheet" type="text/css" />
        
        <?php echo $this->loader_model->css_loader($this->uri->segment(1));?>
       
    </head>
    <body style="margin: 0; padding:0;">
