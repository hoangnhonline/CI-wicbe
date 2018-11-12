<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('Title');
if($this->uri->segment(1)=='vn'){$nn = 'vn';}else{$nn= 'en';}
if($this->uri->segment(1)=='vn'){$d = 'danh-muc-tin';}else{$d= 'list-of-news';}
if($this->uri->segment(1)=='vn'){$tin = 'tin-tuc';}else{$tin= 'news';}

?>


<div id="menu_title">
    <div class="menu_title">
        <a href="<?=site_url($lang)?>"><?=$l->lang_home[$lang]?></a>
        <a href="" onclick="return false"><?php if(isset($title)){echo $title;} ?></a>
    </div>
</div>

<div id="content">
    <div class="content">

        <?= $this->load->view('font/about/left')?>


        <div class="right_content">
            <?php   $this->load->view('font/about/chitiet') ?>
        </div>
    </div>
</div>


