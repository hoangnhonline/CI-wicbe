<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');
if($this->uri->segment(1)==''){$nn = 'vn';}else{$nn = $this->uri->segment(1);}

$i=1;
?>
<div id="slide_khachhang">
    <div style="float: left;width: 100%;clear: both;height: 10px"></div>
    <p><?=$l->lang_khachhang_tb[$lang]?></p>
    <div style="float: left;width: 100%;clear: both;height: 10px"></div>
<div class="wp_khachang">
    <?php foreach($list as $r) { ?>
    <div class="sponsor" title="Click to flip">
        <div class="sponsorFlip">
            <a href="<?=$r->link?>" target="_blank"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$r->thumb ?>&w=140&h=140&zc=1" alt="" /></a>
        </div>
    </div>
    <?php }?>
    <div style="width: 100%;float: left;text-align: center" class="phantrang">
        <p id="thanhphantrang" style="text-align: center"><?=$link?></p>
    </div>

</div>
</div>
