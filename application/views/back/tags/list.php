

<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Danh sách tags

            <a class="add" href="<?= site_url('back/tags/add')?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>

        </h2>
    </div>
    <div class="contentbox">
      
        <br> 
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>
            <tr>
                <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/tags/index')?>" >
                        <input type="text" id="MoTa" name="tieude" placeholder=" Nhập tên tags" value="" style="width:300px; height:22px; vertical-align:middle" />
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>
            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th><span id="sapmota"> Tiêu Đề </span></th>
                <th width="50">View</th>
                <th width="120">Thời gian</th>
                <th width="80" style="text-align: center">Thứ tự</th>
                <th width="120" align="center"> Action </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $row) { ?>
                <tr class="hang">
                    <td style="text-align: center"> <?= $i++ ?></td>
                    <td class="tin" valign=top><?= $row->name ?></td>
                    <td class="tin" valign=top><a target="_blank" href="<?=site_url('tags/'.$row->link)?>">view</a> </td>
                    <td class="tin" style="text-align: center" valign=top><?= date('d-m-Y', $row->time) ?></td>
                    <td class="tin" valign=top style="text-align: center"><?= $row->weight ?></td>
                    <td style="text-align: center" class="action">
                        <a href="<?= site_url('back/tags/edit/'. $row->id) ?>">Chỉnh</a>
                      |  <a href="<?=  base_url('back/tags/delete/'. $row->id)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> |
                            <?php if ($row->status == 1) { ?>
                                <a href="back/tags/hide/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Hiện"><img width="15" height="15" src="AnHien_1.png" alt="Approve" /></a>
                            <?php } else { ?>
                                <a href="back/tags/show/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Ẩn"><img width="15" height="15" src="AnHien_0.png" alt="Unapprove" /></a>
                            <?php } ?>
                    </td>
                </tr>
            <?php } ?> 
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p> 
    </div></div>