<?php

$CI = &get_instance();
$CI->load->model('M_item');

?>





<div class="title_2_2">

    <h2 class="h2_1">đặt hàng và giao hàng tận nơi</h2>
    <p class="phone_2_1"><b>028-3840.0000</b></p>


    <div class="img_help">
        <img class="img_23" src="theme/images/img_help_3.png">
        <div class="right_contact_text">
            <h2 class="h2_2">các bước đặt hàng</h2>
            <ul>
                <li><i>1</i>Điền thông tin nhận hàng (tên, số điện thoại, địa chỉ nhận hàng)</li>
                <li><i>2</i>Chọn hàng muốn mua</li>
                <li><i>3</i>Tối đa 30 phút (*) bạn sẽ có ngay bình nước tinh khiết</li>
            </ul>

            <p>(*) Thời gian có thể khác nhau tùy thuộc vào vị trí và giao thông tại thời điểm đặt hàng</p>
            <p>Thời gian phục vụ : 7h-20h (T2-T6) 9h-15h(T7-CN)</p>
        </div>
    </div>


    
    <div class="list_hot_dh">
        <div class="title_cate_1">
            <p>Sản phẩm</p>
        </div>


        <?php $i=1; foreach ($list as $h1){ ?>

            <?php $thumb = $CI->M_item->show_thumb($h1->id) ?>
            <div class="child_child_pd <?php if($i%2==0){echo 'child_child_pd_2';}?> <?php if($i%3==0){echo 'child_child_pd_3';}?> <?php if($i%4==0){echo 'child_child_pd1';}?>">
                <?php if($h1->item_price_sale !=0 || $h1->item_price_sale ==''){?>
                    <p class="khuyenmai_1"><?= round(($h1->item_price_sale - $h1->item_price) / $h1->item_price_sale * 100)  ?>%</p>
                <?php }?>
                <a href="<?=site_url($h1->item_link)?>" class="img_pr_1"><img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb->thumb ?>&w=208&h=200&zc=1">
                </a>
                <div class="wp_name1">
                    <a href="<?=site_url($h1->item_link)?>" class="name_pr1"><?=$h1->item_name?> </a>

                    <span class="left_name1">
                            <p class="giagoc <?php if($h1->item_price_sale!=0){echo 'giagoc1';}?>"><?php if($h1->item_price==0){echo '&nbsp;';}else{echo number_format($h1->item_price, 0, ",", "."). '&nbsp;VND'; } ?></p>
                            <p class="gia_km"><?php if($h1->item_price_sale==0){echo '&nbsp;';}else{echo number_format($h1->item_price_sale, 0, ",", "."). '&nbsp;VND'; } ?></p>
                            <div class="quantity">
                           <input type="number" id="input_<?=$h1->id?>" name="input_<?=$h1->id?>" class="input_hotel_mb" min="0" max="9" step="1" value="1">
                            </div>
                        </span><span class="right_name1"><p class="cart" id="<?=$h1->id?>"></p></span>
                </div>
            </div>
            <?php $i++; }?>


          <?=$link?>

        
    </div>





</div>
