<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('Title');
?>


<div id="wrapper">
    <div class="wrapper">


        <div class="list_tintuc1">

            <?php $i=1; foreach ($list as $n){ ?>
                <div class="child_row_list_home   <?php if($i%4==0){echo 'child_row_list_home_1';} ?>">
                    <a class="img_pr" href="<?=site_url($n->link)?>" title=""><img title="<?=$n->name?>" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$n->img ?>&w=400&h=260&zc=1" alt="<?=$n->name?>"></a>
                    <span class="test_summary_dl">
             <a class="name_title" href="<?=site_url($n->link)?>" title="<?=$n->name?>"><?=$n->name?></a>
            <p><?=$CI->Title->laychuoi($n->summary,100)?></p>
            </span>
                </div>
                <?php $i++; } ?>


        </div>
        <div class="page_home">
            <?=$link?>
        </div>



    </div>
</div>
