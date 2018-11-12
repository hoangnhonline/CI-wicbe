<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <base href="<?= base_url() ?>" />
        <title>Quản trị website</title>
        <script type="text/javascript" src="<?= base_url('theme/js/jquery-2.0.0.min.js') ?>"></script>
       
        <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ?>favi.png" />
     <script type="text/javascript" src="<?php echo base_url() ?>editor/ck/ckeditor.js"></script> 
            <script type="text/javascript" src="<?php echo base_url() ?>editor/find/ckfinder.js"></script>
        <link href="<?= base_url('theme/css/admin_1.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('theme/css/admin.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('theme/css/login.css') ?>" rel="stylesheet" type="text/css" />


    </head>

    <body id="homepage">
<?php if(!$this->M_session->userdata('admin_login')) redirect( site_url('admin/login') );?>
        <?php $this->load->view('back/inc/header'); ?>  
        <?php $this->load->view('back/inc/topright'); ?>    
        <?php $this->load->view('back/inc/left'); ?>
        <div id="rightside">
            <?php $this->load->view($view); ?>
            <?php $this->load->view('back/inc/footer'); ?>

        </div>

    </body>
</html>