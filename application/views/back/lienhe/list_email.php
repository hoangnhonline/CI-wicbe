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
<div class="contentcontainer">
    <div class="headings altheading">

        <h2>Danh sách email
        </h2>

    </div>
    <div class="contentbox">

        <br>
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>

            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="250" style="text-align: center" > Email</span></th>
                <th width="120" style="text-align: center">Ngày Liên Hệ</th>
                <th width="120" align="center" style="text-align: center"> Action </th>
            </tr>
            <?php $i=1; ?>
            <?php foreach ($list as $row){ ?>
                <tr class="hang">
                    <td style="text-align: center"><?=$i++?></td>
                    <td class="tin" valign=top><?=$row->email?></td>
                    <td class="tin" style="text-align: center" valign=top>
                        <?=date('d-m-Y', strtotime($row->date_reseive))?>
                    </td>
                    <td style="text-align: center" class="action">
                        <a href="<?=  base_url('back/lienhe/delete1/'.$row->id)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p>
    </div></div>