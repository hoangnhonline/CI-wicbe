<script type="text/javascript">
    $(document).ready(function() {
        $("img.anhien").click(function() {
            idLT = $(this).attr("id");
            obj = this;
            fr = 'item_comment';
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

<?php

$CI = &get_instance();
$CI->load->model('M_artice');
$CI->load->model('M_item');

?>



<div class="contentcontainer">
    <div class="headings altheading">

        <h2>Danh sách bình luận



        </h2>

    </div>
    <div class="contentbox">

        <br>
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>


            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th style="width: 150px"><span id="sapmota"> Tên Binh Luận </span></th>

                <th ><span id="sapmota">Nội dung </span></th>

                <th ><span id="sapmota">Link </span></th>
                <th width="120">Ngày bình luận</th>

                <th width="120" align="center"> Action </th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $row) { ?>
                <tr class="hang">
                    <td style="text-align: center"> <?= $i++ ?></td>
                    <td class="tin" valign=top>  <?=$row->name?></td>


                    <td class="tin" style="text-align: center" valign=top><?=$row->note?></td>


                    <td class="tin" style="text-align: center" valign=top >
                        <?php if($type == 1) {
                        $link1 = $CI->M_item->get_term_dh($row->item_id);
                            if(empty($link1)){$link4="";}else{$link4 =$link1->item_link; };
                            $link_ = 'vn/'.$link4;
                            $name = isset($link1->item_name) ? $link1->item_name : 'Sản phẩm đã xóa';
                        }elseif($type == 2){
                            $link2 = $CI->M_artice->article_link(135,1);
                            if(empty($link2)){$link3="";}else{$link3 =$link2->article_link; };

                          $link_ = 'vn/'.$link3;
                            $name = isset($link2->article_name) ? $link2->article_name : 'Bài viết đã xóa';
                        }else{
                            $link_ = "";
                            $name = "";
                        }


                        ?>
                        <a target="_blank" href="<?=site_url($link_)?>"><?=$name?></a>

                    </td>


                    <td class="tin" valign=top style="text-align: center"><?= date('d-m-Y', strtotime($row->create_date)) ?></td>
                    <td style="text-align: center" class="action">

         <a href="<?=  base_url('back/lienhe/delete_comment/' . $row->id.'/'.$row->type.'/'.$page_no)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> |

                            <img src="AnHien_<?= $row->status ?>.png" width="15" height="15" title="" class="anhien" id="<?= $row->id ?>" />

                    </td>
                </tr>
            <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p>
    </div></div>