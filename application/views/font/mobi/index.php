<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');
$CI->load->library('user_agent');
$CI->load->model('M_artice');
$ft= $CI->Thongtin_web->show_company_lang(1,'vn');
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?= base_url('theme/css/mobi/css/style.css?v=') ?><?=time()?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ?>icon.ico" />
    <title><?php if(!empty($title)){echo $title;}else {echo $ft->name;}  ?></title>
    <base href="<?= site_url() ?>">
    <meta http-equiv="description" name="description" content="<?php if(!empty($description)) {echo $description; } else{ echo $ft->address_2;} ?>" />
    <meta http-equiv="keywords" name="keywords" content="<?php if(!empty($keywords)) {echo $keywords; } else{ echo $ft->address;} ?>" />
    <meta http-equiv="author" content="Công Ty TNHH Thương Mại Điện Tử iCLick - iClick E-Commerce Company Limited."/>
    <meta name="generator" content="IClick E-Commerce Co.Ltd"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link type='text/css' rel="stylesheet" media="all" href="<?= base_url('theme/css/reset.css') ?>" />
    <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/jquery.bxslider.css') ?>"/>
    <script type="text/javascript" src="<?php echo base_url() ?>theme/js/jquery-1.8.2.min.js" ></script>
    <script type="text/javascript" src="<?= base_url('theme/js/jquery.bxslider.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('theme/js/jquery.bxslider.js') ?>"></script>

    <script type="text/javascript" src="<?= base_url('theme/css/mobi/js/pushScroll.js') ?>"></script>

</head>


<?php
$CI = &get_instance();
if($this->uri->segment(1)==''){$nn='vn';}else{$nn=$this->uri->segment(1);}
$CI->load->model('Thongtin_web');
$CI->load->model('M_artice');
$ft= $CI->Thongtin_web->show_company_lang(1,'vn');


?>

<body>

<div id="header">
    <?php $this->load->view('font/mobi/inc/menu') ?>
</div>


<?php  $this->load->view('font/mobi/inc/slide') ?>
<div id="content_hom">
    <?php  $this->load->view($view) ?>
</div>


<div id="footer">
    <?php  $this->load->view('font/mobi/inc/footer') ?>

</div>





</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('.cart').click(function() {
            var idsp = $(this).attr('id');
            var lang = $(".lang").val();
            $.post('addcart', {idsp: idsp}, function(data) {
                if (data != '')
                {
                    var tong = $('#tong').text();
                    $('#tong').text(parseInt(tong) + 1);
                }
                if (data == 'insert')
                {
                    if (lang == 'vn')
                        alert("Đã thêm vào giỏ hàng !");
                    else
                        alert("Đã thêm vào giỏ hàng !");
                    window.location.reload()
                }
                else {

                    if (lang == 'vn')
                        alert('Đã cập nhật số lượng !');
                    else
                        alert('Đã cập nhật số lượng !');
                    window.location.reload()
                }

            });
            return false;

        });

    })
</script>
