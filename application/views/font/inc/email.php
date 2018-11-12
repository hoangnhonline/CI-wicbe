<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');
if($this->uri->segment(1)==''){$nn = 'vn';}else{$nn = $this->uri->segment(1);}
$list= $CI->Thongtin_web->show_company_lang(1,$this->uri->segment(1));
$mxh= $CI->Thongtin_web->show_company_lang(1,$nn);

?>

<div class="wp_mail_phone_fax_home">
    <div class="mail_phone_fax_home">
        <div class="mail_home">
            <span class="icon_email_home"></span>
            <p><b> Email : </b><?=$mxh->in?></p>
        </div>
        <div class="mail_home">
            <span class="icon_phone_home"></span>
            <p><b>Phone : </b><?=$list->copyright?></p>
        </div>
        <div class="mail_home">
            <span class="icon_fax_home"></span>
            <p><b>Fax:</b> <?=$mxh->detail?></p>
        </div>
        <div class="find_dt">
            find us on
        </div>

    </div>
</div>