<script>
    function goBack() {
        window.history.back()
    }
</script>

<div class="contentcontainer">
    <div class="headings altheading">
        <h2>Cập nhật mật khẩu</h2>
    </div>
    <div class="contentbox">
        <br />
        <div align="center" id="loi">

        </div>
        <form action="" method="post" name="formdoipass" id="formdoipass">
            <table align="center" width="400" cellpadding="4" cellspacing="0" border="1" id="tbldoipass">
                <tr> <th colspan="2" style="text-align:center " > ĐỔI MẬT KHẨU</th> </tr>
                <tr> <td>Username</td>	<td><?php echo $this->M_session->userdata('admin_login')->user_name; ?></td> </tr>
                <?php if (isset($a)) echo $a; ?>
                <tr> <td>Mật khẩu cũ</td>
                    <td><input type="password" name="pass_old" id="pass_old" /> </td><?php echo form_error('pass_old') ?>
                </tr>
                <tr> <td>Mật khẩu mới</td>
                    <td><input type="password" name="pass_new1" id="pass_new1" /> </td><?php echo form_error('pass_new1') ?>
                </tr>
                <tr> <td>Nhập lại mật khẩu mới</td>
                    <td><input type="password" name="pass_new2" id="pass_new2" /> </td><?php echo form_error('pass_new2') ?>
                </tr>
                <tr> <td colspan="2"  style="text-align:center ">
                        <input type="button" name="btnHuy" id="btnHuy" onclick="goBack()" value=" Quay Lại "/>
                        <input type="submit" name="btnOK" id="btnCapNhat" value="Cập nhật"/>
                    </td>
                </tr>

            </table>
        </form>  
    </div></div>