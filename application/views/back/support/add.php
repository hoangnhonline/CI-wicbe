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
                <label for="textfield"><strong>Tiêu Đề</strong></label>
                <input name="name" value="" type="text" id="textfield" class="inputbox">

            </p>
            <p class="div_lang" >
                <label for="textfield"><strong>Phone</strong></label>
                <input name="phone" value="" type="text" id="textfield" class="inputbox">

            </p>
            <p class="div_lang" >
                <label for="textfield"><strong>Yahoo</strong></label>
                <input name="yahoo" value="" type="text" id="textfield" class="inputbox">

            </p>
            <p class="div_lang" >
                <label for="textfield"><strong>Skype</strong></label>
                <input name="skype" value="" type="text" id="textfield" class="inputbox">

            <p style="display: none">
            <label for="smallbox"><strong>phòng support: </strong></label>
            <input type="radio" value="1" name="support" checked>kinh doanh
            <input type="radio" value="0" name="support">kỹ thuật
            </p>

            <p>
            <label for="smallbox"><strong>Trạng thái: </strong></label>
            <input type="radio" value="1" name="status" checked>Hiển thị
            <input type="radio" value="0" name="status">Ẩn
            </p>
            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>

    </div>



</form>

<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->

