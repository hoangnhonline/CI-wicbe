<?php
$CI = &get_instance();
$CI->load->model('M_artice');
$CI->load->model('M_category');
?>

<div class="content_content">

    <div class="wp_menu_child_mb">
        <?php if(isset($news)) { ?>
        <ul class="list_menu_child_mb">
            <li><a class="bg_menu" href="" style="text-align: center" onclick="return false">Danh mục</a> </li>

            <?php foreach ($CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 2,'category.category_status'=>1),'vn') as $row) { ?>

                <li><a href="<?=site_url('tin-tuc/'.$row->category_link)?>"><?=$row->category_name?></a> </li>
            <?php }?>



        </ul>
        <?php }?>

        <div class="list_page">
            <div class="title_div_search" href="" onclick="return false"><?php if(isset($title)){echo $title; }?></div>
            <?php $i=1; foreach($list as $l) { ?>
                <?php $thumb = $CI->M_artice->show_thumb($l->id) ?>
            <div class="child_news <?php if($i%2==0){echo 'child_news1';} ?> <?php if($i%3==0){echo 'child_news2';} ?>">
                <a href="<?=site_url($l->article_link)?>" class="img_href_news"> <img class="img_href_news_1" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb->thumb ?>&w=200&h=150&zc=1"> </a>
                <a class="name_news" href="<?=site_url($l->article_link)?>"><?=$l->article_name?></a>

            </div>
            <?php $i++;  }?>

        </div>

        <p id="thanhphantrang"><?=$link?></p>
        <span style="float: left;width: 100%;height: 10px;clear: both"></span>
    </div>


</div>