<style>
    .truycap{text-align: center;margin-top: 20px; margin-bottom: 20px}
</style>

<div style="color: #69b10b; font-size: 25px; text-align: center; font-weight: bold; text-transform: uppercase"> trang quản trị website</div>


<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');

//$list= $CI->Thongtin_web->show_company_lang(1,$this->uri->segment(1));
//$mxh= $CI->Thongtin_web->show_company_lang(1,$nn);
$ol = $CI->Thongtin_web->cuont_truycap();
$dem=$CI->Thongtin_web->truycap(1)->dem;
$arr_online = str_split($ol);
$arr_dem = str_split($dem);
?>


<div class="access">
    <p>Tổng truy cập : </p>
    <span style="float: left;width: 100%;clear: both;height: 5px"></span>
    <div style="">
        <?php foreach ($arr_dem as $n) { ?>

            <span class="online"><?=$n?></span>
        <?php }?>
    </div>
    <span style="float: left;width: 100%;clear: both;height: 5px"></span>
    <p>Đang online :</p>
    <span style="float: left;width: 100%;clear: both;height: 5px"></span>
    <?php foreach ($arr_online as $dem) { ?>
        <span class="online"><?=$dem?></span>
    <?php } ?>
</div>
<style>
    .access{width: 100%;float: left}
    .access p{float: left;color: #f00;width: 100px}
</style>
