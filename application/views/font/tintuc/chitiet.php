<?php

$CI = &get_instance();
$CI->load->model('M_artice');


?>



<div id="wrapper">
    <div class="wrapper">
        <div class="left_content">
            <div class="title_div1">Tin nổi bật</div>

            <ul class="ul_hot_news">
                <?php $i=1; foreach ($CI->M_artice->show_list_homes(array('id !='=>$row->id,'type'=>3,'hot'=>1,'status'=>1),10,0) as $n){ ?>
                    <li>
                        <a class="img_news_hot" href="<?=site_url($n->link)?>"><img alt="<?=$n->name?>" title="<?=$n->name?>" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$n->img ?>&w=150&h=100&zc=1"> </a>
                        <a class="a_news_hot" href="<?=site_url($n->link)?>"><?=$n->name?></a>
                    </li>
                <?php } ?>
            </ul>



        </div>

        <div class="right_content">
            <div class="detail12">

                <h1 class="h1_12"><?=$row->name?></h1>
                <div class="detail13">
                    <?=$row->content?>

                </div>
            </div>

            <div class="list_orther1">

                <div class="title_div1">Tin Liên quan</div>
                <?php $i=1; foreach ($lienquan as $lq){ ?>
                    <div class="child_row_list_home   <?php if($i%3==0){echo 'child_row_list_home_1';} ?>">
                        <a class="img_pr" href="<?=site_url($lq->link)?>" title=""><img title="<?=$lq->name?>" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$lq->img ?>&w=400&h=260&zc=1" alt="<?=$lq->name?>"></a>
                        <span class="test_summary_dl">
             <a class="name_title" href="<?=site_url($lq->link)?>" title="<?=$lq->name?>"><?=$lq->name?></a>
            <p><?=$CI->Title->laychuoi($lq->summary,100)?></p>
            </span>
                    </div>


                <?php $i++; }?>

            </div>



        </div>

    </div>

</div>




