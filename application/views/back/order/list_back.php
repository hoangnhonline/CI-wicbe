<link type="text/css" href="<?php echo base_url()?>theme_admin/js/date/jquery-ui.css" rel="stylesheet"/>
<script>
$(document).ready(function(){
$('#searchStartDate').datepicker({
	dateFormat: 'dd/mm/yy',
});
$('#searchEndDate').datepicker({
	dateFormat: 'dd/mm/yy',
});
});
</script>
<?php 
	$this->load->view('back/inc/messager', array('type_messager'=>$this->input->get('messager') ) );
?>
<!-- Alternative Content Box Start -->
<div class="contentcontainer">
  <div class="headings altheading">
    <h2>Reservations</h2>
  </div>
  <div class="contentbox">
      <form action="" method="post" id="f_reports" style="display: none">
      Từ ngày:
      <input type="text" id="searchStartDate"  name="date_one"/>
      Đến ngày:
      <input  type="text" id="searchEndDate"  name="date_two"/>
      <select id="order_status" name="order_status">
        <option  class="check_item" value="0" ><?php echo "--Tình trạng--"?></option>
        <?php foreach ($this->general->show_list_table(array("status"=>1),1,1,'order_status',0) as $row){?>
        <option  class="check_item" value="<?php echo $row->id?>" ><?php echo $row->name?></option>
        <?php }?>
      </select>
      <input type="button" class="btn" value="Xem Báo cáo" name="ok"  style="float:none" id="btn_search"/>
    </form>
    <div style="clear:both; height:10px"></div>
    <form method="post" action=""	enctype="multipart/form-data">
      <table width="100%">
        <thead>
          <tr>
            <th width="5%">ID</th>
            <th width="30%">Mã booking</th>
            <th>Ngày mua</th>
             <th>Ghi chú</th>
               <th>Phí vận chuyển</th>
            <th>Tình trạng</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="show_list_ajax">
          <?php 
				$x=0;
				foreach($order as $i){
				$price=$this->m_order->show_sum_order_item_id($i->id)->total;
				$status=$this->general->get_tableID($i->status,'order_status');
				?>
          <tr <?php if($x%2==0){?>class="alt"<?php }?>>
            <td style="text-align:center"><?php echo $i->id?></td>
            <td><a href="back/order/view/<?php echo $i->id?>"><b><?php echo $i->code_booking?></b></a>
            <?php if($i->status==0) echo '<i style="color:#B5D04E">[Chưa Đọc]</i>'?></td>
            <td style="text-align:center"><?php echo date('d-m-Y',strtotime($i->date_create))?></td>
            <td><?php echo $i->note?></td>
            <td><?php echo number_format($i->ship_money, 0, ',', '.') ?></td>
            <td style="text-align:center"><?php 
            if($i->status==0) echo "Đang chờ duyệt";else if($i->status==1) echo "Đã duyệt";else if($i->status==2) echo "Đã giao";
          
                ?></td>
            <td style="text-align:center"><a href="back/order/view/<?php echo $i->id?>" title=""><i>Xem</i></a> 
                <?php 
 if($this->m_session->userdata('admin_login')->user_id != 6) {?>
                <a href="back/order/delete/<?php echo $i->id?>/<?php echo $page_no?>" title=""><img src="theme_admin/img/icons/icon_delete.png" alt="Delete" /></a>
                <?php }?>
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
<script type="text/javascript">
$(document).ready(function(){
	$("#btn_search").click(function(){
		var date_one=$('input[name="date_one"]').val();
		var date_two=$('input[name="date_two"]').val();
		var order_status=$("#order_status").val();
		$.post("back/order/list_ajax", {date_one:date_one,date_two:date_two,order_status:order_status},function(data){
				$('#show_list_ajax').html(data);
			});	
		
		
	})
	});
</script> 
