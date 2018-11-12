<script type="text/javascript" src="<?=base_url()?>theme/popup/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>theme/popup/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>theme/popup/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="<?=base_url()?>theme/popup/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<?php
$CI = &get_instance();
$CI->load->model('M_artice');
$CI->load->model('Title');
$CI->load->model('M_item');
$CI->load->model('M_category');
$CI->load->model('M_banner');
$CI->load->model('Thongtin_web');
$tt = $CI->Thongtin_web->show_company(1);
$list = $this->M_category->list_category_all(array('top' => 0,'type' => 2,'status' => 1,'hot' => 1));
$list_hi = $this->M_category->list_category_all(array('top' => 0,'type' => 2,'status' => 1,'hot' => 2));
$img = $CI->M_banner->show_banner_home(10,0,2);
$video = $CI->M_banner->first_row();
$name_video = $CI->M_artice->get_article_home(array('id'=>108));
?>
<?php $this->load->view('font/inc/slide') ?>
<div id="wrapper">
    <div id="list_product">

        <div class="title_div"><h1>Sản phẩm</h1></div>
        <div class="list_product1">
            <?php $i=1; foreach ($CI->M_item->show_list_item_hot() as $r1){ ?>
                <div class="child_product">
                    <?php if($r1->name_hot !=''){?>
                        <a class="sale-box">
                            <span class="sale-label"> <?=$r1->name_hot?></span>
                        </a>
                        <?php }?>
                <a href="<?=site_url($r1->link)?>" class="img_product"><img alt="<?=$r1->name?>" src="<?= base_url() ?><?=$r1->img ?>"> </a>
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
        </div>
    </div>
</div>
<div id="about_home">
    <div class="about_home">

        <div class="left_about_home">
            <iframe class="video_active_detail" src="//www.youtube.com/embed/<?=substr($video->link,16)?>" frameborder="0" allowfullscreen></iframe>

        </div>
        <div class="right_about_home">
            <a href="" onclick="return false;"> <h2 class="title_about_home"><?=$name_video->name?></h2></a>
            <div class="line_3">
                <i class="icon_about_home"></i>
            </div>
            <span class="summary_about_home"><?=$name_video->content?></span>

        </div>

    </div>

</div>
<div class="home_home">
    <div class="home_home1">


        <div class="images_home">
            <div class="title_div"><h3>HOẠT ĐỘNG CỦA SHOP</h3></div>

            <div class="lis_img_home">
                <?php foreach ($img as $im){ ?>
                    <a data-fancybox-group="gallery" title="<?=$im->name ?>" class="fancybox" href="<?=$im->img ?>"><img alt="<?=$im->name ?>" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$im->img ?>&w=300&h=300&zc=1"> </a>
                <?php }?>
            </div>

        </div>


        <div class="list_news_home">
            <div class="title_div"><h4>Tin nổi bật</h4><a class="more" href="<?=site_url('hoat-dong-cua-shop')?>">Xem thêm</a></div>
            <?php $i=1; foreach ($CI->M_artice->show_list_homes(array('type'=>3,'hot'=>1,'status'=>1),4,0) as $n){ ?>
                <div class="child_row_list_home   <?php if($i%4==0){echo 'child_row_list_home_1';} ?>">
                    <a class="img_pr" href="<?=site_url($n->link)?>" title=""><img title="<?=$n->name?>" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$n->img ?>&w=400&h=260&zc=1" alt="<?=$n->name?>"></a>
                    <span class="test_summary_dl">
             <a class="name_title" href="<?=site_url($n->link)?>" title="<?=$n->name?>"><?=$n->name?></a>
            <p><?=$CI->Title->laychuoi($n->summary,100)?></p>
            </span>
                </div>
                <?php  $i++; } ?>

        </div>



    </div>
</div>





<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
        $(".fancybox-effects-a").fancybox({
            helpers: {
                title : {
                    type : 'outside'
                },
                overlay : {
                    speedOut : 0
                }
            }
        });
        $(".fancybox-effects-b").fancybox({
            openEffect  : 'none',
            closeEffect	: 'none',
            helpers : {
                title : {
                    type : 'over'
                }
            }
        });
        $(".fancybox-effects-c").fancybox({
            wrapCSS    : 'fancybox-custom',
            closeClick : true,
            openEffect : 'none',
            helpers : {
                title : {
                    type : 'inside'
                },
                overlay : {
                    css : {
                        'background' : 'rgba(238,238,238,0.85)'
                    }
                }
            }
        });

        $(".fancybox-effects-d").fancybox({
            padding: 0,
            openEffect : 'elastic',
            openSpeed  : 150,
            closeEffect : 'elastic',
            closeSpeed  : 150,
            closeClick : true,
            helpers : {
                overlay : null
            }
        });
        $('.fancybox-buttons').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            prevEffect : 'none',
            nextEffect : 'none',
            closeBtn  : false,
            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            },
            afterLoad : function() {
                this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            }
        });

        $('.fancybox-thumbs').fancybox({
            prevEffect : 'none',
            nextEffect : 'none',
            closeBtn  : false,
            arrows    : false,
            nextClick : true,
            helpers : {
                thumbs : {
                    width  : 50,
                    height : 50
                }
            }
        });
    });
</script>

