<?php
$CI = &get_instance();
$CI->load->model('M_artice');
$CI->load->model('M_category');
?>

<div class="content_content">


    <?php if(isset($news)) { ?>
        <ul class="list_menu_child_mb">
            <li><a class="bg_menu" href="" style="text-align: center" onclick="return false">Danh mục</a> </li>

            <?php foreach ($CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 2,'category.category_status'=>1),'vn') as $row1) { ?>

                <li><a href="<?=site_url($row1->category_link)?>"><?=$row1->category_name?></a> </li>
            <?php }?>



        </ul>
    <?php }?>
<h1 class="title_h1"><?=$row->article_name?></h1>
    <div class="content_detail">
    <span style="float: left;width: 100%;clear: both;height: 1px"></span>
    <?=$row->article_content?>
    </div>
</div>