<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('M_images');
$CI->load->model('Title');
$i=1;



?>



<div class="content_content1 content_content2">
    <div class="left_content">
        <?php  $this->load->view('font/sanpham/left_1') ?>
    </div>

    <div class="right_content1">
        <div class="title_div_bk"><?php if(isset($title)) {echo $title;}?></div>
        <?php $i=1; foreach($list as $r) { ?>
            <?php $thumb1 = $CI->M_artice->show_thumb($r->id) ?>
            <div class="child_row_list <?php if($i%2==0){echo 'child_row_list_2';} ?>" style="<?php if($i%3==0) {echo "margin-right:0px";} ?>">
                <a href="<?=site_url($r->article_link)?>"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb1->thumb ?>&w=280&h=180&zc=1"></a>

                <div class="test_summary_dl">
                    <a href="<?=site_url($r->article_link)?>" class="name_title"><?=$r->article_name?></a>
                    <span>
                        <?=$CI->Title->laychuoi($r->article_summary,150)?>
                    </span>
                </div>

            </div>
            <?php $i ++; }?>
        <div style="width: 100%;float: left;clear: both;height: 10px"></div>

        <p id="thanhphantrang"><?=$link?></p>

    </div>
</div>


















