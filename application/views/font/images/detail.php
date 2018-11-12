<link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/all.min.css') ?>"/>
<script type="text/javascript" language="javascript"  src="<?= base_url('theme/js/jquery.magnific-popup.min.js') ?>" ></script>



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

$list_img_orther = $CI->M_images->get_img_orther_list(array('img_video_library.id_video_library'=>$img->id));
$first_video_library_home = $CI->M_images->show_first_video_home_hot(array('video_library.hot'=>1,'video_library.status'=>1,'country.name'=>$lang));


$i=2;
$j=1;
?>




<div id="content_content">
    <div class="content_content">
        <div class="home_detail">
            <a href="<?=site_url($lang.'/'.$l->lang_home_link[$lang])?>" class="herf_a_home_detail"><p class="icon_home_detail"></p> <?=$l->lang_home[$lang]?></a>
            <span class="icon_arrow_detail"></span>
            <a href="<?php if(isset($giaoduc)) { ?> <?=site_url($lang.'/'.$l->lang_giaoduc_link[$lang])?> <?php }?><?php if(isset($thuvien)) { ?> <?=site_url($lang.'/'.$l->lang_thuvien_link[$lang])?> <?php }?> " class="row_detail">
                <?php if(isset($giaoduc)) { ?> <?=$l->lang_giaoduc[$lang]?> <?php }?>
                <?php if(isset($thuvien)) { ?><?=$l->lang_thuvien[$lang]?> <?php }?>
            </a>

        </div>
        <div class="left_detail">
            <div style="float: left;width: 100%;clear: both;height: 10px;"></div>
            <div class="list_row_">
                <a href="" onclick="return false" class="row_news_detail_home">   <?=$l->lang_thuvien[$lang]?></a>
                <p class="line_row_news_detail_home"></p>
                <span style="float: left;width: 100%;clear: both"></span>
                <ul class="list_menu_home_detail">

                    <?php if(isset($thuvien)) { ?>
                        <li><a href="<?=site_url($lang.'/'.$l->lang_images_center_link[$lang])?>"><?=$l->lang_images_center[$lang]?></a></li>
                        <li><a href="<?=site_url($lang.'/'.$l->lang_images_shc_link[$lang])?>"><?=$l->lang_images_shc[$lang]?></a></li>
                        <li><a href="<?=site_url($lang.'/'.'video')?>">Video</a></li>
                    <?php }?>
                    <?php if(isset($giaoduc)) { ?>
                        <li><a href="<?=site_url($lang.'/'.$l->lang_thuvienanh_link[$lang])?>"><?=$l->lang_thuvienanh[$lang]?></a></li>
                        <li><a href="<?=site_url($lang.'/'.$l->lang_thuvienvideo_link[$lang])?>"><?=$l->lang_thuvienvideo[$lang]?></a></li>

                        <?php foreach($list_giaoduc_home as $gduc) { ?>
                            <li><a href="<?=site_url($lang.'/'.$gduc->category_link)?>"><?=$gduc->category_name?></a></li>
                        <?php }?>
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

            <h1 class="title_h1"><?=$img->name?><b><?=date('d/m/Y',strtotime($img->time))?></b></h1>
            <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both;margin-top: 4px"></span>
            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 5px"></span>

            <div class="child_row_list" style="">
                <a href="<?=$img->thumb ?>" class="img_click"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$img->thumb ?>&w=230&h=200s&zc=1"></a>
            </div>

            <?php foreach($list_img_orther as $img_o) { ?>

            <div class="child_row_list" style="<?php if($i%3==0) {echo "margin-right:0px";} ?><?php if($i > 3){echo 'margin-top:10px';} ?>">
                <a href="uploads/san-pham/<?=$img_o->thumb_orther?>" class="img_click"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?>uploads/san-pham/<?=$img_o->thumb_orther?>&w=230&h=200s&zc=1"></a>
            </div>
<?php $i++;  }?>

            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 10px"></span>




 <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both;margin-top: 4px"></span>
            <div class="involve_detail"><?=$l->lang_hinhanh_lq[$lang]?></div>
            <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both"></span>
            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 10px"></span>
            <?php foreach($lienquan as $lq_img) { ?>
                <div class="child_row_list_lq" style="<?php if($j%3==0) {echo "margin-right:0px";} ?><?php if($j > 3){echo 'margin-top:10px';} ?>">
                    <a href="<?=site_url($lang.'/'.$lq_img->name_link)?>"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$lq_img->thumb ?>&w=230&h=150&zc=1"></a>

                    <a href="<?=site_url($lang.'/'.$lq_img->name_link)?>" class="name_title"><?=$lq_img->name?></a>
                </div>
                <?php $j ++; }?>

            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 10px"></span>







        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#icon_print_detail').click(function(){
            javascript:print(); return false;
        })

    })
</script>

<script>
    $(document).ready(function() {
        $('.child_row_list').magnificPopup({

            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });
    });
</script>


<!--
<div class="wp_wp">
    <div class="wp_wp_content">
        <div class="wp_wp_content_wp">
            <div class="title_dichvu">
                <span class="home_home" ><img src="theme/images/icon_trangchu_active.png" width="27"> <a href="#"> <?=$l->lang_home[$lang]?>&nbsp;&nbsp; </a></span>
                <span class="home_home last" ><img style="margin-top: 12px" src="theme/images/arrow_bread.png" width="10"><a style="color: #f00" href="#" onclick="return false"> <?=$l->lang_thuvien[$lang]?></a></span>

            </div>
            <span style="clear: both;float: left;width: 100%;height: 10px"></span>
            <div class="content_images">
                <?php $i=1; ?>
                <?php foreach ($list as $row)  { ?>
                    <div class="<?=$row->id?> item-tin list_images " style="<?php if($i%3==0) { echo 'margin-right:0px';}?>">
                        <a href="<?=$row->thumb?>" title="<?=$row->name?>">
                            <img class="thum_tin" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$row->thumb ?>&w=320&h=220&zc=1"></a>

                        <?php foreach ($CI->M_images->get_id_img($row->id) as $row1) { ?>
                            <a class="<?=$row->id?>"  href="uploads/san-pham/<?=$row1->thumb?>" title="<?=$row->name?>" ></a>
                        <?php } ?>
                        <script>
                            $(document).ready(function() {
                                $('.<?=$row->id?>').magnificPopup({
                                    delegate: 'a',
                                    type: 'image',
                                    tLoading: 'Loading image #%curr%...',
                                    mainClass: 'mfp-img-mobile',
                                    gallery: {
                                        enabled: true,
                                        navigateByImgClick: true,
                                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                                    },
                                    image: {
                                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                                        titleSrc: function(item) {
                                            return item.el.attr('title');
                                        }
                                    }
                                });
                            });
                        </script>



                        <h3 class="title"> <?=$row->name?></h3>


                    </div>
                    <?php $i++; } ?>


                <p id="thanhphantrang"><?=$link?></p>
            </div>
        </div>

    </div>
    <div class="bt_ft"></div>
</div>
<style>
    h3.title{float: left;  width: 100%;  margin-top: 5px;color: #0f75cc;text-align: center}
    .item-tin{float: left;width: 320px;margin-right: 20px;height: 270px}
    .content_images{float: left;width: 100%;background: #fff;}
</style>
-->