<form name="them" method="post" id="them" action=""	enctype="multipart/form-data">
    <div class="contentcontainer">
        <div class="headings altheading">
            <h2>Xem</h2>
        </div>
        <div class="contentbox">
            <div id="div_input">
                <div class="noticebox" style="width: 98%">
                    <div class="innernotice" style="width: 50%">
                        <h3 style="margin-bottom:10px">Thông tin người mua</h3>
                        <?php if($customers->points==1){?>
                         <?php $list_1 = $this->M_item->get_table($customers->mobile) ?>
                        <p>Họ Và Tên: <b><?php echo isset($list_1->name) ? $list_1->name : '' ?></b></p>
                        <p>Email: <b><?php echo isset($list_1->email) ? $list_1->email : '' ?></b></p>
                        <p>Số Điện Thoại: <b><?php echo isset($list_1->mobile) ? $list_1->mobile : '' ?></b></p>
                        <p>Địa chỉ: <b><?php echo isset($list_1->address) ? $list_1->address : '' ?></b></p>
                    <?php }else{?>
                            <p>Họ Và Tên: <b><?php echo isset($customers->name) ? $customers->name : '' ?></b></p>
                            <p>Email: <b><?php echo isset($customers->email) ? $customers->email : '' ?></b></p>
                            <p>Số Điện Thoại: <b><?php echo isset($customers->mobile) ? $customers->mobile : '' ?></b></p>
                            <p>Địa chỉ: <b><?php echo isset($customers->address) ? $customers->address : '' ?></b></p>
                    <?php } ?>
                    </div>
                    <div class="innernotice" style="width: 40%; border: 0px;">
                        <h3 style="margin-bottom:10px">Ghi chú</h3>
                        <p><b> <?php echo isset($customers->note) ? $customers->note : '' ?></b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contentcontainer">
        <div class="headings altheading">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <div class="contentbox">

            <table width="100%">
                <thead>
                <tr>
                    <th >Tên sản phẩm</th>
                    <th>Ngày mua</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x = 0;
                $tong = 0;
                foreach ($row as $row) {
                    if (isset($row->id_order)) {
                        $name = $this->M_item->show_detail_item_id_lang($row->id_item);
                        $tong = $tong + ($row->price * $row->quantity);
                        ?>
                        <tr <?php if ($x % 2 == 0) { ?>class="alt"<?php } ?>>

                            <td align="center"><?php echo isset($name->name) ? $name->name : 'Sản phẩm đã bị xoá khỏi danh sách' ?></td>
                            <td align="center"><?php echo date('d-m-Y', strtotime($order->date_create)) ?></td>
                            <td align="center"><?php echo (number_format($row->price, 0, ',', '.')) ?> VND</td>
                            <td align="center"><?php echo $row->quantity ?></td>
                            <td align="center"><?php echo number_format(($row->price * $row->quantity), 0, ',', '.') ?> VND</td>
                        </tr>
                        <?php
                        $x++;
                    }

                }
                ?>
                <tr style="display: none">
                    <?php
                    $codes = "Không sử dụng";
                    $value = 0;
                    $dis=0;
                    if ($order->code_sale_id != 0) {
                        $code_sale = $this->M_item->get_tableWhere(array("id" => $order->code_sale_id), "code_sale");
                        if (isset($code_sale->id)) {
                            $codes = $code_sale->code;
                            $value = $code_sale->value;
                            $dis=$value*$tong/100;
                        }
                    }
                    ?>
                    <td colspan="2"></td>
                    <td style="text-align:center"><b>Mã giảm giá</b></td>
                    <td style="text-align:center"><?php echo $codes; ?> </td>
                    <td style="text-align:center">- <?php echo $value; ?> %</td>
                </tr>
                <tr>

                    <td colspan="3"></td>
                    <td style="text-align:center"><b>Tổng tiền</b></td>
                    <td style="text-align:center"><?php echo (number_format($tong - $dis, 0, ',', '.')) ?> VND</td>
                </tr>
                </tbody>
            </table>
            <?php if (count($order) > 0) { ?>
                <p>
                    <input type="radio" value="1" name="status" <?php if ($order->status == 1) { ?>checked<?php } ?>>
                    Đã duyệt
                    <input type="radio" value="0" name="status" <?php if ($order->status == 0) { ?>checked<?php } ?>>
                    Chưa duyệt
                    <input type="radio" value="2" name="status" <?php if ($order->status == 2) { ?>checked<?php } ?>>
                    Đã giao </p>
            <?php } ?>
            <input type="submit" value="Cập Nhật" name="ok" class="btn" />
            <A href="<?php echo site_url('back/order/index/') ?>">
                <input type="button" value="Cancel" name="ok" class="btnalt" />
            </A>
            <div style="clear:both; height:10px"></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</form>