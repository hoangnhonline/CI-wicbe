


<div class="order fullbox">
    <form id="f_dathang" name="f_dathang" method="post" action="">
        <table width="100%" class="table_dathang">
            <tr class="title">
                <td  valign="middle" style="text-indent:10px;">S?n ph?m</td>
                <td  valign="middle">Giá g?c</td>
                <td  valign="middle">S? l??ng</td>
                <td  valign="middle">Thành ti?n</td>
                <td valign="middle">L?a ch?n</td>

            </tr>
            <?php
            $tongtien = 0;
            $soluong = 0;
            $x=0;
            foreach ($this->cart->contents() as $row) {


            $id =$row['id'];


            $product = $this->a_item->show_detail_item_where(array('item.id' => $id),$lang);




            if ($product->item_price_sale > 0)
                $price = $product->item_price_sale;
            else
                $price = $product->item_price;
            $tongtien = $tongtien + $row['qty'] * $price;
            $soluong = $soluong + $row['qty'];
            $thumb = $this->a_item->show_thumb($id);


            if (isset($product->item_id)) {
                ?>
                <tr class="<?php if($x%2==0) {?>bg<?php }?>">
                    <td valign="middle" class="hinhsp">
                        <?php $thumb = $this->a_item->show_thumb($product->item_id);
                        ?>
                        <?php
                        if (file_exists('./uploads/san-pham/' . $thumb->thumb)) {
                            ?>
                            <img  title="<?php echo $product->item_name ?>" alt="<?php echo $product->item_name ?>" src="uploads/san-pham/<?php echo isset($thumb->thumb) ? $thumb->thumb : '' ?>" width="90px"   />
                            <?php
                        } else {
                            ?>

                            <img title="<?php echo $product->item_name ?>" alt="<?php echo $product->item_name ?>"src="<?php echo $thumb->thumb ?>" width="90px"/>
                        <?php } ?>
                    </td>
                    <td valign="middle"><?php echo number_format($price, 0, ',', '.') ?>?</td>
                    <td valign="middle" class="themsoluong">

                        <a class="tru_soluong" id="<?php echo $row['rowid'] ?>" href="" onclick="return false">
                            <img src="theme/images/4.gif"  />
                        </a>

                        <input type="text" value="<?php echo $row['qty'] ?>" id="sl<?php echo $row['rowid'] ?>" name="soluong" class="textsoluong" style="width:50px; text-align: center" />

                        <a class="cong_soluong" id="<?php echo $row['rowid'] ?>" href="" onclick="return false">
                            <img src="theme/images/5.gif" />
                        </a>
                    </td>
                    <td valign="middle"><?php echo number_format($row['qty'] * $price, 0, ',', '.') ?>VN?</td>
                    <td valign="middle">
                        <a class="cn-cart red" id="<?php echo $row['rowid'] ?>" href="" onclick="return false">
                            [ C?p nh?t ]
                        </a>
                        &nbsp;
                        <a onclick="return false" class="xoa-cart red" id="<?php echo $row['rowid'] ?>" title="Xoá" href="">
                            [ Xóa ]
                        </a>
                    </td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td colspan="7">
                        <p style="width:100%; text-align:center; font-weight:bold; color:#F00">T?ng ti?n</p>

                    </td>
                </tr>
            <?php } ?>

            <tr  style="border-bottom:none">

                <?php } ?>
                <?php if ($this->cart->total_items() > 0) {
                ?>
                <td colspan="4"></td>
                <td  valign="middle">
                    T?ng ti?n : <span class="tongtien"> <?php echo number_format($tongtien, 0, ',', '.') ?>VN?
                </td>
            </tr>

            <tr  class="button_buy">
                <td colspan="6" style="text-align: center">
                    <a href="<?php echo site_url($lang.'/'.$l->lang_home_link[$lang]) ?>" title="" class="back_home">
                        <?=$l->lang_home[$lang]?>
                    </a>
                    <a href="" class="huy_gio_hang" onclick="return false">
                        <?=$l->lang_huy[$lang]?>
                    </a><a href="<?=site_url($lang.'/'.$l->lang_thanhtoan_link[$lang])?>" class="checkout">
                        <?=$l->lang_thanhtoan[$lang]?>
                    </a>
                </td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="7">
                    <p style="width:100%; text-align:center; font-weight:bold; color:#F00;padding-bottom: 20px;padding-top: 10px">T?ng ti?n</p>

                </td>
            </tr>
        <?php } ?>
        </table>

    </form>
</div>
<script>
    $(".huy_gio_hang").click(function() {
        $.post('remove_all_cart', function(dt) {
            location.href = '<?php echo site_url() ?>';
        });
    });

    //---------------------------------
    $(".cn-cart").click(function() {
        var rowid = $(this).attr('id');
        var qty = $('#sl' + rowid).val();
        $.post('update_cart', {qty: qty, rowid: rowid}, function(dt) {
            alert(dt);
            window.location.reload();
        });

    });

    //-------------------------------
    $(".xoa-cart").click(function() {
        var rowid = $(this).attr('id');
        $.post('remove_cart', {rowid: rowid}, function(dt) {
            alert(dt);
            window.location.reload();
        });
    });

    //-------------------------------
    $(".cong_soluong").click(function() {
        var rowid = $(this).attr('id');
        var qty = $('#sl' + rowid).val();
        $.post('cong_soluong', {qty: qty, rowid: rowid}, function(dt) {
            window.location.reload();
        });
    });

    //-------------------------------
    $(".tru_soluong").click(function() {
        var rowid = $(this).attr('id');
        var qty = $('#sl' + rowid).val();
        $.post('tru_soluong', {qty: qty, rowid: rowid}, function(dt) {
            window.location.reload();
        });
    });
</script>
