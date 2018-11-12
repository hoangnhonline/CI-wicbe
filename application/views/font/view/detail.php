<?php
    $CI  = &get_instance();
    $CI->load->model('Title');
    $CI->load->model('Thongtin_web');
    $CI->load->model('M_artice');
    $lh = $CI->Thongtin_web->show_company(1);
    if($this->uri->segment(1)==""){$nn='vn';}else{$nn = $this->uri->segment(1);}
    if($nn=='vn'){$dau_tu = 'co-hoi-dau-tu';}else{$dau_tu='investment-opportunities';}
    if($nn=='vn'){$library = 'thu-vien-nghien-cuu';}else{$library='research-library';}
    if($nn=='vn'){$news = 'tin-tuc';}else{$news='news';}
    $contact_dautu =  $CI->M_artice->show_list_page_home_tailieu(array('article.id'=>81),$nn);
?>


<div class="wp_vuonuom">
    <div style="background: #495470;float: left;width: 100%">
        <div class="title_vuonuom">
            <a href="<?= site_url($lang.'/'.$l->lang_home_link[$lang]) ?>" class="icon_home_vuonuom"></a>
            <span class="arrow_vu"></span>
            <h1 class="text_title_vu"><?=$l->lang_read_news[$lang]?></h1>
            <div class="phone_vu">
                <span class="icon_phone_vu"></span>
                <p><?=$lh->copyright?></p>
            </div>
        </div>


    </div>

    <div style="width: 1000px;margin: auto;" class="content_vu">
        <div class="wp_view_connent">
        <div class="view_connent">
            <span style="float: left;width: 100%;clear: both;height: 10px"></span>
    <h1>
        <?=$row->article_name?>
    </h1>
        <span style="float: left;width: 100%;clear: both;height:5px" ></span>
        <?=$row->article_content?>
        <span style="float: left;width: 100%;clear: both;height:5px"></span>

        <?php if(count($lienquan) >0 ) { ?>
            <span style="color: #f00;font-weight: bold"><?=$l->lang_view_lq[$lang]?></span>
        <?php  } ?>
        <div class="">
    <?php foreach($lienquan  as $lq) { ?>

        <span class="tin_lq"><span class="icon_tt_h"></span>
            <a href="<?=site_url($nn.'/'.$news.'/'.$lq->article_link)?>">   <?=$lq->article_name?> ( <?=date('m/Y',strtotime($lq->date_modify) )?>)</a> </span>
    <?php } ?>
    <span style="float: left;width: 100%;clear: both;height: 10px"></span>
        </div>
    </div>
</div>
    </div>
<style>
   .tin_lq {
        width: 100%;
        float: left;
    }
   #footer{margin-top: 0px!important;}
   .tin_lq a {color: #686868;  font-size: 13px;  width: 90%;  float: left;  margin-left: 13px;  margin-top:2px;  }
</style>