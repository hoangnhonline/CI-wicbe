<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'article';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/article/anhien12/' + idLT + '/' + fr + '/' + wh,
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
            fr = 'article';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/article/noibat/' + idLT + '/' + fr + '/' + wh,
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
      
        <h2>Danh sách tin
            <a class="add" href="<?= site_url('back/dichvu/add'.'/'.$type)?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>   
   
    </div>
    <div class="contentbox">
      
        <br> 
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>
            <?php if($type==2) {?>
            <tr>
                <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/page/index/'.$this->uri->segment(4))?>" >
                        <input type="text" id="MoTa" name="TieuDe" placeholder=" Nhập tiêu đề cần tìm" value="" style="width:300px; height:22px; vertical-align:middle" /> 

                        
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>
            <?php }?>
            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th ><span id="sapmota"> Tiêu Đề </span></th>
                <th width="140" style="">Nổi bật</th>
                <th width="100">Ngày cập nhật</th>
                <th width="120" align="center"> Action </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $row) { ?>
                <tr class="hang">
                    <td style="text-align: center"> <?= $i++ ?></td>
                    <td class="tin" valign=top><?= $row->article_name ?></td>
                    <td class="tin" valign=top style="text-align: center">
                        <img src="noibat_<?=$row->article_hot?>.png" width="15" height="15" title="" class="noibat" id="<?=$row->id?>" />
                    </td>
                    <td class="tin" style="text-align: center" valign=top><?= date('d-m-Y', strtotime($row->date_modify)) ?></td>    

                    </td>
                    <td style="text-align: center" class="action">
                        <a href="<?= site_url('back/dichvu/edit/'.$type . '/' . $row->id) ?>">Chỉnh</a>

                      |  <a href="<?=  base_url('back/dichvu/delete/'.$type . '/' . $row->id)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> |
                        
                        <img src="AnHien_<?= $row->article_status ?>.png" width="15" height="15" title="" class="anhien" id="<?= $row->id ?>" />

                    </td>
                </tr>
            <?php } ?> 
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p> 
    </div></div>