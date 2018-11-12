<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'category';
            wh = 'id';
            $.ajax({
                url: '<?= site_url() ?>' + 'back/category/anhien12/' + idLT + '/' + fr + '/' + wh,
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
        <h2>Danh mục

            <a class="add" href="<?= site_url('back/category/add/' . $type) ?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>

        </h2>
    </div>
    <div class="contentbox">
        <br> 
        <table id="dstin"  border="1" cellpadding="1"  cellspacing="0"  width="100%"  align=center>

            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="300">Tên Danh Mục</th>
                <th width="40">Nổi bật</th>
                <th width="40">Thứ tự</th>
                <th width="100" style="text-align: center" >  Action </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($listdm as $dmc) { ?>

                <tr class="hang">
                    <td class="tin" valign="top" style="text-align: center" ><?= $i++; ?></td>
                    <td class="tin" valign=top  style="color: #f00;font-weight: bold"><?= $dmc->name ?></td>
                    <td align="center" class="action" style="text-align: center">
                    <?php if ($dmc->hot == 1) { ?>
                        <a href="back/category/hide_hot/<?=$type?>/<?php echo $dmc->id ?>" title="Hiện"><img width="15" height="15" src="noibat_1.png" alt="Hiển Thị" /></a>
                    <?php } else { ?>
                        <a href="back/category/show_hot/<?=$type?>/<?php echo $dmc->id ?>" title="Ẩn"><img width="15" height="15" src="noibat_0.png" alt="Ẩn" /></a>
                    <?php } ?>
                    </td>
                    <td class="tin" valign=top style="text-align: center"><?= $dmc->weight ?></td>
                    <td align="center" style="text-align: center" class="action">

                        <a href="<?= site_url('back/category/edit/' . $type . '/' . $dmc->id) ?>">Chỉnh</a>

                        | <a href="<?= site_url('back/category/delete/' . $type . '/' . $dmc->id) ?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> |
                            <?php if ($dmc->status == 1) { ?>
                                <a href="back/category/hide/<?=$type?>/<?php echo $dmc->id ?>" title="Hiện"><img width="15" height="15" src="AnHien_1.png" alt="Hiển Thị" /></a>
                            <?php } else { ?>
                                <a href="back/category/show/<?=$type?>/<?php echo $dmc->id ?>" title="Ẩn"><img width="15" height="15" src="AnHien_0.png" alt="Ẩn" /></a>
                            <?php } ?>

                    </td>
                </tr>
                <?php foreach ($this->M_category->list_category_chill($dmc->id) as $dmcon) { ?>
                    <tr class="hang">
                        <td class="tin" valign="top" style="text-align: center"><?= $i++; ?></td>
                        <td class="tin" valign=top>|— —<?= $dmcon->name ?></td>
                        <td class="tin" valign=top style="text-align: center">
                            <img src="noibat_<?=$dmcon->hot?>.png" width="15" height="15" title="" class="noibat" id="<?=$dmcon->id?>" />
                        </td>
                        <td class="tin" valign=top style="text-align: center"><?= $dmcon->weight ?></td>
                        <td align="center" class="action" style="text-align: center">
                            <a href="<?= site_url('back/category/edit/' . $type . '/' . $dmcon->id) ?>">Chỉnh</a>
                            | <a href="<?= site_url('back/category/delete/' . $type . '/' . $dmcon->id) ?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> |
                                <?php if ($dmcon->status == 1) { ?>
                                    <a href="back/category/hide/<?=$type?>/<?php echo $dmcon->id ?>" title="Hiện"><img width="15" height="15" src="AnHien_1.png" alt="Hiển Thị" /></a>
                                <?php } else { ?>
                                    <a href="back/category/show/<?=$type?>/<?php echo $dmcon->id ?>" title="Ẩn"><img width="15" height="15" src="AnHien_0.png" alt="Ẩn" /></a>
                                <?php } ?>
                        </td>
                    </tr>
                <?php } ?>            
            <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"></p> 
    </div></div>