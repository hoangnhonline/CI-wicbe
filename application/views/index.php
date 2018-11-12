<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="vi" xml:lang="vi" xmlns="http://www.w3.org/1999/xhtml">

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
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>favi.png" />
    <link rel="alternate" href="<?=site_url()?>" hreflang="vi-vn" />
   <link rel="alternate" href="<?=site_url()?>" hreflang="vi" />
    <meta http-equiv="content-language" content="vi" />
    <title><?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?></title>
    <link rel="alternate" href="<?php if(isset($name1)){ echo $name1;}else{ echo site_url();}?>" hreflang="vi-vn" />
    <meta http-equiv="description" name="description" content="<?php if(!empty($description)) {echo $description; } else{ echo $ft->description;} ?>" />
    <meta http-equiv="keywords" name="keywords" content="<?php if(!empty($keywords)) {echo $keywords; } else{ echo $ft->keywords;} ?>" />
    <base href="<?= site_url() ?>">
    <meta http-equiv="author" content="Email : huynhkimngadtu@gmail.com"/>
    <meta name="generator" content="Phone : 0935806696"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no" />
    <link type='text/css' rel="stylesheet" media="all" href="<?= base_url('theme/css/reset.css') ?>" />
    <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/style.css?v=1') ?>"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>theme/css/ddsmoothmenu.css" />
    <script type="text/javascript" src="<?=base_url()?>theme/js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="<?=base_url()?>theme/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>theme/js/jquery.bxslider.js"></script>
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="wicbe.com" />
    <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/responsive.css?v=1') ?>"/>
    <meta property="og:title" itemprop="headline" content="<?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?>" />
    <meta property="og:url" itemprop="url" content="<?php if(isset($name1)){ echo $name1;}else{ echo site_url();}?>" />
    <meta property="og:image" itemprop="thumbnailUrl" content="<?php if(isset($link1)){ echo base_url($link1);}else{ echo base_url($ft->logo);}?>" />
    <meta property="og:title" content="<?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?>" />
    <meta property="og:description" content="<?php if(!empty($description)) {echo $description; } else{ echo $ft->description;} ?>" />
    <meta property="og:keywords" content="<?php if(!empty($keywords)) {echo $keywords; } else{ echo $ft->keywords;} ?>" />
<!--    --><?php //if(isset($images_slide)){ ?>
<!--        --><?php //foreach ($images_slide as $sli){ ?>
<!--            --><?php //if($sli->img !=''){ $simg = $sli->img; }else{$simg ='';}?>
<!--    <meta property="og:image" itemprop="thumbnailUrl" content="--><?php //if($simg !=''){ echo base_url('uploads/san-pham/'.$simg);}else{ echo base_url($ft->logo);}?><!--" />-->
<!--        --><?php //} ?>
<!--    --><?php //} ?>

<?=$ft->analytic?>
</head>

    <body>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KG2R3PC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <?php $this->load->view('font/inc/header') ?>
    
    <?php $this->load->view($view) ?>

    <?php $this->load->view('font/inc/footer') ?>


    <div itemscope itemtype="http://schema.org/Organization" style="display:none">
        <span itemprop="name"><?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?></span>
        <img itemprop="image" src="<?=$ft->logo?>" alt="<?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?>" />
        <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
            <span itemprop="ratingValue">9</span>/<span itemprop="bestRating">10</span>
            <span itemprop="ratingCount">99</span> Bình chọn
            <span itemprop="author"></span>
            <span itemprop="description"><?php if(!empty($description)) {echo $description; } else{ echo $ft->description;} ?></span>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cart').click(function() {
                var idsp = $(this).attr('id');
                var sl = $("#input_" + idsp).val();
                $.post('addcart', {idsp: idsp,sl:sl}, function(data) {
                        alert("Đã thêm vào giỏ hàng !");
                        window.location.href = '<?=site_url('gio-hang')?>';
                });
                return false;
            });
        });
    </script>
    </body>
</html>





