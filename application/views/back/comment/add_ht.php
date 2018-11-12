<?php
$CI = &get_instance();
$CI->load->model('M_user')

?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới hệ thống</h2>
        </div>
        <div class="contentbox">
            <p  style="float: right">
                <?php $this->load->view("back/inc/menu_lang") ?>
            </p>
            <!-- -------------------Theo ngon ngu------------------------------- -->
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>

            <p class="div_lang <?php echo $lang->name ?>" >
                <label for="textfield"><strong>Tên hệ thống <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                <input name="name_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox">
                <?php echo form_error('name_' . $lang->name); ?>
            </p>

                <p class="div_lang <?php echo $lang->name ?> " >
                    <label for="textfield"><strong>Address <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="address_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox">
                </p>
            <p class="div_lang <?php echo $lang->name ?> " >
                <label for="textfield"><strong>Email <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                <input name="email_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox">
            </p>
                <p class="div_lang <?php echo $lang->name ?> " >
                    <label for="textfield"><strong>Phone <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="fax_<?php echo $lang->name ?>" value="" type="text" id="textfield" class="inputbox">
                </p>
            <?php } ?>



            <p>
                <label for="textfield"><strong>Thứ tự</strong></label>
                <input name="weight" value="" type="text" id="textfield" class="inputbox">
            </p>
            <p>


                <label for="smallbox"><strong>Khu vực : </strong></label>
                <input type="radio" value="1" name="khuvuc" checked>Hà Nội
                <input type="radio" value="0" name="khuvuc">Hồ Chí Minh
            </p>
            <p>


                <label for="smallbox"><strong>Trạng thái: </strong></label>
                <input type="radio" value="1" name="status" checked>Hiển thị
                <input type="radio" value="0" name="status">Ấn
            </p>
            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>

    </div>



</form>
<style>
    .nga{display: none !important;}
</style>
