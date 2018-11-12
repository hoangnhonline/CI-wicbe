<script>
    function goBack() {
        window.history.back()
    }
</script>
<form action="" method="post" enctype="multipart/form-data">
    <div class="contentcontainer med left">
        <div class="headings altheading">
            <h2>Thêm mới user</h2>
        </div>
        <div class="contentbox">

            <!-- -------------------Theo ngon ngu------------------------------- -->
            <p>
                <label for="textfield"><strong>Họ và Tên</strong></label>
                <input name="name" value="<?=$this->input->post('name')?>" type="text" id="textfield" class="inputbox">
                <?php echo form_error('name') ?>
            </p>


            <p>
                <label for="textfield"><strong>Tên đăng nhập (viết liền không dấu và không có ký tự đặc biệt)</strong></label>
                <input name="username" value="<?=$this->input->post('user')?>" type="text" id="textfield" class="inputbox">
                    <?php echo form_error('user') ?>
            </p>

            <p>
                <label for="textfield"><strong>Email </strong></label>
                <input name="email" value="<?=$this->input->post('email')?>" type="text" id="textfield" class="inputbox">
                <?php echo form_error('email') ?>
            </p>

            <p>
                <label for="textfield"><strong>Số điện thoại </strong></label>
                <input name="phone" value="<?=$this->input->post('mobile')?>" type="text" id="textfield" class="inputbox">
                <?php echo form_error('phone') ?>
            </p>
            <p>
                <label for="textfield"><strong>Mật khẩu </strong></label>
                <input name="password" value="" type="text" id="textfield" class="inputbox">
                <?php echo form_error('password') ?>
            </p>
            <p>
                <label for="textfield"><strong>Nhập lại mật khẩu </strong></label>
                <input name="newpass" value="" type="text" id="textfield" class="inputbox">
                <?php echo form_error('newpass') ?>
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
                <input type="radio" value="1" name="web" >Active
                <input type="radio" value="0" name="web" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Thông tin - footer: </strong></label>
                <input type="radio" value="1" name="thongtin" >Active
                <input type="radio" value="0" name="thongtin" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Hướng dẫn - footer: </strong></label>
                <input type="radio" value="1" name="huongdan" >Active
                <input type="radio" value="0" name="huongdan" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh sách banner: </strong></label>
                <input type="radio" value="1" name="banner" >Active
                <input type="radio" value="0" name="banner" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Banner quảng cáo : </strong></label>
                <input type="radio" value="1" name="quangcao" >Active
                <input type="radio" value="0" name="quangcao" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Kích thước size : </strong></label>
                <input type="radio" value="1" name="size" >Active
                <input type="radio" value="0" name="size" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Màu sắc : </strong></label>
                <input type="radio" value="1" name="color" >Active
                <input type="radio" value="0" name="color" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Bộ sưu tập : </strong></label>
                <input type="radio" value="1" name="suutap" >Active
                <input type="radio" value="0" name="suutap" checked="checked">None
            </p>

            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh mục sản phẩm : </strong></label>
                <input type="radio" value="1" name="cate" >Active
                <input type="radio" value="0" name="cate" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Sản phẩm : </strong></label>
                <input type="radio" value="1" name="sanpham" >Active
                <input type="radio" value="0" name="sanpham" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Bình luận sản phẩm : </strong></label>
                <input type="radio" value="1" name="comment_1" >Active
                <input type="radio" value="0" name="comment_1" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Bình luận tin tức : </strong></label>
                <input type="radio" value="1" name="comment_2" >Active
                <input type="radio" value="0" name="comment_2" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Góc thời trang : </strong></label>
                <input type="radio" value="1" name="thoitrang" >Active
                <input type="radio" value="0" name="thoitrang" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Tài khoản ngân hàng : </strong></label>
                <input type="radio" value="1" name="nganhang" >Active
                <input type="radio" value="0" name="nganhang" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh sách thành viên : </strong></label>
                <input type="radio" value="1" name="user" >Active
                <input type="radio" value="0" name="user" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Đơn hàng : </strong></label>
                <input type="radio" value="1" name="donhang" >Active
                <input type="radio" value="0" name="donhang" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Liên hệ : </strong></label>
                <input type="radio" value="1" name="lienhe" >Active
                <input type="radio" value="0" name="lienhe" checked="checked">None
            </p>
            <p style="float: left;width: 50%">
                <label for="smallbox"><strong>Danh sách hệ thống : </strong></label>
                <input type="radio" value="1" name="hethong" >Active
                <input type="radio" value="0" name="hethong" checked="checked">None
            </p>
        </div></div>

</form>

<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
            
          