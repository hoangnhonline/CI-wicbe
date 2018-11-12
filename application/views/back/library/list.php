<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'video_library';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/library/anhien12/' + idLT + '/' + fr + '/' + wh,
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
            fr = 'video_library';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/library/noibat/' + idLT + '/' + fr + '/' + wh,
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

        <h2>Danh sách<a class="add" href="<?= site_url('back/library/add/'.$type)?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>

    </div>

    <div class="contentbox">
        <br>
        <table id="dstin"  border="1" cellpadding="1"  cellspacing="0"  width="100%"  align=center>
      <tr>
          <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/library/index/'.$type)?>" >
                        <input type="text" id="MoTa" name="TieuDe" placeholder="  Nhập tiêu đề cần tìm" value="" style="width:300px; height:25px; vertical-align:middle" />


                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>
            <tr>
                <th width="30" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="250">Tên Sản Phẩm</th>
                <?php if($type !=3) { ?>
                <th width="50">Hình Ảnh</th>
                <?php } ?>
                <th width="50">Nổi bật</th>
                <th width="50">Thứ tự</th>
                <th width="50" align="center" >  Action </th>
            </tr>
       <?php foreach ($list as $row){ ?>
            <tr class="hang">
               <td class="tin" valign=top></td>
                <td class="tin" valign=top><?=$row->name?></td>
                <?php if($type !=3) { ?>
                <td class="tin" valign=top>

                    <img src="<?=$row->thumb?>" height="50" width="80"/>
                </td>
<?php } ?>
                <td class="tin" valign=top style="text-align: center">
                    <img src="noibat_<?=$row->hot?>.png" width="15" height="15" title="" class="noibat" id="<?=$row->id?>" />
                </td>

                <td style="text-align:center" class="tin" valign=top><?=$row->weight?></td>
                <td align="center" style="text-align: center" class="action">

                    <a href="<?=  base_url('back/library/edit').'/'.$type.'/'.$row->id?>">Chỉnh</a>

                     | <a href="<?=base_url('back/library/delete').'/'.$type.'/'.$row->id?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a>
                     |

                     <img src="AnHien_<?=$row->status?>.png" width="15" height="15" title="" class="anhien" id="<?=$row->id?>" />

                </td>
            </tr>
       <?php }?>

        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"></p>
    </div></div>