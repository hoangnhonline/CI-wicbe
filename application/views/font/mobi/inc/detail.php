<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('Title');
$CI->load->model('M_item');
if($this->uri->segment(1)=='vn'){$nn = 'vn';}else{$nn= 'en';}
if($this->uri->segment(1)=='vn'){$d = 'san-pham';}else{$d= 'product';}
if($this->uri->segment(1)=='vn'){$tin = 'tin-tuc';}else{$tin= 'news';}
if($this->uri->segment(1)=='en'){$lg = '2';}else{$lg = '1';}
$list_lq = $CI->M_item->show_sp_lienquan($id_item,$cate->category_id,'vn');
$list_comment = $CI->M_item->show_list_comment_page($id_item,1);

$list_lq_ft = $CI->M_item->show_list_item_sp_home( array('item.item_status'=>1),'vn');
$i=1;

?>

<div class="right_content">
    <div id="content_product">
        <div class="content_product">

            <div class="wp_product_detaiil">
                <h1 class="title_h1"><?=$item->item_name?></h1>
                <div style="float: left;width: 100%;height: 5px;clear: both"></div>
                <div id="img_slide">
                    <?php $thumb_img = $CI->M_item->show_thumb($item->id) ?>
                    <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb_img->thumb ?>&w=330&h=330&zc=1">


                </div>
                <div class="center_product">

                    <div style="float: left;width: 100%;height: 5px;clear:both;"></div>

                    <div>
                        <?=$item->item_summary?>
                    </div>

                    <span style="float: left;width: 100%;height: 10px;clear: both"></span>
                    <div class="soluong">
                        <p class="sl_1">Số lượng</p>
                        <select class="soluong_select" id="soluong">
                            <?php for($j=1;$j<=30;$j++){ ?>
                                <option value="<?=$j;?>"><?=$j;?></option>
                            <?php }?>
                        </select>
                        <span class="card_home_detail" id="<?=$item->id?>">Mua ngay</span>
                        <input name="lang" class="vn" value="vn"  type="hidden">
                    </div>


                    <div style="float: left;width: 100%;height: 10px;clear:both;"></div>
                </div>
                <span style="float: left;width: 100%;clear: both;height: 10px"></span>
                <div class="detail_sanpham">
                    <div class="title_h1">Chi tiết</div>
                    <div style="float: left;width: 100%;height: 10px;clear:both;"></div>
                    <?=$item->item_content?>
                    <div style="float: left;width: 100%;height: 10px;clear:both;"></div>
                </div>

                <div class="sp_product">
                    <div class="title_h1"><p>Sản phẩm liên quan</p></div>
                    <div class="slider_lienquan">
                        <?php foreach($list_lq_ft as $r) { ?>
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
                </div>


            </div>

        </div>
        <ul class="list_menu_child_mb">
            <li><a class="bg_menu" href="" style="text-align: center" onclick="return false">Danh mục</a> </li>

            <?php foreach ($CI->M_category->list_category_all(array('category.category_top !=' => 0, 'category.category_type' => 3,'category.category_status'=>1),'vn') as $row) { ?>

                <li><a href="<?=site_url($row->category_link)?>"><?=$row->category_name?></a> </li>
            <?php }?>



        </ul>

    </div>
    <div style="float: left;width: 100%;height: 10px;clear: both"></div>
</div>









<script type="text/javascript">
    $(document).ready(function() {
        $('.card_home_detail').click(function() {
            var idsp = $(this).attr('id');
            var lang = $(".lang").val();
            var soluong = $("#soluong").val();

            $.post('addcart-detail', {idsp: idsp,soluong:soluong}, function(data) {
                if (data != '')
                {
                    var tong = $('#tong').text();
                    $('#tong').text(parseInt(tong) + 1);
                }
                if (data == 'insert')
                {
                    if (lang == 'vn')
                        alert("Đã thêm vào giỏ hàng");
                    else
                        alert("Đã thêm vào giỏ hàng");
                    window.location.reload()
                }
                else {

                    if (lang == 'vn')
                        alert('Đã cập nhật số lượng');
                    else
                        alert('Đã cập nhật số lượng');
                    window.location.reload()
                }

            });
            return false;

        });

    })
</script>