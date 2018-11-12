<link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/popup.css') ?>"/>
<script type="text/javascript" src="<?=  base_url('theme/js/jquery.leanModal.min.js') ?>"></script>
<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('Title');
if($this->uri->segment(1)=='vn'){$nn = 'vn';}else{$nn= 'en';}
if($this->uri->segment(1)=='vn'){$d = 'gioi-thieu';}else{$d= 'about-us';}
if($this->uri->segment(1)=='vn'){$sd1 = 'so-do-to-chuc';}else{$sd1= 'organizational-chart';}
if($this->uri->segment(1)=='vn'){$tin = 'tin-tuc';}else{$tin= 'news';}
$codong =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>93,'article.article_type'=>8),$nn);
$kiemsoat =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>94,'article.article_type'=>8),$nn);
$quantri =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>95,'article.article_type'=>8),$nn);
$dieuhanh =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>96,'article.article_type'=>8),$nn);
$cuahang =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>97,'article.article_type'=>8),$nn);
$kehoach =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>98,'article.article_type'=>8),$nn);
$ketoan =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>99,'article.article_type'=>8),$nn);
$hanhchinh =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>100,'article.article_type'=>8),$nn);
?>
<div class="wp_wp">
    <div class="wp_wp_content">
        <div class="wp_wp_content_wp">
            <div class="title_dichvu">
                <span class="home_home" ><img src="theme/images/icon_trangchu_active.png" width="27"> <a href="#"> <?=$l->lang_home[$lang]?> </a>&nbsp;&nbsp;</span>
                <span class="home_home last" ><img style="margin-top: 15px" src="theme/images/arrow_bread.png" width="10"><a style="color: #f00;white-space: nowrap" href="<?= site_url($lang.'/'.$l->lang_gioithieu_link[$lang]) ?>"> <?=$l->lang_gioithieu[$lang]?> </a></span>
            </div>
            <div class="content_all">
                <div class="content_all_all" style="width: 97%;float: left;margin-top: 5px;margin-left: 10px">
                    <div class="left_content">
                        <div class="icon_content"><p><?=$l->lang_gioithieu[$lang]?></p></div>
                        <div class="menu_content">
                            <ul class="menu_child">
                                <?php $gt = $CI->M_category->row_catelogy(array('category.category_top' => 0, 'category.category_type' => 6,'category.id' => 294),$nn)  ?>
                                <?php $sd = $CI->M_category->row_catelogy(array('category.category_top' => 0, 'category.category_type' => 6,'category.id' => 295),$nn)  ?>
                                <li><span class="icon_tt <?php if($this->uri->segment(3)==$gt->category_link) {echo 'icon_tt_h';} ?> "></span>
                                    <a class="<?php if($this->uri->segment(2)==$gt->category_link) {echo 'icon_tt_h_c';} ?>" href="<?=site_url($nn.'/'.$gt->category_link)?>"><?=$gt->category_name?></a> </li>
                                <li><span class="icon_tt <?php if($this->uri->segment(3)==$sd->category_link) {echo 'icon_tt_h';} ?> "></span>
                                    <a class="<?php if($this->uri->segment(2)==$sd->category_link) {echo 'icon_tt_h_c';} ?>" href="<?=site_url($nn.'/'.$sd->category_link)?>"><?=$sd->category_name?></a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="right_content">
                        <span class="title_sodo"><?=$l->lang_sodo[$lang]?></span>
                        <div class="wp_gioithieu">
    <div class="hoidong_cd"><a id="modal_2" href="#modal_1" onclick="return false"> <span class="text"><?=$codong->article_name?></span></a></div>
                            <div class="muiten_3" style="display: none"><img class="muiten_2" style="height: 34px" src="theme/images/icon_muiten_1.png">
                            </div>
<div class="muiten_1"><img class="muiten_2" src="theme/images/icon_muiten.png">
    </div>

                            <div class="hoidong_cd" style="margin-top: 0px">
                            <a id="kiemsoat" href="#modal_kiemsoat" onclick="return false">
                                <span class="text text2"><?=$kiemsoat->article_name?></span></a></div>
                            <div class="muiten_3" style="display: none"><img class="muiten_2" style="height: 34px" src="theme/images/icon_muiten_1.png">
                            </div>
                            <div class="hoidong_cd"><a id="quantri" href="#modal_quantri"><span class="text"><?=$quantri->article_name?></span></a></div>
                            <div class="muiten_3"><img class="muiten_2" style="height: 34px" src="theme/images/icon_muiten_1.png">
                                </div>
                            <div class="hoidong_cd"><a id="dieuhanh" href="#modal_dieuhanh" onclick="return false">
                                    <span class="text"><?=$dieuhanh->article_name?></span></a></div>

                            <div class="muiten_3"><img class="muiten_2" style="height: 34px" src="theme/images/icon_muiten_1.png">
                            </div>
                            <div class="cua-hang">
                                <span class="bootom"></span>
                                <span style="clear: both;width: 100%;float: left"></span>
                                <span class="bootom_doc last"></span>
                                <a id="cuahang" href="#modal_cuahang" onclick="return false"> <span class="text text3"><?=$cuahang->article_name?></span></a>
                                <span class="bootom_doc"></span>
                                <a id="kehoach" href="#modal_kehoach" onclick="return false">       <span class="text text3"><?=$kehoach->article_name?></span></a>
                                <span class="bootom_doc"></span>
                                    <a id="ketoan" href="#modal_ketoan" onclick="return false" >   <span class="text text3"><?=$ketoan->article_name?></span></a>
                                <span class="bootom_doc"></span>
                                        <a id="hanhchinh" href="#modal_hanhchinh" onclick="return false">    <span class="text text3"><?=$hanhchinh->article_name?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bt_ft"></div>
            </div>
        </div></div>
    <?php $this->load->view('font/linhvuc/popup') ?>
    <style>
        .wp_gioithieu{float: left;width: 747px}
        .title_sodo {  text-align: center;  width: 100%;  float: left;  font-size: 18px;  font-weight: bold;  text-transform: uppercase; color: #323232  }
        .text{font-size: 15px;color: #323232;padding: 4px 14px}
        .hoidong_cd{text-align: center;  float: left;  width: 100%; margin-top: 10px;  }
.bootom{width: 71%;height: 1px;background: #323232;margin-left: 92px;float: left;margin-bottom: 30px}
        .muiten_1 .muiten_2 { width: 134px; margin-left: 130px;  }
        .text2{float: right;margin-top: -27px;margin-right: 0px;white-space: nowrap;text-align: center;-moz-box-shadow: 0 0 5px #888;
            -webkit-box-shadow: 0 0 5px#888;
            box-shadow: 0 0 5px #888;}
        .text3{width: 137px;float: left;margin-left: 10px;height: 61px;text-align: center;-moz-box-shadow: 0 0 5px #888;
            -webkit-box-shadow: 0 0 5px#888;
            box-shadow: 0 0 5px #888;}
        .cua-hang {  float: left;  margin-top: 10px;  width: 100%;  }
        .bootom_doc {  width: 1px;  float: left;  height: 30px;  background: #323232; margin-top: -30px;
            margin-left: -84px }
        .cua-hang .last{margin-right: 124px!important;float: right}
        .text{cursor: pointer;-moz-box-shadow: 0 0 5px #888;
            -webkit-box-shadow: 0 0 5px#888;
            box-shadow: 0 0 5px #888;}
    </style>
