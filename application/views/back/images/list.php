<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'album';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/images/anhien12/' + idLT + '/' + fr + '/' + wh,
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
<script type="text/javascript">
    $(document).ready(function() {
        $("img.noibat").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'item';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/item/noibat/' + idLT + '/' + fr + '/' + wh,
                cache: false,
                success: function(data) {
                    obj.src = data;
                    if (data == "noibat_1.png")
                        obj.title = "Nổi Bật";
                    else
                        obj.title = "Không nổi bật";
                }
            });
        });
    });
</script>
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Danh sách<a class="add" href="<?= site_url('back/images/add/'.$album_parent)?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>    
        
    </div>
   
    <div class="contentbox">
        <br> 
        <table id="dstin"  border="1" cellpadding="1"  cellspacing="0"  width="100%"  align=center>
      <tr>
          <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/images/index')?>" >
                        <input type="text" id="MoTa" name="TieuDe" placeholder="  Nhập tiêu đề cần tìm" value="" style="width:300px; height:25px; vertical-align:middle" /> 

                        
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>
            <tr>
                <th width="30" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="250">Tên Sản Phẩm</th>
                <th width="50">Hình Ảnh</th> 
                
                <th width="50">Thứ tự</th> 
                <th width="50" align="center" >  Action </th>
            </tr>
       <?php foreach ($list as $row){ ?>
            <tr class="hang">
               <td class="tin" valign=top></td>
                <td class="tin" valign=top><?=$row->images_name?></td>
                <td class="tin" valign=top>
                   
                    <img src="<?=$row->thumb?>" height="50" width="80"/>
                </td>
                
           
             
                <td style="text-align:center" class="tin" valign=top><?=$row->weight?></td>
                <td align="center" class="action">
                    
                    <a href="<?=  base_url('back/images/edit').'/'.$album_parent.'/'.$row->id?>">Chỉnh</a>
                     | <a href="<?=base_url('back/images/delete').'/'.$album_parent.'/'.$row->id?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a>
                     | 
                            
                     <img src="AnHien_<?=$row->status?>.png" width="15" height="15" title="" class="anhien" id="<?=$row->id?>" />
                </td>
            </tr>
       <?php }?>
         
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"></p> 
    </div></div>