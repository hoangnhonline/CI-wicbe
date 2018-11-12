<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'user_customer';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/user/anhien12/' + idLT + '/' + fr + '/' + wh,
                cache: false,
                success: function(data) {
                    obj.src = data;
                    if (data == "AnHien_1.png")
                        obj.title = "Đang hiện";
                    else
                        obj.title = "Đang ẩn";
                }
            });
        });
    });
</script>


<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Danh sách user<a class="add" href="<?=base_url('back/user/add')?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>    
        
    </div>
   
    <div class="contentbox">
        <br> 
        <table id="dstin"  border="1" cellpadding="1"  cellspacing="0"  width="100%"  align=center>
      <tr>
          <td style=""  colspan="8"> <form  id="form2" name="form2" method="get" action="" >
                        <input type="text" id="MoTa" name="TieuDe" placeholder="  Nhập tiêu đề cần tìm" value="" style="width:300px; height:25px; vertical-align:middle" /> 

                        
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form>

          </td>

            </tr>


            <tr>
                <th width="30" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="250">Tên đăng nhập</th>

                <th width="50" style="text-align: center" >  Action </th>
            </tr>
<?php $i=1; ?>
<?php foreach ($list as $row)  {?>
            <tr class="hang">
               <td class="tin" valign=top style="text-align: center"><?=$i++?></td>
                <td class="tin" valign=top><?=$row->user_loginname?></td>

                 

              

                <td align="center" class="action" style="text-align: center">
                    
                    <a href="<?= base_url('back/user/edit/'.$row->user_id)?>">Chỉnh</a>
                     | <a href="<?= base_url('back/user/delete/'.$row->user_id)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a>
                     | 
                            
                            <img src="AnHien_<?=$row->user_status?>.png" width="15" height="15" title="" class="anhien" id="<?=$row->user_id?>" />
                </td>
            </tr>
         <?php }?>

        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p>
    </div></div>

