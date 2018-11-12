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
                        obj.title = "đang hiện";
                    else
                        obj.title = "Dang ẩn";
                }
            });
        });
    });
</script>

<div class="contentcontainer">
    <div class="headings altheading">

        <h2>Danh sách thành viên
            <span style="cursor: pointer;color: #f00000" class="add" href="#"  onclick="downloadfile()"> Export excel</span>

        </h2>

    </div>
    <div class="contentbox">

        <br>
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>



            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th ><span id="sapmota"> Tên user</span></th>
                <th width="80" style="text-align: center">Email</th>


                <th width="120" align="center"> Action </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $row) { ?>
                <tr class="hang">
                    <td style="text-align: center"> <?= $i++ ?></td>
                    <td class="tin" valign=top> <?=$row->name?></td>


                    <td class="tin" valign=top style="text-align: center"><?=$row->email?></td>
                    <td style="text-align: center" class="action">
                        <a href="<?= site_url('back/member/view/' . $row->id) ?>">Xem</a>



                    </td>
                </tr>
            <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p>
    </div></div>

<script>
    function downloadfile()
    {

        var url = "<?=base_url('back/exportExcel/index')?>";
        window.location = url;
    }

</script>