<script>
    function goBack() {
    window.history.back()
}
$(document).ready(function(){
    $('#formNewsDetail').submit(function(){
        if($('.check').val()==''){alert ('Chưa nhập hình'); return false;}
        
    });
    });
    
</script>

<style>
   // .danhmuc_admin{margin-left: 473px;margin-top:52px}
    .danhmuc_admin1{margin-top: -79px;margin-left: 43px;}
    .danhmuc_admin2{margin-left: 43px;}
    .weight{width: 100px}
</style>

<form action="" method="post" enctype="multipart/form-data" id="formNewsDetail">
      <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2><?php if($type ==1){echo 'Thêm Banner';}elseif($type==2){echo 'Thêm hoạt động của shop';}elseif($type==3){echo 'Thêm phản hồi khách hàng';}else{echo 'Thêm video';} ?></h2>
        </div>
        <div class="contentbox">   

            <!-- -------------------Theo ngon ngu------------------------------- -->
                  <p >
                      <label for="textfield"><strong>Tiêu đề<img  src=""/></strong></label>

                      <input name="name" value="" type="text" id="textfield" class="inputbox">
                  </p>


            <p class="">
                <label for="textfield"><strong>Link <img  src=""/></strong></label>
                <input name="link" value="" type="text" id="textfield" class="inputbox">
            </p>

            <p class="danhmuc_admin" style="<?php if($type==4){?>display: none<?php } ?> ">

                <input name="img" type="file"> 
            </p>
            <p class="danhmuc_admin">
                <label for="textfield"><strong>Thứ tự</strong></label>
                <input name="weight" value="<?php $this->input->post('weight')?>" type="text" id="textfield" class="inputbox weight">

            </p>
            <p>
                <label for="smallbox"><strong>Nổi bât:</strong></label>
                <input type="radio" value="1" name="hot" checked>Hiển thị
                <input type="radio" value="0" name="hot">Ẩn
            </p>
            <p>
                <label for="smallbox"><strong>Trạng thái:</strong></label>
                <input type="radio" value="1" name="status" checked>Hiển thị
                <input type="radio" value="0" name="status">Ẩn 
            </p>
            
            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>   

    </div>

</form>
<style>
    .nga{display: none !important;}
</style>



