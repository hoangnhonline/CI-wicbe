<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('M_item');
$CI->load->model('Title');

$i =1;

?>


<div id="wrapper">
    <div class="wrapper">
        <div class="left_content">
            <div class="title_div1">Tin nổi bật</div>

            <ul class="ul_hot_news">
                <?php $i=1; foreach ($CI->M_artice->show_list_homes(array('type'=>3,'hot'=>1,'status'=>1),10,0) as $n){ ?>
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



        </div>

    </div>

</div>
