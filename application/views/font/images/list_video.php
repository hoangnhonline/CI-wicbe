<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');

if($this->uri->segment(1)==''){$nn = 'vn';}else{ $nn = $this->uri->segment(1);}
$list_about_home = $CI->M_artice->show_list_page_abouts(array('article.article_type'=>1,'article.article_status'=>1),$nn);
$list_dv_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 1),$nn);
$list_news_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 3),$nn);
$list_news_home_nb = $CI->M_artice->show_list_new_home(array('article.article_status'=>1,'article.article_type'=>4,'article.article_hot'=>1),5,0,$nn);
$list_giaoduc_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 4),$nn);
$i=1;
$j=0;
?>




<div id="content_content">
    <div class="content_content">

<span style="float: left;width: 100%;height: 10px;clear: both"></span>



<?php $j=1;?>

            <?php foreach($list as $r) { ?>
    <?php if($i < 2){ ?>
                    <div class="row_video">

                <iframe src="//www.youtube.com/embed/<?=substr($r->link,16)?>?rel=0" width="100%" height="500"> </iframe
                    </div>
                    <div style="float: left;width: 100%;height: 5px;"></div>
<?php } else{ ?>

                <div class="child_row_list list_video_detail" style="<?php if($j%4==0) {echo "margin-right:0px";} ?><?php if($j > 4){echo 'margin-top:10px';} ?>">
                    <a href="<?=site_url($lang.'/'.$r->name_link)?>">
                        <p class="images_video">
                        <b class="play_video"></b>
                        </p>

                        <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$r->thumb ?>&w=280&h=180&zc=1">
                    </a>

                    <a href="<?=site_url($lang.'/'.$r->name_link)?>" class="name_title"><?=$r->name?></a>
                </div>
        <?php }?>
                <?php $i ++; }?>

            <p id="thanhphantrang"><?=$link?></p>



        <span style="float:left;width: 100%;height: 10px;clear: both"></span>

    </div>
</div>