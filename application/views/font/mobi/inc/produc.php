

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

            <?php $i=1; foreach($list as $r) { ?>
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

        <p id="thanhphantrang"><?=$link?></p>
        <span style="float: left;width: 100%;height: 10px;clear: both"></span>
    </div>


    <ul class="list_menu_child_mb">
        <li><a class="bg_menu" href="" style="text-align: center" onclick="return false">Danh mục</a> </li>

        <?php foreach ($CI->M_category->list_category_all(array('category.category_top !=' => 0, 'category.category_type' => 3,'category.category_status'=>1),'vn') as $row) { ?>

            <li><a href="<?=site_url($row->category_link)?>"><?=$row->category_name?></a> </li>
        <?php }?>



    </ul>

</div>