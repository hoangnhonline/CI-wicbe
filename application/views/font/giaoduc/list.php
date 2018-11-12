<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('M_images');

if($this->uri->segment(1)==''){$nn = 'vn';}else{ $nn = $this->uri->segment(1);}
$list_about_home = $CI->M_artice->show_list_page_abouts(array('article.article_type'=>1,'article.article_status'=>1),$nn);
$list_dv_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 1),$nn);
$list_news_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 3),$nn);
$list_news_home_nb = $CI->M_artice->show_list_new_home(array('article.article_status'=>1,'article.article_type'=>4,'article.article_hot'=>1),5,0,$nn);
$list_giaoduc_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 4),$nn);
$i=1;
$first_video_library_home = $CI->M_images->show_first_video_home_hot(array('video_library.hot'=>1,'video_library.status'=>1,'country.name'=>$lang));
?>




<div id="content_content">
    <div class="content_content">
        <div class="home_detail">
            <a href="<?=site_url($lang.'/'.$l->lang_home_link[$lang])?>" class="herf_a_home_detail"><p class="icon_home_detail"></p> <?=$l->lang_home[$lang]?></a>
            <span class="icon_arrow_detail"></span>
            <a href="<?=site_url($lang.'/'.$l->lang_giaoduc_link[$lang])?> " class="row_detail">
          <?=$l->lang_giaoduc[$lang]?>

            </a>

        </div>
        <div class="left_detail">
            <div style="float: left;width: 100%;clear: both;height: 10px;"></div>
            <div class="list_row_">
                <a href="<?=site_url($lang.'/'.$l->lang_giaoduc_link[$lang])?> " class="row_news_detail_home">
                    <?=$l->lang_giaoduc[$lang]?>

                </a>
                <p class="line_row_news_detail_home"></p>
                <span style="float: left;width: 100%;clear: both"></span>
                <ul class="list_menu_home_detail">

                        <li><a href="<?=site_url($lang.'/'.$l->lang_thuvienanh_link[$lang])?>"><?=$l->lang_thuvienanh[$lang]?></a></li>
                        <li><a href="<?=site_url($lang.'/'.$l->lang_thuvienvideo_link[$lang])?>"><?=$l->lang_thuvienvideo[$lang]?></a></li>

                        <?php foreach($list_giaoduc_home as $gduc) { ?>
                            <li><a href="<?=site_url($lang.'/'.$gduc->category_link)?>"><?=$gduc->category_name?></a></li>
                        <?php }?>



                </ul>
            </div>
            <span style="float: left;width: 100%;clear: both;height: 10px"></span>
            <div class="list_row_">
                <a href="" class="row_news_detail_home">Video</a>
                <p class="line_row_news_detail_home"></p>
                <span style="float: left;width: 100%;clear: both"></span>
                <div class="video_highlights">

                    <iframe src="//www.youtube.com/embed/<?=substr($first_video_library_home->link,16)?>?rel=0" width="230" height="175"> </iframe>


                </div>
            </div>

            <span style="float: left;width: 100%;clear: both;height: 10px"></span>

            <div class="list_row_">
                <a href="" class="row_news_detail_home"><?=$l->lang_tinmoi[$lang]?></a>
                <p class="line_row_news_detail_home"></p>
                <span style="float: left;width: 100%;clear: both"></span>
                <ul class="list_menu_home_detail icon_new_news">
                    <?php foreach($list_news_home_nb as $new_nb) { ?>
                        <li><a href="<?=site_url($lang.'/'.$new_nb->article_link)?>" class="icon_news_homwe_new"><?=$new_nb->article_name?></a> </li>
                    <?php }?>

                </ul>
            </div>

            <span style="float: left;width: 100%;clear: both;height: 20px"></span>




        </div>


        <div class="right_content">
            <?php foreach($list as $r) { ?>
                <?php $thumb1 = $CI->M_artice->show_thumb($r->id) ?>
                <div class="child_row_list" style="<?php if($i%3==0) {echo "margin-right:0px";} ?><?php if($i > 3){echo 'margin-top:10px';} ?>">
                    <a href="<?=site_url($lang.'/'.$r->article_link)?>"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb1->thumb ?>&w=230&h=150&zc=1""></a>

                    <a href="<?=site_url($lang.'/'.$r->article_link)?>" class="name_title"><?=$r->article_name?></a>
                </div>
                <?php $i ++; }?>

            <p id="thanhphantrang"><?=$link?></p>













        </div>
    </div>
</div>