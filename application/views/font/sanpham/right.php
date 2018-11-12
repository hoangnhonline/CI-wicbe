<?php
$CI = &get_instance();
$CI->load->model('M_item');
$CI->load->model('Title');
$CI->load->model('M_category');
$list_hot = $CI->M_item->show_item_hot_1(array('item.item_type'=>1));

$menu_sp1 = $CI->M_category->list_category_all(array('category.category_status' => 1,'category.category_top' => 0, 'category.category_type' => 3),'vn');
$menu_list_hot = $CI->M_category->list_category_all(array('category.category_hot' => 1,'category.category_status' => 1,'category.category_top' => 0, 'category.category_type' => 3),'vn');
?>


<div class="list_product_home">
    <div class="title_name_sp title_name_sp_1">
        <p class="name_tt_1"><?php if(isset($title)){echo $title;} ?></p>
        <p class="line_1_1"></p>
    </div>
    <div class="list_1_h">
        <?php $i=1; foreach ($list as $pr){ ?>
            <div class="child_product <?php if($i%4==0){echo 'child_product_1';} ?>">
                <a href="<?=site_url($lang.'/'.$pr->item_link)?>" class="img_pr_2"><img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$pr->file ?>&w=416&h=416&zc=1" alt="<?=$pr->item_name?>" title="<?=$pr->item_name?>"> </a>
                <a href="<?=site_url($lang.'/'.$pr->item_link)?>" title="<?=$pr->item_name?>" class="name_pr_2"><?=$pr->item_name?></a>
                <span class="price_pt">
                      <p>Giá : Liên hệ</p>
                      <img src="theme/images/icon_cart_1.png" id="<?=$pr->id?>" class="cart">
                  </span>
            </div>
            <?php $i++; } ?>

<div id="page_pr">
    <?=$link?>
</div>

    </div>



</div>


