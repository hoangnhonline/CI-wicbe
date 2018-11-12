
<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('M_item');
$CI->load->model('Title');
if($this->uri->segment(1)=='vn'){$nn = 'vn';}else{$nn= 'en';}



$i =1;
?>


<div id="content_product">
    <div class="content_product">

        <?php foreach($list as $r) { ?>
            <?php $thumb = $CI->M_item->show_thumb($r->id) ?>
            <div class="child_product_nb" style="<?php if($i%4==0){echo 'margin-right:0px;';}?>">
                <a href="<?=site_url($nn .'/'.$r->item_link)?>">
                    <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$thumb->thumb?>&w=255&h=300&zc=1">
                </a>
                <a href="" class="text_name_product"><?=$r->item_name?></a>
                <span class="code_home">Ma : <?=$r->item_code?></span>
                <span class="gia_home"><p class="giagoc"><?php if($r->item_price==0){echo'0';}else{echo number_format($r->item_price, 0, ",", ".");} ?></p>
                    <p class="giakm"><?php if($r->item_price_sale==0){echo'';}else{echo number_format($r->item_price_sale, 0, ",", ".");} ?></p></span>
                <span class="add_card" id="<?php echo $r->id ?>">ADD TO CART</span>
                <input name="id" class="id"  value="<?php echo $r->id ?>" type="hidden">
                <input name="lang" class="lang" value="vn"  type="hidden">
            </div>
            <?php $i++; }?>

        <p id="thanhphantran"><?=$link?></p>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.add_card').click(function() {
            var idsp = $(this).attr('id');
            var lang = $(".lang").val();
            $.post('addcart', {idsp: idsp}, function(data) {
                if (data != '')
                {
                    var tong = $('#tong').text();
                    $('#tong').text(parseInt(tong) + 1);
                }
                if (data == 'insert')
                {
                    if (lang == 'vn')
                        alert("?ã thêm vào hàng");
                    else
                        alert("Added to cart !");
                    window.location.reload()
                }
                else {

                    if (lang == 'vn')
                        alert('?ã c?p nh?t s? l??ng');
                    else
                        alert('Renewed additional amount !');
                    window.location.reload()
                }

            });
            return false;

        });

    })
</script>
