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
            <p class="">
                <label for="textfield"><strong>Tiêu đề </strong></label>
                <input name="name" value="<?=$row->name?>" type="text" id="textfield" class="inputbox">

            </p>


            <p class="">
                <label for="textfield"><strong>Link </strong></label>
                <input name="link" value="<?=$row->link?>" type="text" id="textfield" class="inputbox">
            </p>
             
            <p class="danhmuc_admin" style="<?php if($type==4){?>display: none<?php } ?> ">
                <img src="<?=$row->img?>" width="90"/>
                <input name="img" type="file"> 
            </p>
            <p>
                <label for="textfield"><strong>Thứ tự</strong></label>
                <input name="weight" value="<?=$row->weight?>" type="text" id="textfield" class="inputbox weight">

            </p>
            <p>
                <label for="smallbox"><strong>Nổi bật : </strong></label>
                <input type="radio" value="1" name="hot" <?php if($row->hot==1){ ?> checked="checked" <?php } ?>>Có
                <input type="radio" value="0" name="hot" <?php if($row->hot==0){ ?> checked="checked" <?php } ?>>Không
            </p>
            <p>
                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" <?php if($row->status==1){ ?> checked="checked" <?php } ?>>Hiển thị
                <input type="radio" value="0" name="status" <?php if($row->status==0){ ?> checked="checked" <?php } ?>>Ẩn 
            </p>
            
          

            <input type="submit" class="btn check_cat" value="Cập nhật" name="ok" />
        </div>   

    </div>



</form>
<style>
.nga{display: none !important;}
</style>


