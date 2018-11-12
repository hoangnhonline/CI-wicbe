<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$CI= &get_instance();
$CI->load->model('M_session');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Quản trị website</title>
        <base href="<?= base_url() ?>" />
        <script type="text/javascript" src="<?= base_url('theme/js/jquery-2.0.0.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('editor/ck/ckeditor.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('theme/js/jquery.ui.datepicker.js') ?>"></script>
       
        <script type="text/javascript" src="<?= base_url('editor/find/ckfinder.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('theme/js/jquery.datetimepicker.js') ?>"></script>
        <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ?>icon.ico" />
        <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ?>icon.ico" />
        <link href="<?= base_url('theme/css/jquery.datetimepicker.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('theme/css/style.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('theme/css/login.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('theme/css/logut.css') ?>" rel="stylesheet" type="text/css" />
    </head>

    <body id="homepage">
<?php if(!$CI->M_session->userdata('admin_login')) redirect(site_url('admin/login'));?>
        <?php $this->load->view('back/inc/header'); ?>  
        <?php $this->load->view('back/inc/topright'); ?>    
        <?php $this->load->view('back/inc/left'); ?>
        <div id="rightside">
            <?php $this->load->view($view); ?>
            <?php $this->load->view('back/inc/footer'); ?>
        </div>

    </body>
</html>