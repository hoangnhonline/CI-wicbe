

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
        <h2>Danh sách tin
            <a class="add" href="<?= site_url('back/news/add'.'/'.$type)?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>
    </div>
    <div class="contentbox">
        <br> 
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>

            <tr>
                <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/news/index/'.$this->uri->segment(4))?>" >
                        <input type="text" id="MoTa" name="name" placeholder=" Nhập tiêu đề cần tìm" value="" style="width:300px; height:22px; vertical-align:middle" />
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>

            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th ><span id="sapmota"> Tiêu Đề </span></th>
                <th width="100">Hình đại diện</th>
                <th width="50">View</th>
                <th width="120">Thời gian</th>
                <th width="150" align="center"> Action </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $row) { ?>
                <tr class="hang">
                    <td style="text-align: center"> <?= $i++ ?></td>
                    <td class="tin" valign=top><?= $row->name ?></td>
                    <td class="tin" valign=top style="text-align: center" >
                        <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$row->img ?>&w=100&h=70&zc=1">

                    </td>
                    <td class="tin" style="text-align: center" valign=top><a href="<?= site_url($row->link)?>" target="_blank">View</a> </td>
                    <td class="tin" style="text-align: center" valign=top><?= date('d-m-Y', $row->time) ?></td>
                    <td style="text-align: center" class="action">
                        <a href="<?= site_url('back/news/edit/'.$type . '/' . $row->id) ?>">Chỉnh</a>

                      |  <a href="<?=  base_url('back/news/delete/'.$type . '/' . $row->id)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> |

                        <?php if ($row->status == 1) { ?>
                            <a href="back/news/hide/<?=$type?>/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Hiện"><img width="15" height="15" src="AnHien_1.png" alt="Approve" /></a>
                        <?php } else { ?>
                            <a href="back/news/show/<?=$type?>/<?php echo $row->id ?>/<?php echo $page_no ?>" title="Ẩn"><img width="15" height="15" src="AnHien_0.png" alt="Unapprove" /></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?> 
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p> 
    </div></div>