<script type="text/javascript">
$(document).ready(function() { 
	$("img.anhien").click(function(){ 
		idLT=$(this).attr("id");
		obj = this;fr='news';wh='id';
		$.ajax({ 
		   url:'<?=site_url()?>'+'back/tinban/anhien12/'+idLT+'/'+fr+'/'+wh, 			 
		   cache: false, 
		   success: function(data){ 	 
			obj.src = data; 
			if (data=="AnHien_1.png") obj.title="Đang hiện";
			else obj.title="Đang ẩn";
		  }
		});
	});	
});
</script>
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Danh sách tin bán<a class="add" href="<?= base_url('tinban/addtin') ?>"><img src="<?= base_url('theme/img/add.png') ?>" width="25" height="25" style="vertical-align:middle; border:0px" /> Thêm Mới</a>
        </h2>       
    </div>
    <div class="contentbox">
        <br> 
        <table id=dstin  border=1 cellpadding=1  cellspacing=0  width="100%"  align=center>
            <tr>
                <th width="50" style="text-align:center"><span id="sapid"> id</span></th>
                <th > Tiêu Đề </span></th>   
                <th width="150">Ngày cập nhật</th>
                <th width="120" align="center"> Action </th>
            </tr>
         
            <tr class="hang">
                    <td style="text-align:center" valign="top"></td>
                    <td class="tin" valign=top><?=$list->name?></td>
                    <td class="tin" valign=top>
                        
                    </td>    
                    
                    </td>
                    <td align="center" class="action">
                        <a href="">Chỉnh</a> 
                       
                    </td>
                </tr>
            
        </table>
        <p style="float:right; margin-right:10px; margin-top:8px" id="thanhphantrang"></p> 
    </div></div>