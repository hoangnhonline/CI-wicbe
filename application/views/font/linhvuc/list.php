<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('Title');
if($this->uri->segment(1)=='vn'){$nn = 'vn';}else{$nn= 'en';}
if($this->uri->segment(1)=='vn'){$d = 'gioi-thieu';}else{$d= 'about-us';}
if($this->uri->segment(1)=='vn'){$sd1 = 'so-do-to-chuc';}else{$sd1= 'organizational-chart';}
if($this->uri->segment(1)=='vn'){$tin = 'tin-tuc';}else{$tin= 'news';}

?>


<div class="wp_wp">
    <div class="wp_wp_content">
        <div class="wp_wp_content_wp">
            <div class="title_dichvu">
                <span class="home_home" ><img src="theme/images/icon_trangchu_active.png" width="27"> <a href="#"> <?=$l->lang_home[$lang]?> </a>&nbsp;&nbsp;</span>
                <span class="home_home" ><img style="margin-top: 15px" src="theme/images/arrow_bread.png" width="10"><a style="color: #f00;white-space: nowrap" href="<?= site_url($lang.'/'.$l->lang_gioithieu_link[$lang]) ?>"> <?=$l->lang_gioithieu[$lang]?> </a></span>

            </div>
            <div class="content_all">
                <div class="content_all_all" style="width: 97%;float: left;margin-top: 5px;margin-left: 10px">
                    <div class="left_content">
                        <div class="icon_content"><p><?=$l->lang_gioithieu[$lang]?></p></div>
                        <div class="menu_content">
                            <ul class="menu_child">
                                <?php $gt = $CI->M_category->row_catelogy(array('category.category_top' => 0, 'category.category_type' => 6,'category.id' => 294),$nn)  ?>
                                <?php $sd = $CI->M_category->row_catelogy(array('category.category_top' => 0, 'category.category_type' => 6,'category.id' => 295),$nn)  ?>
                                    <li><span class="icon_tt <?php if($this->uri->segment(2)==$gt->category_link) {echo 'icon_tt_h';} ?> "></span>
                                        <a class="<?php if($this->uri->segment(2)==$gt->category_link) {echo 'icon_tt_h_c';} ?>" href="<?=site_url($nn.'/'.$gt->category_link)?>"><?=$gt->category_name?></a> </li>
                                <li><span class="icon_tt <?php if($this->uri->segment(2)==$sd->category_link) {echo 'icon_tt_h';} ?> "></span>
                                    <a class="<?php if($this->uri->segment(2)==$sd->category_link) {echo 'icon_tt_h_c';} ?>" href="<?=site_url($nn.'/'.$sd->category_link)?>"><?=$sd->category_name?></a> </li>

                            </ul>

                        </div>

                    </div>


                    <div class="right_content">
                       <div class="wp_gioithieu">
                           <h1><?=$row1->article_name?></h1>
                           <?=$row1->article_content?>
            </div>

        </div>

    </div>
                <div class="bt_ft"></div>
</div>
        </div></div>


    <style>
        .wp_gioithieu{float: left;width: 747px}
    </style>
