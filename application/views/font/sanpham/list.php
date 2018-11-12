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
            <?php $i=1; foreach ($CI->M_artice->show_list_homes(array('type'=>3,'hot'=>1,'status'=>1),5,0) as $n){ ?>
            <li>
                <a class="img_news_hot" href="<?=site_url($n->link)?>"><img alt="<?=$n->name?>" title="<?=$n->name?>" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$n->img ?>&w=150&h=100&zc=1"> </a>
                <a class="a_news_hot" href="<?=site_url($n->link)?>"><?=$n->name?></a>
            </li>
            <?php } ?>
        </ul>


    </div>

        <div class="right_content">
            <div class="detail12_1">
            <h1 class="h1_12" style="margin-bottom: 15px"><?php if(isset($title1)){echo $title1;}else{ echo $title;}  ?></h1>
            <div class="right_content_1">
            <?php $i=1; foreach ($list as $r1){ ?>
                <div class="child_product_home">
                    <?php if($r1->name_hot !=''){?>
                        <a class="sale-box">
                            <span class="sale-label"> <?=$r1->name_hot?></span>
                        </a>
                    <?php }?>
                    <a href="<?=site_url($r1->link)?>" class="img_product"><img alt="<?=$r1->name?>" title="<?=$r1->name?>" src="<?= base_url() ?><?=$r1->img ?>"> </a>
                    <a href="<?=site_url($r1->link)?>" class="name_product"><?=$r1->name?></a>
                    <span class="price_cart">
                    <span class="price_old_new">
                        <?php if($r1->price_pro!=0 && $r1->price_pro !=''){ ?>
                         <p class="price_home_old"><?php if($r1->price==0){echo '';}else{echo number_format($r1->price, 0, ",", "."). '&nbsp;đ'; } ?></p>
                        <?php } ?>
                         <p class="price_home <?php if($r1->price_pro =='' || $r1->price_pro ==0){ ?>price_home_11<?php } ?>">
                             <?php if($r1->price_pro !='' && $r1->price_pro !=0){ ?>
                             <?php if($r1->price_pro==0){echo '';}else{echo number_format($r1->price_pro, 0, ",", "."). '&nbsp;đ'; } ?>
                              <?php }else{ ?>
                             <?php if($r1->price==0){echo '';}else{echo number_format($r1->price, 0, ",", "."). '&nbsp;đ'; } ?>
                             <?php } ?>
                         </p>

                    </span>
                        <p class="cart cart_home" id="<?=$r1->id?>">mua ngay</p>
                    <input type="hidden" id="input_<?=$r1->id?>" value="1">
                </span>
                </div>
            <?php $i++; } ?>
            <div class="page_home">
                <?=$link?>
            </div>
            </div>
            </div>
        </div>

    </div>

</div>
