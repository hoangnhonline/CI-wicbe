<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');

$mxh = $CI->Thongtin_web->show_company(1);
?>

<div class="div_order">
    <div class="div_order1">
    <div class="cate_div_1"><i></i><p><?=$title?></p></div>

    <form id="f_dathang" name="f_dathang" method="post" action="">
        <table width="100%" class="table_dathang">
            <tr class="title">
                <td  valign="middle" style="text-indent:10px;">Hình ảnh</td>
                <td  valign="middle">Tên sản phẩm</td>
                <td  valign="middle">Giá</td>
                <td  valign="middle">SỐ LƯỢNG</td>
                <td valign="middle">Lựa chọn</td>
            </tr>
            <?php
            if(count($this->cart->contents())==0){
               redirect(site_url());
            }
            $tongtien = 0;
            $soluong = 0;
            $x=0;
            foreach ($this->cart->contents() as $row) {
                $id =$row['id'];
                $product = $this->M_item->show_detail_item_id(array('id' => $id));
                if ($product->price_pro > 0)
                    $price = $product->price_pro;
                else
                    $price = $product->price;
                $tongtien = $tongtien + $row['qty'] * $price;
                $soluong = $soluong + $row['qty'];

                if (isset($product->id)) {
                    ?>
                    <tr class="<?php if($x%2==0) {?>bg<?php }?>">
                        <td valign="middle" class="hinhsp">
                            <img  title="<?php echo $product->name ?>" alt="<?php echo $product->name ?>" src="<?=base_url($product->img)?>" width="90px"   />
                        </td>
                        <td valign="middle"><?php echo $product->name ?></td>
                        <td valign="middle"><?php echo number_format($row['qty'] * $price, 0, ',', '.') ?>&nbsp;VNĐ</td>
                        <td valign="middle" class="themsoluong">

                            <a class="tru_soluong" id="<?php echo $row['rowid'] ?>" href="" onclick="return false">
                                <img src="theme/images/4.gif"  />
                            </a>

                            <input type="text" value="<?php echo $row['qty'] ?>" id="sl<?php echo $row['rowid'] ?>" name="soluong" class="textsoluong" style="width:50px; text-align: center" />

                            <a class="cong_soluong" id="<?php echo $row['rowid'] ?>" href="" onclick="return false">
                                <img src="theme/images/5.gif" />
                            </a>
                        </td>

                        <td valign="middle">&nbsp;
                            <a onclick="return false" class="xoa-cart red" id="<?php echo $row['rowid'] ?>" title="Xoá" href="">
                                <img src="theme/images/delete.png">
                            </a>
                        </td>
                    </tr>
                <?php }} ?>

            <?php     if (isset($product->id)) { ?>
                <tr class="price_cart_tong">
                    <td colspan="3"></td>
                    <td colspan="2" style="border-right: none">
                        <p style="width:100%; text-align:left; font-weight:bold;text-indent: 10px;background: #f00;padding: 10px;color: #fff">Tổng tiền : <?php echo number_format($tongtien, 0, ',', '.') ?>&nbsp;VNĐ</p>
                    </td>
                </tr>
            <?php }?>
        </table>
        <?php     if (isset($product->id)) { ?>


            <div class="box_contact">
                <p class="tt_tt">Thông tin thanh toán</p>
                <form enctype="multipart/form-data" method="post">
                    <div class="box_contact1">
                        <div class="left_box_contact">
                            <input type="text" class="input_box_1" id="name" name="name" placeholder="Họ và tên (*)" required>
                            <input type="email" class="input_box_1" id="email" name="email" placeholder="Email ">
                            <input type="text" class="input_box_1" id="phone" name="phone" placeholder="Điện thoại (*)" required>
                            <input type="text" class="input_box_1" id="address" name="address" placeholder="Địa chỉ">
                        </div>
                        <div class="right_box_contact">
                            <textarea class="note_cart" placeholder="Ghi chú" id="note"></textarea>
                            <input type="submit" class="send_box"  value="Gửi">
                        </div>

                    </div>
                </form>
            </div>



        <?php }?>
    </form>
</div>
</div>

<?php if(isset($order)){ ?>

    <script type="text/javascript">
        alert("Đặt hàng thành công !");
    </script>

<?php } ?>


<script>
    $(".huy_gio_hang").click(function() {
        $.post('delete_aill', function(dt) {
            location.href = '<?php echo site_url() ?>';
        });
    });

    //---------------------------------
    $(".xoa-cart red").click(function() {
        var rowid = $(this).attr('id');
        var qty = $('#sl' + rowid).val();
        $.post('update_cart', {qty: qty, rowid: rowid}, function(dt) {
            window.location.reload();
        });

    });

    //-------------------------------
    $(".xoa-cart").click(function() {
        var rowid = $(this).attr('id');
        $.post('remove_cart', {rowid: rowid}, function(dt) {
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

<script type="text/javascript">

    $(document).ready(function(){

        $('.send_box').click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var phone = $("#phone").val();
            var note = $("#note").val();
            if (name == '') {
                $("#name").addClass("error");
                return false;
            } else {
                $("#name").removeClass("error");
            }
            if (address == '') {
                $("#address").addClass("error");
                return false;
            } else {
                $("#address").removeClass("error");
            }
            if (phone == '') {

                $("#phone").addClass("error");
                return false;
            } else {
                $("#phone").removeClass("error");
            }

            $.ajax({
                type: "POST",
                url: "insert-order",
                data: {name:name,email: email,address:address,phone:phone,note:note},
                success: function (data) {

                    window.location.reload();
                }
            });
            alert("Đặt hàng thành công chúng tôi sẽ liên hê bạn trong thời gian sớm nhất !");
        });
        function chk_val(val) {
            var chk = /^\d+$/.test(val);

            if (!chk) {
                return false;
            }
        }
        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }

    })

</script>
<style>
    .error{border: 1px solid #f00 !important;}
</style>