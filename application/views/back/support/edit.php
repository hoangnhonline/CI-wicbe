<?php
$CI = &get_instance();
$CI->load->model('M_user')

?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới hỗ trợ</h2>
        </div>
        <div class="contentbox">

            <!-- -------------------Theo ngon ngu------------------------------- -->


            <p class="div_lang" >
                <label for="textfield"><strong>Tên hỗ trợ :</strong></label>
                <input name="name" value="<?=$row->name?>" type="text" id="textfield" class="inputbox">

            </p>
            <p class="div_lang" >
                <label for="textfield"><strong>Phone</strong></label>
                <input name="phone" value="<?=$row->phone?>" type="text" id="textfield" class="inputbox">

            </p>
            <p class="div_lang" >
                <label for="textfield"><strong>Yahoo</strong></label>
                <input name="yahoo" value="<?=$row->nick?>" type="text" id="textfield" class="inputbox">

            </p>
            <p class="div_lang" >
                <label for="textfield"><strong>Skype</strong></label>
                <input name="skype" value="<?=$row->skype?>" type="text" id="textfield" class="inputbox">

            </p>

            <p style="display: none">
            <label for="smallbox"><strong>phòng support: </strong></label>
            <input type="radio" value="1" name="support" <?php if($row->type==1) { ?> checked <?php } ?> >kinh doanh
            <input type="radio" value="0" name="support" <?php if($row->type==0) { ?> checked <?php } ?>>kỹ thuật
            </p>

            <label for="smallbox"><strong>Trạng thái: </strong></label>
            <input type="radio" value="1" name="status" <?php if($row->status==1) { ?> checked <?php } ?>>Hiển thị
            <input type="radio" value="0" name="status" <?php if($row->status==0) { ?> checked <?php } ?>>Ẩn
            </p>
            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>

    </div>



</form>

<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->


