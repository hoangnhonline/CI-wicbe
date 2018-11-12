<?php 
				$x=0;$tong=0;
				foreach($item as $i){
				$price=$this->m_order->show_sum_order_item_id($i->id)->total;
				$tong=$tong+$price;
				$status=$this->general->get_tableID($i->status,'order_status');
				?>
			  	<tr <?php if($x%2==0){?>class="alt"<?php }?>>
	          <td style="text-align:center"><?php echo $i->id?></td>
	          <td>
	          	<a><b><?php echo $i->name?></b></a>
	         		<?php if($i->status==0) echo '<i style="color:#B5D04E">[Chưa Đọc]</i>'?>
	          </td>
					  <td ><?php echo number_format($price,0,'','.')?>(vnđ)</td>
					  <td style="text-align:center"><?php echo date('d-m-Y',strtotime($i->date_create))?></td>
                <td style="text-align:center"><?php echo isset($status->name)?$status->name:'Đang cập nhật'?></td>
	          <td style="text-align:center">
	          	<a href="back/order/view/<?php echo $i->id?>" title=""><i>Xem</i></a>
	            <a href="back/order/delete/<?php echo $i->id?>/<?php echo $page_no?>" title=""><img src="theme_admin/img/icons/icon_delete.png" alt="Delete" /></a>
	          </td>
          </tr>            
			    <?php 
					$x++;
					}?>
           <?php if(count($item) >0){?>
		 <tr style=" background-color:#A60000; color:#FFF"><td></td><td ><b><?php echo "Tổng: "?></b></td><td ><b><?php echo number_format($tong,0,'','.')?></strong></b> (vnđ)</td><td colspan="3"></td></tr>
         <?php }else {?>
         <tr><td colspan="5" align="center">Không có kết quả nào</td></tr>
		  <?php }?>