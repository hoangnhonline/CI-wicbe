

<?php
$this->load->view('back/inc/messager', array('type_messager' => $this->input->get('messager')));
?>
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Danh sách sản phẩm<a class="add" href="<?= site_url('back/item/add'.'/'.$id)?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>    
        
    </div>
   
    <div class="contentbox">
        <br> 
        <table id="dstin"  border="1" cellpadding="1"  cellspacing="0"  width="100%"  align=center>
      <tr>
                <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/item/index/'.$this->uri->segment(4))?>" >
                        <input type="text" id="MoTa" name="name" placeholder="  Nhập tiêu đề cần tìm" value="" style="width:300px; height:25px; vertical-align:middle" />
                        
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>
            <tr>
                <th width="30" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="200">Tên Sản Phẩm</th>
                <th width="50" style="text-align:center">Link</th>
                <th width="50" style="text-align:center">Hình Ảnh</th>
                <th width="30" style="text-align:center">Nổi bật</th>
               
                <th width="50" style="text-align:center">Thứ tự</th>
                <th width="100" style="text-align:center" >  Action </th>
            </tr>
            <?php $i=1; ?>
           <?php foreach ($item as $row) {?>
            <tr class="hang">
               <td class="tin" valign="top" style="text-align: center"><?=$i++;?></td>
                <td class="tin" valign="top"><?=$row->name?></td>
                <td class="tin" valign="top" style="text-align: center"><a href="<?= site_url($row->link) ?>" target="_blank">View</a></td>
                <td class="tin" valign="top" style="text-align:center">
                    <img src="<?=  base_url().'/'.$row->img?>" height="50" width="80"/>
                </td>
                 
                <td style="text-align:center" class="tin" valign=top>
                    <?php  if($row->hot==1){ ?>

                    <a href="<?=site_url('back/item/hide_hot/'.$type.'/'.$row->id.'/'.$page_no)?>"> <img src="noibat_<?=$row->hot?>.png" width="15" height="15" title="" class="noibat"/></a>
                    <?php }else{?>
                        <a href="<?=site_url('back/item/show_hot/'.$type.'/'.$row->id.'/'.$page_no)?>"> <img src="noibat_<?=$row->hot?>.png" width="15" height="15" title="" class="noibat"/></a>
                    <?php } ?>
                </td>
              
                <td style="text-align:center" class="tin" valign=top><?=$row->weight?></td>
                <td  class="action" style="text-align:center">
                    
                    <a href="<?=  base_url('back/item/edit').'/'.$id.'/'.$row->id?>">Chỉnh</a> 
                     | <a href="<?=  base_url('back/item/delete').'/'.$id.'/'.$row->id?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> 
                     |

                    <?php  if($row->status==1){ ?>

                        <a href="<?=site_url('back/item/hide/'.$type.'/'.$row->id.'/'.$page_no)?>"> <img src="AnHien_<?=$row->status?>.png" width="15" height="15" title="" class="noibat"/></a>
                    <?php }else{?>
                        <a href="<?=site_url('back/item/show/'.$type.'/'.$row->id.'/'.$page_no)?>"> <img src="AnHien_<?=$row->status?>.png" width="15" height="15" title="" class="noibat"/></a>
                    <?php } ?>
                </td>
            </tr>
         
           <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p> 
    </div></div>