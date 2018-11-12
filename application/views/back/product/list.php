<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'item';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/product/anhien12/' + idLT + '/' + fr + '/' + wh,
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
                url: '<?= site_url() ?>' + 'back/product/noibat/' + idLT + '/' + fr + '/' + wh,
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
<script type="text/javascript">
    $(document).ready(function() {
        $("img.slide").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'item';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/product/chayslide/' + idLT + '/' + fr + '/' + wh,
                cache: false,
                success: function(data) {
                    obj.src = data;
                    if (data == "noibat_1.png")
                        obj.title = "Chạy slide";
                    else
                        obj.title = "Không chạy slide";
                }
            });
        });
    });
</script>
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Danh sách sản phẩm<a class="add" href="<?= site_url('back/product/add'.'/'.$id)?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>    
        
    </div>
   
    <div class="contentbox">
        <br> 
        <table id="dstin"  border="1" cellpadding="1"  cellspacing="0"  width="100%"  align=center>
      <tr>
                <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/product/index/'.$this->uri->segment(4))?>" >
                        <input type="text" id="MoTa" name="TieuDe" placeholder="  Nhập tiêu đề cần tìm" value="" style="width:300px; height:25px; vertical-align:middle" />
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>
            <tr>
                <th width="30" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="250">Tên Sản Phẩm</th>
                <th width="50">Hình Ảnh</th> 
                <th width="30" >Nổi bật</th>
               
                <th width="50">Thứ tự</th> 
                <th width="100" align="center" >  Action </th>
            </tr>
            <?php $i=1; ?>
           <?php foreach ($item as $row) {?>
            <tr class="hang">
               <td class="tin" valign=top><?=$i++;?></td>
                <td class="tin" valign=top><?=$row->item_name?></td>
                <td class="tin" valign=top>
                    <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$row->file ?>&w=70&h=70&zc=1" height="50" width="80"/>
                </td>
                 
                <td style="text-align:center" class="tin" valign=top>

                    <?php if ($row->item_hot== 1) { ?>

                        <a href="back/product/hide_hot/<?=$type?>/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Hiện"><img src="noibat_1.png" alt="Approve" /></a>

                    <?php } else { ?>

                        <a href="back/product/show_hot/<?=$type?>/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Ẩn"><img src="noibat_0.png" alt="Unapprove" /></a>

                    <?php } ?>

                </td>
              
                <td style="text-align:center" class="tin" valign=top><?=$row->item_weight?></td>
                <td align="center" class="action">
                    
                    <a href="<?=  base_url('back/product/edit').'/'.$id.'/'.$row->id?>">Chỉnh</a>
                     | <a href="<?=  base_url('back/product/delete').'/'.$id.'/'.$row->id?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a>
                     |

                    <?php if ($row->item_status== 1) { ?>

                        <a href="back/product/hide/<?=$type?>/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Hiện"><img style="width: 15px;height: 15px" src="AnHien_1.png" alt="Approve" /></a>

                    <?php } else { ?>

                        <a href="back/product/show/<?=$type?>/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Ẩn"><img style="width: 15px;height: 15px" src="AnHien_0.png" alt="Unapprove" /></a>

                    <?php } ?>
                </td>
            </tr>
         
           <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p> 
    </div></div>