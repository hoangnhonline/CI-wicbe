<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_item');
$hang = $CI->M_category->list_category_all(array('category.category_status' => 1,'category.category_top !=' => 0,'category.category_type' => 3,'category.category_hot' => 1),'vn');
$list_item = $CI->M_item->show_list_hot(array('item.item_status'=>1,'item.item_hot'=>1));
$list_news = $CI->M_artice->tintuc_hot_1(array('article.article_hot'=>1,'article.article_type'=>3),3,0);
$list_news2 = $CI->M_artice->tintuc_hot_1(array('article.time_1'=>1),5,0);
?>




<div class="content_hom">

    <div class="hangsx">
<?php $i=1; foreach($hang as $h) { ?>
        <a class="logo_link_a <?php if($i%2==0){echo 'logo_link_a1';} ?> <?php if($i%3==0){echo 'logo_link_a2';} ?> <?php if($i%4==0){echo 'logo_link_a3';} ?>" href="<?=site_url($h->category_link)?>"><img src="<?= $h->icon?>" alt="Logo Compnay" class="img_href" /></a>
<?php $i++; } ?>

    </div>

    <div class="san_sanpham">
        <div class="title_div_search">Sản phẩm tiêu biểu</div>


        <?php $i=1; foreach($list_item as $r) { ?>
            <?php $thumb = $CI->M_item->show_thumb($r->id) ?>
            <div class="child_child_pd <?php if($i%2==0){echo 'child_child_pd1';}?> <?php if($i%3==0){echo 'child_child_pd2';}?>">
                <a href="<?=site_url($r->item_link)?>" class="img_pr_1"><img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb->thumb ?>&w=200&h=150&zc=1">
                </a>
                <div class="wp_name1">
                    <a href="<?=site_url($r->item_link)?>" class="name_pr1"><?=$r->item_name?> </a>
            <span class="left_name1">
                <p class="giagoc <?php if($r->item_price_sale==0){echo 'giagoc1';}?>"><?php if($r->item_price==0){echo '&nbsp;';}else{echo number_format($r->item_price, 0, ",", "."). '&nbsp;VND'; } ?></p>
                <p class="gia_km"><?php if($r->item_price_sale==0){echo '&nbsp;';}else{echo number_format($r->item_price_sale, 0, ",", "."). '&nbsp;VND'; } ?></p>
            </span>
             <span class="right_name1">
                <p class="cart" id="<?=$r->id?>"></p>

            </span>
                </div>

            </div>
            <?php $i++; }?>

    </div>


    <div class="list_page">
        <div class="title_div_search" href="" onclick="return false">Thông tin nổi bật</div>
        <?php $i=1; foreach($list_news as $l) { ?>
            <?php $thumb = $CI->M_artice->show_thumb($l->id) ?>
            <div class="child_news <?php if($i%2==0){echo 'child_news1';} ?> <?php if($i%3==0){echo 'child_news2';} ?>">
                <a href="<?=site_url($l->article_link)?>" class="img_href_news"> <img class="img_href_news_1" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb->thumb ?>&w=200&h=150&zc=1"> </a>
                <a class="name_news" href="<?=site_url($l->article_link)?>"><?=$l->article_name?></a>

            </div>
            <?php $i++;  }?>
        <div style="float: left;width: 100%;height: 10px;clear: both"></div>
    </div>

    <div class="list_page">
        <div class="title_div_search" href="" onclick="return false">Tin hữu ích</div>
        <?php $i=1; foreach($list_news2 as $l) { ?>
            <?php $thumb = $CI->M_artice->show_thumb($l->id) ?>
            <div class="child_news <?php if($i%2==0){echo 'child_news1';} ?> <?php if($i%3==0){echo 'child_news2';} ?>">
                <a href="<?=site_url($l->article_link)?>" class="img_href_news"> <img class="img_href_news_1" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb->thumb ?>&w=200&h=150&zc=1"> </a>
                <a class="name_news" href="<?=site_url($l->article_link)?>"><?=$l->article_name?></a>
            </div>
            <?php $i++;  }?>
    </div>
    <div style="float: left;width: 100%;height: 10px;clear: both"></div>

</div>

