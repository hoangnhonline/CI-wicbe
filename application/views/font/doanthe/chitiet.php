<?php
if($this->uri->segment(1)==''){$nn = 'vn';}else{$nn = $this->uri->segment(1);}
if($this->uri->segment(1)=='en'){$cate = 'private-organizations';}else{$cate = 'tin-doan-the';}

?>
<div class="wp_wp">
    <div class="wp_wp_content">
        <div class="wp_wp_content_wp">
        <div class="title_dichvu">
            <span class="home_home" ><img src="theme/images/icon_trangchu_active.png" width="27"> <a href="#"> <?=$l->lang_home[$lang]?>&nbsp;&nbsp; </a></span>
            <span class="home_home last" ><img style="margin-top: 12px" src="theme/images/arrow_bread.png" width="10"><a style="color: #f00;white-space: nowrap" href="<?= site_url($lang.'/'.$l->lang_dangbo_link[$lang]) ?>"> <?=$l->lang_dangbo[$lang]?></a></span>

        </div>
        <div class="content_all">
            <div class="content_all_all" style="width: 97%;float: left;margin-top: 5px;margin-left: 10px">
               <h1 class="title_tin"><?=$row->article_name?></h1>

                <span class="time"><?=date('H:i',strtotime($row->date_modify))?> <?=$l->lang_time[$lang]?>  <?=date('m/d/Y',strtotime($row->date_modify))?></span>
                <div class="content_tin_tuc">
                    <?=$row->article_content?>

                </div>
                <span class="border_bottom"></span>
                <div style="clear: both"></div>
                <div class="add_this_fb">
                    <div class="addthis_native_toolbox"></div>
                </div>
            </div>
            <div class="tin_lien_quan">
                <div class="icon_content tin_khac"><p><?=$l->lang_tinkhac[$lang]?></p></div>
                <span style="width: 100%;clear: both;float: left;height: 1px"></span>
                <?php foreach($lienquan as $lq){ ?>
                <span class="tin_lq"><span class="icon_tt_h"></span><a href="<?=site_url($nn.'/'.$cate.'/'.$lq->article_link)?>"><?=$lq->article_name?> (<?=date('d/Y',strtotime($row->date_modify))?>)</a> </span>
                <?php } ?>
                <span style="clear: both;height: 20px;float: left"></span>
            </div>
        </div>
            <div class="bt_ft"></div>
        </div>
    </div>
</div>
<style>
    .title_tin{float: left;width: 100%;color: #2669b1 !important;font-family: arial;font-size: 14px !important;font-weight: bold;padding-bottom: 0px !important;}
    .time{color: #afafaf;font-size: 11px;font-family: arial;text-transform: uppercase}
    .content_tin_tuc{float: left;width: 100%}
    .content_tin_tuc p{color: #686868 !important;}
    .tin_khac{width: 200px !important;height: 30px;margin-top: 10px;margin-left: 13px}
    .add_this_fb{float: left;margin-top: 10px;width: 100%}
    .tin_lien_quan{float: left;width: 100%}
    .tin_khac p{color: #2669b1;float: left;width: 100%;margin-left: 15px;margin-top: 7px;font-weight: bold;font-size: 15px}
    .tin_lq{width: 100%;float: left}
    .tin_lq a{color: #686868;font-size: 13px;width: 90%;float: left;margin-left: 13px;margin-top: 7px;}
</style>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c4d2816723a67c" async="async"></script>