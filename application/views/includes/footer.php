

<script src="<?=s_url?>jquery.min.js"></script>
<script src="<?=s_url?>sweetalert/sweetalert2.all.min.js"></script>
<script src="<?=s_url?>bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<?php $this->loader_model->js_pluginLoader($this->uri->segment(1))?>

<?php
    $data['template_type']=$template_type;
    $data['category']=$this->uri->segment(1);
    $this->loader_model->js_loader($data['category'])
?>

</body>
</html>