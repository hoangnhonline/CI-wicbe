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
       
        <h2>Danh sách liên hệ
        </h2>   
      
    </div>
    <div class="contentbox">
      
        <br> 
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>
             <tr>
                <td  colspan="8"> <form  id="form2" name="form2" method="get" action="<?=  base_url('back/lienhe/index')?>" >
                        <input type="text" id="MoTa" name="hoten" placeholder="  Nhập họ tên cần tìm" value="" style="width:250px; height:25px; vertical-align:middle" /> 
<input type="text" id="MoTa" name="email" placeholder="  Nhập email cần tìm" value="" style="width:250px; height:25px; vertical-align:middle" /> <input type="text" id="MoTa" name="phone" placeholder="  Nhập số điện thoại cần tìm" value="" style="width:250px; height:25px; vertical-align:middle" /> 

                        
                        <input type="submit" style="margin-left:5px" class="xem" id="sub" value=" Xem " />
                    </form></td>
            </tr>
            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th ><span id="sapmota"> Tiêu Đề </span></th>   
                <th width="250" > Email Liên hệ </span></th>   
                <th width="120">Ngày Liên Hệ</th>
                <th style="text-align:center" width="80">Duyệt Mail</th>
                <th width="120" align="center"> Action </th>
            </tr>
            <?php $i=1; ?>
           <?php foreach ($list as $row){ ?>
                <tr class="hang">
                    <td style="text-align: center"><?=$i++?></td>
                    <td class="tin" valign=top><?=$row->name?></td>
                    <td class="tin" valign=top><?=$row->email?></td>
                    <td class="tin" style="text-align: center" valign=top>
                        <?=date('d-m-Y', strtotime($row->date_reseive))?>
                    </td>    
     <td style="font-weight: bold;text-align:center;color:<?php if($row->status==1){echo'#0052a4';} else {echo '#ee0101';}  ?>" class="tin" valign=top><?php if($row->status==1){echo'Đã Xem';} else {echo 'Chưa Xem';}  ?></td>
                   
                    <td style="text-align: center" class="action">
                        <a href="<?=  base_url('back/lienhe/xemlienhe/'.$row->id)?>">Xem</a>  |
                        
                        <a href="<?=  base_url('back/lienhe/delete/'.$row->id)?>" onclick="return confirm('Có chắc bạn muốn xóa ?');" >Xóa</a> 
                    </td>
                </tr>
           <?php } ?>
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"><?=$link?></p> 
    </div></div>