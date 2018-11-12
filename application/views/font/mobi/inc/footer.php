<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');

$list= $CI->Thongtin_web->show_company_lang(1,'vn');
$mxh= $CI->Thongtin_web->show_company_lang(1,'vn');
$ol = $CI->Thongtin_web->cuont_truycap();
$dem=$CI->Thongtin_web->truycap(1)->dem;
$arr_online = str_split($ol);
$arr_dem = str_split($dem);
?>


<div id="footer_mb">
    <div class="footer_mb">
    <div class="footer_mb">

        <div class="footer_mangxh">
            <a style="margin-left: 0px" class="secoial_icon icon_fb" target="_blank" href="<?=$mxh->office?>"></a>
            <a class="secoial_icon icon_twitter" target="_blank" href="<?=$mxh->meta_keywords?>"></a>
            <a class="secoial_icon icon_google" target="_blank" href="<?=$mxh->detail?>"></a>
            <a class="secoial_icon icon_google_" target="_blank" href="<?=$mxh->youtube?>"></a>
        </div>
<div class="wp_text_ft">
         <p> DNTN THƯƠNG MẠI HOÀNG TRẦN </p>
        <p>25 Mê Linh P.19, Q. Bình Thạnh, Tp.HCM </p>
        <p> Điện Thoại: (08)3840 0000 - 3512 6747 </p>
        <p> Email: hoangtranwater@gmail.com </p>
</div>

    </div>
    </div>
</div>