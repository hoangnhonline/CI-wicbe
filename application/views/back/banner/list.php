<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'images';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/banner/anhien12/' + idLT + '/' + fr + '/' + wh,
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
        <h2><?php if($type ==1){echo 'Thêm Banner';}elseif($type==2){echo 'Thêm hoạt động của shop';}elseif($type==3){echo 'Thêm phản hồi khách hàng';}else{echo 'Thêm video';} ?>

            <?php if($type != 100){ ?>
            <a class="add" href="<?=  site_url('back/banner/add/'.$type)?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
                <?php }?>
        </h2>       
    </div>
    <div class="contentbox">
        <br> 
        <table id="dstin"  border="1" cellpadding="1"  cellspacing="0"  width="100%"  align=center>
      
            <tr>
                <th width="30" style="text-align:center"> Id</th>
                <th width="150">Tên</th>
                    <?php if($type!=4){?>
                <th width="100" style="text-align: center">Hình Ảnh</th>
                <?php } ?>
                <th width="70" style="text-align: center">Thời gian</th>
                <th width="30">Thứ tự</th> 
                <th width="80" style="text-align: center">  Action </th>
            </tr>
          <?php $i=1;?>
           <?php foreach ($list as $row) { ?>
            <tr class="hang">
               <td class="tin" valign="top" style="text-align:center"><?=$i++;?></td>
                <td class="tin" valign="top"><?=$row->name?></td>
                <?php if($type!=4){?>
                <td class="tin" valign="top" style="text-align: center" >
                    <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$row->img ?>&w=100&h=70&zc=1" width="100"/>
                </td>
                <?php } ?>
                <td class="tin" style="text-align: center" valign="top"><?=date('d-m-Y',  $row->time)?></td>
                <td class="tin" style="text-align: center" valign="top"><?=$row->weight?></td>
                <td align="center" class="action" style="text-align:center">
                    <a href="<?= base_url('back/banner/edit').'/'.$type.'/'.$row->id?>">Chỉnh</a>
                    <?php if($type != 100){ ?>
                    | <a href="<?= base_url('back/banner/delete').'/'.$type.'/'.$row->id?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a>
                     | 
                      <img src="AnHien_<?=$row->status?>.png" width="15" height="15" title="" class="anhien" id="<?=$row->id?>" />
<?php }?>
                </td>
            </tr>
           <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p>
    </div></div>