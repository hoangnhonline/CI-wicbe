<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

$CI = &get_instance();
$CI->load->model('Thongtin_web');
$CI->load->model('M_category');
$ft= $CI->Thongtin_web->show_company(1);

$menu_sp1 = $CI->M_category->list_category_all(array('status' => 1,'top' => 0, 'type' => 3));

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>icon.jpg" />
    <title><?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?></title>
    <meta http-equiv="description" name="description" content="<?php if(!empty($description)) {echo $description; } else{ echo $ft->description;} ?>" />
    <meta http-equiv="keywords" name="keywords" content="<?php if(!empty($keywords)) {echo $keywords; } else{ echo $ft->keywords;} ?>" />
    <base href="<?= site_url() ?>">
    <meta property="og:title" content="<?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?>" />
    <meta property="og:description" content="<?php if(!empty($description)) {echo $description; } else{ echo $ft->description;} ?>" />
    <meta property="og:keywords" content="<?php if(!empty($keywords)) {echo $keywords; } else{ echo $ft->keywords;} ?>" />
    <meta http-equiv="author" content="Email : huynhkimngadtu@gmail.com"/>
    <meta name="generator" content="Phone : 0935806696"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no" />
    <link type='text/css' rel="stylesheet" media="all" href="<?= base_url('theme/css/reset.css') ?>" />
    <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/style.css') ?>"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>theme/css/ddsmoothmenu.css" />
    <script type="text/javascript" src="<?=base_url()?>theme/js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="<?=base_url()?>theme/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>theme/js/jquery.bxslider.js"></script>
    <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/responsive.css') ?>"/>
    <meta property="og:title" itemprop="headline" content="<?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?>" />
    <meta property="og:url" itemprop="url" content="<?php if(isset($name1)){ echo $name1;}else{ echo site_url();}?>" />
    <meta property="og:image" itemprop="thumbnailUrl" content="<?php if(isset($link1)){ echo base_url($link1);}else{ echo base_url($ft->logo);}?>" />

<?=$ft->analytic?>
</head>

    <body>


    <?php  $this->load->view('font/inc/header') ?>
    
    <?php  $this->load->view($view) ?>

    <?php   $this->load->view('font/inc/social') ?>
    <?php   $this->load->view('font/inc/footer') ?>
    </body>
</html>





