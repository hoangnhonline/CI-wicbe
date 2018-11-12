<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'yahoo';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/lienhe/anhien12/' + idLT + '/' + fr + '/' + wh,
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

        <h2>Danh sách tin

                <a class="add" href="<?= site_url('back/lienhe/add_support')?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>

        </h2>

    </div>
    <div class="contentbox">

        <br>
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>



            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th ><span id="sapmota"> Tên </span></th>
                <th width="120">Ngày cập nhật</th>
                <th width="120">Yahoo</th>
                <th width="120">Skype</th>
                <th width="120" align="center"> Action </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $row) { ?>
                <tr class="hang">
                    <td style="text-align: center"> <?= $i++ ?></td>
                    <td class="tin" valign=top><?= $row->name ?></td>

                    <td class="tin" style="text-align: center" valign=top><?= date('d-m-Y', strtotime($row->date_create)) ?></td>

                    </td>
                    <td class="tin" valign=top><?= $row->nick ?></td>
                    <td class="tin" valign=top><?= $row->skype ?></td>

                    <td style="text-align: center" class="action">
                        <a href="<?= site_url('back/lienhe/edit_support' . '/' . $row->id) ?>">Chỉnh</a>

                            |  <a href="<?=  base_url('back/lienhe/delete_support' . '/' . $row->id)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> |
                            <img src="AnHien_<?= $row->status ?>.png" width="15" height="15" title="" class="anhien" id="<?= $row->id ?>" />

                    </td>
                </tr>
            <?php } ?>
        </table>

    </div></div>