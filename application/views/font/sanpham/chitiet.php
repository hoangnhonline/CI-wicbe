<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('M_item');
$CI->load->model('Title');

$i =1;

?>

<script type="text/javascript" src="<?=base_url()?>theme/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?=base_url()?>theme/js/js.js"></script>
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



            <div class="list_tags">
                <div class="title_div1">Tags</div>

                <ul class="list-tag">
                    <?php foreach ($CI->M_item->show_tags(array('tags_id.id'=>$item->id,'tags.status'=>1)) as $t){ ?>
                    <li><a href="<?=site_url($t->link)?>"><?=$t->name?></a> </li>
                    <?php } ?>
                </ul>
            </div>

        </div>

        <div class="right_content">


            <div class="img_detail_name">
                <div class="img_detail_name_1">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php $i=1; foreach ($images_slide as $sl){ ?>
                                <li><img alt="<?=$item->name?> <?=$i?>" title="<?=$item->name?> <?=$i?>"  src="<?= base_url() ?>uploads/san-pham/<?=$sl->img?>" /></li>
                                <?php $i++; } ?>
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider">
                        <ul class="slides">
                            <?php foreach ($images_slide as $sl){ ?>
                                <li><img class="img_slider" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?>uploads/san-pham/<?=$sl->img?>&w=90&h=70&zc=1" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="img_detail_name_2">
                    <h1 class="h1_12"><?=$item->name?></h1>
                    <div class="sumary_pt_dt">
                        <?=$item->content?>
                    </div>

                    <div class="price_detail">
                        <div class="price_detail1">
                            <p>Giá gốc : </p> <p style=" <?php if($item->price_pro !=0 && $item->price_pro !=''){ ?>color: #9e9e9e;text-decoration: line-through;<?php } ?>">  <?php if($item->price==0){echo 'Liên hệ';}else{echo number_format($item->price, 0, ",", "."). '&nbsp;đ'; } ?> </p>
                        </div>
                        <?php if($item->price_pro !=0 && $item->price_pro !=''){ ?>
                        <div class="price_detail2">
                            <p>Giá khuyến mãi :</p>  <p> <?php if($item->price_pro==0){echo 'Liên hệ';}else{echo number_format($item->price_pro, 0, ",", "."). '&nbsp;đ'; } ?> </p>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="number_cart">
                        <p class="text_number_1">Số lượng:</p>
                        <div class="number_cart1">
                            <img src="<?=base_url()?>theme/images/nummer_minus.jpg" class="img_click_minus">
                            <input type="text" class="number_cart_input" value="1" id="input_<?=$item->id?>">
                            <img src="<?=base_url()?>theme/images/number_plus.jpg" class="img_click_plus">
                        </div>
                        <a href="" class="cart cart_detail_pr_red" id="<?=$item->id?>" onclick="return false">Chọn Mua </a>

                        <script type="text/javascript">
                            $(document).ready(function(){

                                $('.img_click_minus').click(function(){
                                    var num = $('.number_cart_input').val();
                                    var num1 =parseInt(num);
                                    var input = $('.number_cart_input');
                                    if(num1 >= 2){
                                        input.val(-- num1);
                                    }
                                });
                                $('.img_click_plus').click(function(){
                                    var num = $('.number_cart_input').val();
                                    var num1 =parseInt(num);
                                    var input = $('.number_cart_input');
                                    input.val(++ num1);
                                });
                            });

                        </script>


                    </div>

                    <div class="yeucau_call">
                        <p>Yêu cầu gọi lại</p>
                        <form id="form_call" method="post">
                            <input type="text" class="input_Call" name="callback_phone" placeholder="Nhập số điện thoại">
                            <input type="hidden" value="<?=$item->id?>" id="call_back_id">
                            <input type="submit" class="submit_Call" id="submit_callback" value="Gửi">
                            <div class="clear"></div>
                            <div id="error_callback"></div>
                        </form>
                    </div>

                </div>

            </div>

            <div id="container">
                <div class="comment_danhgia">
                    Chi tiết sản phẩm
                </div>
                <div class="container_pr">
                    <?=$item->content1?>
                </div>
            </div>

            <div class="orther_sp">
                <div class="title_div1">Sản phẩm khác</div>
                <div class="orther_sp_1">
                <?php $i=1; foreach ($lienquan as $r1){ ?>
                    <div class="child_product_home">
                        <a href="<?=site_url($r1->link)?>" class="img_product"><img src="<?= base_url() ?><?=$r1->img ?>"> </a>
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

    </div>

</div>

<script type="text/javascript">
        $("#submit_callback").click(function () {
            var b = $("#call_back_id").val();
            var c = /^0([0-9]{9,10})$/;
            var a = $("input[name=callback_phone]").val();
            if (a == "") {
                $("#error_callback").html('<div class="show_error_white">Bạn chưa nhập số điện thoại</div>');
                return false
            } else {
                if (!c.test(a)) {
                    $("#error_callback").html('<div class="show_error_white">Số điện thoại không hợp lệ.</div>');
                    return false
                }
            }
            if (a != "" && c.test(a)) {
                $.ajax({
                    type: "POST",
                    url: "call-back",
                    data: {id_item: b, phone: a, link: window.location.href},
                    success: function (d) {
                            alert("Cảm ơn bạn. Chúng tôi sẽ gọi lại sau ít phút !");
                            $("#error_callback").html('<div class="show_error_white">Cảm ơn bạn. Chúng tôi sẽ gọi lại sau ít phút.</div>');
                        window.location.reload();
                    }
                })
            }
            return false;
        })
</script>
