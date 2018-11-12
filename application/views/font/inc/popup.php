<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>theme/js/fancybox/fancybox/jquery.fancybox-1.3.4.css" type="text/css" />
<script type='text/javascript' src='<?php echo base_url() ?>theme/js/fancybox/fancybox/jquery.fancybox-1.3.4.js'></script>
<link rel="stylesheet" href="<?php echo base_url() ?>theme/css/default.css" type="text/css" />
<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            onClose: function(selectedDate) {

            }
        });
    });
</script>

<div style="display: none;">
    <div class="emailWrap_popup"  id="inline1">
        <div class="title"><?=$l->lang_login[$lang]?></div>

        <div style="clear: both"></div>
        <div class="thongtin_lienhe">
            <form method="post" action="" name="f_login" id="f_login">
                <table  >

                    <tr>
                        <td  class="lable"><?=$l->lang_user[$lang]?></td>

                        <td>
                            <input type="text" name="email" id="code" class="input_dk" value=""  />

                        </td>
                    </tr>

                    <tr>
                        <td class="lable"> <?=$l->lang_mk[$lang]?>: </td>
                        <td>
                            <input type="password" name="password" id="password" class="input_dk" />
                        </td>
                    </tr>


                    <tr>
                        <td></td>

                        <td>

                            <span style="display: none"><input type="submit" id="submit-login-one" name="ok"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>

                        <td>
                            <?php if($this->uri->segment(1)=='en') { ?>
                                <span class="btn right"  id="btn-login"><img  src="theme/images/dang_nhap_2.png" alt="dang_nhap.png"/></span>
                            <?php }else{ ?>
                                <span class="btn right"  id="btn-login"><img  src="theme/images/dang_nhap.png" alt="dang_nhap.png"/></span>
                            <?php }?>



                        </td>
                    </tr>

                </table>

            </form>
        </div>


    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#datepicker").datepicker();
    })
</script>
<?php
if($this->uri->segment(1)=='en'){$hr = site_url('en/local-news');}else{ $hr = site_url('vn/tin-noi-bo');};

?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tk").fancybox({
            'width': '100%',
            'height': '43%',
            'titlePosition': 'inside',
            'transitionIn': 'none',
            'transitionOut': 'none'
        });
        $("#btn-login").click(function() {
            var code = $("#code").val();
            var pass = $("#password").val();
            if (code == '') {
                alert("Tài khoản đăng nhập không chính xác");
                $("#code").addClass("error");
                return false;
            } else {
                $("#code").removeClass("error");
            }
            if (pass == '') {
                alert("Mật khẩu không chính xác");
                $("#password").addClass("error");
                return false;
            } else {
                $("#password").removeClass("error");
            }
            $.post("login-ajax", {email: code, password: pass}, function(data) {
                if (data == "1")
                {
                    alert("Bạn đã đăng nhập thành công !");
                    window.location.href = "<?= $hr ?>";
                } else {
                    alert("Thông tin đăng nhập không chính xác hoặc Tài khoản của bạn chưa đuợc kích hoạt");
                }
            })
        });
        function chk_val(val) {
            var chk = /^\d+$/.test(val);

            if (!chk) {
                return false;
            }
        }
        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }
    })
</script>

