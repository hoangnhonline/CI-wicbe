<script>
    function goBack() {
        window.history.back()
    }
</script>

<?php $i=1;  ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới user</h2>
        </div>
        <div class="contentbox">

            <!-- -------------------Theo ngon ngu------------------------------- -->
            <p>
                <label for="textfield"><strong>Họ và Tên</strong></label>
                <input name="name" value="<?= $row->user_name ?>" type="text" id="textfield" class="inputbox">
                <?php echo form_error('name') ?>
            </p>
            <p>
                <label for="textfield"><strong>Tên đăng nhập(viết liền không dấu và không có ký tự đặc biệt) </strong></label>
                <input name="username" value="<?= $row->user_loginname ?>" type="text" id="textfield" class="inputbox">
                <?php echo form_error('username') ?>
            </p>

            <p>
                <label for="textfield"><strong>Email </strong></label>
                <input name="email" value="<?= $row->user_note ?>" type="text" id="textfield" class="inputbox">

            </p>

            <p>
                <label for="textfield"><strong>Số điện thoại </strong></label>
                <input name="phone" value="<?= $row->phone ?>" type="text" id="textfield" class="inputbox">

            </p>

            <p>
                <label for="textfield"><strong>Mật khẩu : </strong></label>
                <input name="pass" value="" type="password" id="textfield" class="inputbox">

            </p>

            <div style="clear:both"></div>

            <input type="button" class="btn check_cat" onclick="goBack()" value="Trở Về" name="ok" />
            <input type="submit" class="btn check_cat" value="Thêm mới" name="ok" />
        </div>

    </div>

    <div class="contentcontainer sml right">
        <div class="headings altheading">
            <h2 class="left">Phân quyền
            </h2>
        </div>
        <div class="contentbox">


              <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Thông tin website: </strong></label>
                <input type="radio" value="1" name="web"  <?php if($edit->web==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="web"  <?php if($edit->web==0) {?> checked="checked" <?php }?>>None
              </p>

            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Thông tin - footer: </strong></label>
                <input type="radio" value="1" name="thongtin"  <?php if($edit->thongtin==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="thongtin"  <?php if($edit->thongtin==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Hướng dẫn - footer: </strong></label>
                <input type="radio" value="1" name="huongdan"  <?php if($edit->huongdan==1) {?> checked="checked" <?php }?> >Active
                <input type="radio" value="0" name="huongdan"  <?php if($edit->huongdan==0) {?> checked="checked" <?php }?>>None
            </p>



            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh sách banner: </strong></label>
                <input type="radio" value="1" name="banner"  <?php if($edit->banner==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="banner"  <?php if($edit->banner==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Banner quảng cáo : </strong></label>
                <input type="radio" value="1" name="quangcao"  <?php if($edit->quangcao==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="quangcao"  <?php if($edit->quangcao==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Kích thước size : </strong></label>
                <input type="radio" value="1" name="size"  <?php if($edit->size==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="size"  <?php if($edit->size==0) {?> checked="checked" <?php }?>>None
            </p>



            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Màu sắc : </strong></label>
                <input type="radio" value="1" name="color"  <?php if($edit->color==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="color"  <?php if($edit->color==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Bộ sưu tập : </strong></label>
                <input type="radio" value="1" name="suutap"  <?php if($edit->suutap==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="suutap"  <?php if($edit->suutap==0) {?> checked="checked" <?php }?>>None
            </p>

            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh mục sản phẩm : </strong></label>
                <input type="radio" value="1" name="cate"  <?php if($edit->cate==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="cate"  <?php if($edit->cate==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Sản phẩm : </strong></label>
                <input type="radio" value="1" name="sanpham"  <?php if($edit->sanpham==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="sanpham"  <?php if($edit->sanpham==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Bình luận sản phẩm : </strong></label>
                <input type="radio" value="1" name="comment_1"  <?php if($edit->comment_1==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="comment_1"  <?php if($edit->comment_1==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Bình luận tin tức : </strong></label>
                <input type="radio" value="1" name="comment_2"  <?php if($edit->comment_2==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="comment_2"  <?php if($edit->comment_2==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Góc thời trang : </strong></label>
                <input type="radio" value="1" name="thoitrang"  <?php if($edit->thoitrang==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="thoitrang"  <?php if($edit->thoitrang==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Tài khoản ngân hàng : </strong></label>
                <input type="radio" value="1" name="nganhang"  <?php if($edit->nganhang==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="nganhang"  <?php if($edit->nganhang==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh sách thành viên : </strong></label>
                <input type="radio" value="1" name="user" <?php if($edit->user==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="user"  <?php if($edit->user==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Đơn hàng : </strong></label>
                <input type="radio" value="1" name="donhang"  <?php if($edit->donhang==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="donhang"  <?php if($edit->donhang==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Liên hệ : </strong></label>
                <input type="radio" value="1" name="lienhe"  <?php if($edit->lienhe==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="lienhe" <?php if($edit->lienhe==0) {?> checked="checked" <?php }?>>None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh sách hệ thống : </strong></label>
                <input type="radio" value="1" name="hethong"  <?php if($edit->hethong==1) {?> checked="checked" <?php }?>>Active
                <input type="radio" value="0" name="hethong"  <?php if($edit->hethong==0) {?> checked="checked" <?php }?>>None
            </p>



        </div></div>

</form>

<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->

