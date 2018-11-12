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
            <h1 class="text_title_vu"><?=$l->lang_dautu[$lang]?></h1>
            <div class="phone_vu">
                <span class="icon_phone_vu"></span>
                <p><?=$lh->copyright?></p>
            </div>
        </div>
    </div>
    <span style="float: left;width: 100%;clear: both;height: 10px"></span>
    <div class="list_vu_content">
        <div class="datu_left">
            <div class="summaty_title_dautu">
                <?php $thumb_contact = $CI->M_artice->show_thumb($contact_dautu->id); ?>
                <a href="#" onclick="return false"> <img src="<?=$thumb_contact->thumb?>" width="200px" height="125px"></a>
                <div class="text_summary_dautu">
                    <h1>Cơ hội đầu tư</h1>
                    <span style="color: #929090;float: left">
                        <?= $contact_dautu->article_summary ?>
                     </span>
                </div>
            </div>
            <span style="float: left;width: 100%;clear: both;height: 15px"></span>
            <div class="list_datu">
                <?php $a=1; ?>
                <?php foreach($dautu as $dt) { ?>
                    <?php $thumb = $CI->M_artice->show_thumb($dt->id) ?>
                    <div class="child_datu" style="<?php if($a%3==0){echo 'margin-right:0px';}?>;<?php if($a>3){echo 'margin-top:10px';}?>">
                        <a href="<?=site_url($nn.'/'.$dau_tu.'/'.$dt->article_link)?>"> <img src="<?=$thumb->thumb?>" width="235px" height="135"></a>
                        <h3><a href="<?=site_url($nn.'/'.$dau_tu.'/'.$dt->article_link)?>"><?=$dt->article_name?></a> </h3>
                        <div class="summary_datu">
                    <span class="text_summary_datu">
                   <?=$this->Title->laychuoi($dt->article_summary,100)?>
                    </span>
                        </div>
                    </div>
                    <?php $a++;  } ?>
            </div>
        </div>
        <div class="datu_right">
            <?php $this->load->view('font/inc/dautu_vuonuom') ?>
            <div class="news_you">
                <div class="title_why_we">
                    <span class="icon_read_news"></span>
                    <span class="text_why_dautu"><?=$l->lang_read_news[$lang]?></span>
                </div>
                <span class="link_why_dautu"></span>

                <ul class="list_new_datu">
                    <?php foreach($read_news as $read){ ?>
                        <li><span class="icon_new_hơme"></span>
                            <a href="<?=site_url($nn.'/'.$news.'/'.$read->article_link)?>"><?=$read->article_name?> <b>(<?=date('d/m/Y', strtotime($read->date_modify))?>)</b></a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>

    </div>
    <span style="float: left;width: 100%;clear: both;height: 10px"></span>
    <div class="duan_dathau">
        <span style="width: 100%;height: 1px;background: #d4d4d4;float: left;"></span>
        <span style="float: left;width: 100%;clear: both;height: 10px"></span>
        <span style="float: left;width: 100%"><p style="text-align: center;color: #292525;font-size: 14px;text-transform: uppercase;font-weight: bold"><?=$l->lang_duan_dautu[$lang]?></p></span>
        <span style="float: left;width: 100%;clear: both;height: 10px"></span>
        <div class="list_nhathau">
            <div class="list_slide_nhathau">
                <?php foreach($nhathau as $nt) { ?>
                    <?php $thumb1 = $CI->M_artice->show_thumb($nt->id) ?>
                    <div class="child_nhathau">
                        <a href="<?=site_url($nn.'/'.$dau_tu.'/'.$nt->article_link)?>"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb1->thumb ?>&w=250&h=150&zc=1" height="150px"></a>
                        <span style="clear: both;float: left;width: 100%;height: 5px"></span>
                        <a href="<?=site_url($nn.'/'.$dau_tu.'/'.$nt->article_link)?>"><?=$nt->article_name?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<span style="clear: both;float: left;width: 100%;height: 10px"></span>

<script>
    $(document).ready(function(){
        $('.list_slide_nhathau').bxSlider({
            auto: true,
            slideWidth: 250,
            mode: 'horizontal',
            minSlides: 1,
            maxSlides: 4,
            moveSlides: 1,
            slideMargin: 0,
            pager: false, controls: false

        });
    });
</script>

