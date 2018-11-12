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

$i=1;
?>




<div id="content_content">
    <div class="content_content">





            <h1 class="title_h1"><?=$img->name?></h1>
            <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both;margin-top: 4px"></span>
            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 5px"></span>

            <iframe class="video_active_detail" src="//www.youtube.com/embed/<?=substr($img->link,16)?>" frameborder="0" allowfullscreen></iframe>

            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 10px"></span>




 <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both;margin-top: 4px"></span>
            <div class="involve_detail"><?=$l->lang_video_lq[$lang]?></div>
            <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both"></span>

            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 10px"></span>
            <?php foreach($lienquan as $lq) { ?>
                <div class="child_row_list list_video_detail" style="<?php if($i%4==0) {echo "margin-right:0px";} ?><?php if($i > 4){echo 'margin-top:10px';} ?>">
                    <a href="<?=site_url($lang.'/'.$lq->name_link)?>">
                        <p class="images_video">
                            <b class="play_video"></b>
                        </p>

                        <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$lq->thumb ?>&w=280&h=180&zc=1">
                    </a>

                    <a href="<?=site_url($lang.'/'.$lq->name_link)?>" class="name_title"><?=$lq->name?></a>
                </div>
                <?php $i ++; }?>

            <span style="float: left;width: 100%;height: 1px;=clear: both;height: 10px"></span>











    </div>
</div>

