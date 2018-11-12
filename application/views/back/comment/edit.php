<?php
$CI = &get_instance();
$CI->load->model('M_user');
$CI->load->model('M_lienhe');
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Sữa hệ thống</h2>
        </div>
        <div class="contentbox">
            <p  style="float: right">
                <?php $this->load->view("back/inc/menu_lang") ?>
            </p>
            <!-- -------------------Theo ngon ngu------------------------------- -->
            <?php foreach ($this->M_artice->show_list_lang() as $lang) { ?>

                <?php $edit = $CI->M_lienhe->edit_hethong(array('hethong.id'=>$id,'country.name'=>$lang->name))?>



                <p class="div_lang <?php echo $lang->name ?>" >
                    <label for="textfield"><strong>Tên hệ thống <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="name_<?php echo $lang->name ?>" value="<?=$edit->name?>" type="text" id="textfield" class="inputbox">

                </p>

                <p class="div_lang <?php echo $lang->name ?> " >
                    <label for="textfield"><strong>Address <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="address_<?php echo $lang->name ?>" value="<?=$edit->address?>" type="text" id="textfield" class="inputbox">
                </p>
                <p class="div_lang <?php echo $lang->name ?> " >
                    <label for="textfield"><strong>Email <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="email_<?php echo $lang->name ?>" value="<?=$edit->email?>" type="text" id="textfield" class="inputbox">
                </p>
                <p class="div_lang <?php echo $lang->name ?> " >
                    <label for="textfield"><strong>Phone <img  src="<?php echo $lang->name . '.png' ?>"/></strong></label>
                    <input name="fax_<?php echo $lang->name ?>" value="<?=$edit->fax?>" type="text" id="textfield" class="inputbox">
                </p>
            <?php } ?>



            <p>
                <label for="textfield"><strong>Thứ tự</strong></label>
                <input name="weight" value="" type="text" id="textfield" class="inputbox">
            </p>
            <p>


                <label for="smallbox"><strong>Khu v?c : </strong></label>
                <input type="radio" value="1" name="khuvuc" <?php if($edit->type==1) {?> checked="checked" <?php }?>>Hà Nôi
                <input type="radio" value="0" name="khuvuc" <?php if($edit->type==0) {?> checked="checked" <?php }?>>Hồ Chí MInh
            </p>
            <p>


                <label for="smallbox"><strong>Trang thái: </strong></label>
                <input type="radio" value="1" name="status" <?php if($edit->status==1) {?> checked="checked" <?php }?>>Hiển thị
                <input type="radio" value="0" name="status" <?php if($edit->status==0) {?> checked="checked" <?php }?>>Ẩn
            </p>
            <input type="submit" class="btn check_cat" value="Cập nhật" name="ok" />
        </div>

    </div>



</form>
<style>
    .nga{display: none !important;}
</style>
