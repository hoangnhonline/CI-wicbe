

<!-- Alternative Content Box Start -->
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Đơn hàng</h2>
    </div>
    <div class="contentbox">
        <form action="" method="get" id="f_reports" style="">

            <input type="text" class="input_search_admin"  name="name" placeholder="Họ và Tên"/>

            <input  type="text" class="input_search_admin"  name="email" placeholder="email"/>
            <input  type="text" class="input_search_admin"  name="phone" placeholder="Số điện thoại"/>
            <input type="submit" class="btn" value="Tìm kiếm" name=""  style="" id="btn_search"/>
        </form>
        <div style="clear:both; height:10px"></div>
        <form method="post" action=""	enctype="multipart/form-data">
            <table width="100%">
                <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="30%">Mã đặt hàng</th>
                    <th style="text-align: center">Ngày mua</th>

                    <th style="text-align: center">Tình trạng</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody id="show_list_ajax">
                <?php
                $x=0;
                foreach($list as $i){
                    $price=$this->M_item->show_sum_order_item_id($i->id)->total;
                    $status=$this->M_item->get_tableID($i->status,'order_status');
                    ?>
                    <tr <?php if($x%2==0){?>class="alt"<?php }?>>
                        <td style="text-align:center"><?php echo $i->id?></td>
                        <td><a href="back/order/view/<?php echo $i->id?>"><b><?php echo $i->code_booking?></b></a>
                            <?php if($i->status==0) echo '<i style="color:#B5D04E">[Chưa Đọc]</i>'?></td>
                        <td style="text-align:center"><?php echo date('d-m-Y',strtotime($i->date_create))?></td>

                        <td style="text-align:center"><?php
                            if($i->status==0) echo "Đang chờ duyệt";else if($i->status==1) echo "Đã duyệt";else if($i->status==2) echo "Đã giao";

                            ?></td>
                        <td style="text-align:center"><a href="back/order/view/<?php echo $i->id?>" title=""><i>Xem</i></a> |


                            <a onclick="return confirm('Có chắc bạn muốn xóa ?');"  href="back/order/delete/<?php echo $i->id?>/<?php echo $page_no?>" title="">xóa</a>

                        </td>
                    </tr>
                    <?php $x++;}?>
                </tbody>
            </table>
            <?  echo $link ?>
            <div style="clear: both;"></div>
        </form>
    </div>
</div>
<!-- Alternative Content Box End -->

<style>
    .input_search_admin{padding: 5px 10px}
</style>
