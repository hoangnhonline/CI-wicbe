
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Email letter</h2>
    </div>
    <div class="contentbox">
        <br>
        <table id="dstin" border="1" cellpadding="1" cellspacing="0" width="100%" align=center>
            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th width="200" style="text-align:center">Email</th>
                <th width="200" style="text-align:center">Thời gian</th>
                <th width="12" style="text-align: center">Action</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $e) { ?>
                <tr class="hang" style="background: #f5f5f5">
                    <td class="tin" style="text-align:center"><?= $i++; ?></td>
                    <td class="tin" style="text-align:center"><?= $e->email ?></td>
                    <td class="tin" style="text-align:center"><?= date('d-m-Y',$e->time) ?></td>
                    <td align="center" style="text-align: center" class="action">
                        <a href="<?= site_url('back/email/delete/'. $e->id) ?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p>
    </div></div>