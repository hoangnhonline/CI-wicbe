<div class="order_info order">
    <span style='width: 100%;clear: both;height: 10px;float: left'></span>
    <form method="post" action="" name="f_order" id="f_order">

        <h2 >Thông tin đặt hàng</h2>
        <div style="clear: both"></div>
        <ul class="nguoidathang" style="padding-top:15px">
            <table width="100%" class="ds_donhang">
                <tr  class="title">
                    <td width="" valign="middle" style="text-indent:10px;">Sản phẩm</td>
                    <td width="150" valign="middle">Giá gốc</td>
                    <td width="160" valign="middle">Số lượng</td>
                    <td width="160" valign="middle">Thành tiền</td>
                </tr>

                <?php
                $tongtien = 0;
                $soluong = 0;
                $x = 0;
                foreach ($this->cart->contents() as $row) {
                    $id = $row['id'];
                    $product = $this->a_item->show_detail_item_where(array('itemdetail.item_id' => $id), 'vn');
                    if ($product->item_price_sale > 0)
                        $price = $product->item_price_sale;
                    else
                        $price = $product->item_price;
                    $tongtien = $tongtien + $row['qty'] * $price;
                    $soluong = $soluong + $row['qty'];
                    $thumb = $this->a_item->show_thumb($id);
                    //$color = $this->a_general->get_colorID($row['color']);
                    ?>
                    <tr class="<?php if ($x % 2 == 0) { ?>bg<?php } ?>">
                        <td>
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
                        <td valign="middle"><?php echo number_format($price, 0, ',', '.') ?> VNĐ</td>
                        <td valign="middle"><?php echo $row['qty'] ?></td>
                        <td valign="middle"><?php echo number_format($row['qty'] * $price, 0, ',', '.') ?> VNĐ</td>
                    </tr>
                    <?php $x++;
                } ?>
                <tr>
                    <td colspan="3" style="height: 10px"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Tổng thanh toán :</td>
                    <td class="tongsotien" >
                        <span class="tongtien"><?= number_format($tongtien) ?> VNĐ</span>
                    </td></tr>
                <tr>
                    <td align="right" style="border:none; " colspan="4">
                        <a  class="thaydoi" href="<?php echo site_url('gio-hang') ?>">
                            Thay đổi giỏ hàng
                        </a>
                    </td>
                </tr>
            </table>
        </ul>
        <ul class="nguoidathang">
            <h2>Thông tin người nhân hàng</h2>
            <div style="clear: both"></div>



            <div class="wp_nguoinhan">
                <form action="" method="post" id="frmprof" name="frmprof" enctype="multipart/form-data" >
                    <div class="left_nguoinhan">
                        <input type="text" value="" class="input_ngnhan" id="hoten" name="hoten" placeholder="Tên người nhận">
                        <input type="text" value="" class="input_ngnhan input_ngnhan1" id="email" name="email" placeholder="Email">
                        <input type="text" value="" class="input_ngnhan" id="diachi" name="diachi" placeholder="Địa chỉ">
                        <input type="text" value="" class="input_ngnhan input_ngnhan1" id="dienthoai" name="dienthoai" placeholder="Điện thoại">
                    </div>
                    <div class="right_nguoinhan">
                        <textarea class="textbox" id="ghichu" name="ghichu" style="" placeholder="Ghi chú"></textarea>
                    </div>
                    <div class="wp_submit">
                        <input type="button" value="Gửi" name="ok" id="ok" class="back_home" />
                    </div>
                </form>
            </div>
    </form>

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $('.back_home').click(function(){
            var hoten = $("#hoten").val();
            var email = $("#email").val();
            var diachi = $("#diachi").val();
            var dienthoai = $("#dienthoai").val();
            var ghichu = $("#ghichu").val();

            if (hoten == '') {
                alert("Bạn vui lòng nhập họ & tên.");
                $("#hoten").addClass("error");
                return false;
            } else {
                $("#hoten").removeClass("error");
            }
            if (email == '' || IsEmail(email) == false) {
                alert("Bạn vui lòng nhập email hoặc email không đúng định dạng .");
                $("#email").addClass("error");
                return false;
            } else {
                $("#email").removeClass("error");
            }
            if (diachi == '') {
                alert("Bạn vui lòng địa chỉ .");
                $("#diachi").addClass("error");
                return false;
            } else {
                $("#diachi").removeClass("error");
            }
            if (dienthoai == '') {
                alert("Bạn vui lòng số điện thoại.");
                $("#dienthoai").addClass("error");
                return false;
            } else {
                $("#dienthoai").removeClass("error");
            }

            if (ghichu == "" ) {
                alert("<Bạn vui lòng nhập nội dung");
                $("#ghichu").addClass("error");
                return false;
            } else {
                $("#ghichu").removeClass("error");
            }
            $.post("insert-order", {hoten:hoten,email: email,diachi:diachi,dienthoai:dienthoai,ghichu:ghichu}, function(data) {
                if (data == "1")
                {
                    alert("Gửi thành công !");
                    window.location.reload();
                } else {
                    alert("Error !");
                }
            })



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