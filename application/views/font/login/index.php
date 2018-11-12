



<div id="content_product">
    <div class="content_product">

        <div class="left_login">
            <span class="text_status_login"><?=$l->lang_text_dk[$lang]?></span>
        <form id="sing_up">

            <table class="table_login">
                <tbody>
                <tr>
                    <td class="name_login">
                        <?=$l->lang_name_login[$lang]?> :
                    </td>
                    <td>
                        <input id="name_login" class="input_login">
                    </td>
                </tr>
                <tr>
                    <td class="name_login">
                        <?=$l->lang_address_login[$lang]?> :
                    </td>
                    <td>
                        <input id="address_login" class="input_login">
                    </td>
                </tr>
                <tr>
                    <td class="name_login">
                      Email :
                    </td>
                    <td>
                        <input id="email_login" class="input_login">
                    </td>
                </tr>
                <tr>
                    <td class="name_login">
                       Phone :
                    </td>
                    <td>
                        <input id="phone_login" class="input_login">
                    </td>
                </tr>
                <tr>
                    <td class="name_login">
                        Password :
                    </td>
                    <td>
                        <input id="password_login" class="input_login">
                    </td>
                </tr>
                <tr>
                    <td class="name_login">
                        <?=$l->lang_pass[$lang]?> :
                    </td>
                    <td>
                        <input id="re_password_login" class="input_login">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="display: inline-block;text-align: center">
                        <input type="reset" class="text_name_reset" name="" value="<?= $l->lang_reset[$lang] ?>">
                        <input type="button" name="" id="btn-dang-ky_login" value="<?= $l->lang_gui[$lang] ?>">

                    </td>
                </tr>
                </tbody>
            </table>
        </form>


        </div>
        <div class="right_login">
            <span class="text_status_login"><?=$l->lang_dangnhap[$lang]?></span>
                  <table class="table_login">
                    <tbody>
                    <tr>
                        <td class="name_login">
                           Email :
                        </td>
                        <td>
                            <input id="name_login" class="input_login">
                        </td>
                    </tr>
                    <tr>
                        <td class="name_login">
                           Password
                        </td>
                        <td>
                            <input id="address_login" class="input_login">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="display: inline-block;text-align: center">
                            <input type="reset" class="text_name_reset" name="" value="<?= $l->lang_reset[$lang] ?>">
                            <input type="button" name="" id="btn-dang-ky_login" value="<?= $l->lang_gui[$lang] ?>">

                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>

        </div>
        </div></div>



<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-dang-ky_login").click(function () {
            var name = $("#name_login").val();
            var address = $("#address_login").val();
            var email = $("#email_login").val();
            var phone = $("#phone_login").val();
            var pass_1 = $("#password_login").val();
            var pass_2 = $("#re_password_login").val();
            var form = $("#sing_up").serialize();
            if (name == '') {
                alert("<?= $l->lang_ht[$lang] ?>");
                $("#name_login").addClass("error");
                return false;
            } else {
                $("#name_login").removeClass("error");
            }

            if (address == '') {
                alert("<?= $l->lang_dc[$lang] ?>");
                $("#address_login").addClass("error");
                return false;
            } else {
                $("#address_login").removeClass("error");

            }
            if (email == '' || IsEmail(email) == false) {
                alert("<?= $l->lang_email_dh[$lang] ?>");
                $("#email_login").addClass("error");
                return false;
            } else {
                $("#email_login").removeClass("error");
            }
            if (phone == '' || chk_val(phone) == false) {
                alert("<?= $l->lang_p[$lang] ?>");
                $("#phone_login").addClass("error");
                return false;
            } else {
                $("#phone_login").removeClass("error");

            }

            if (pass_1 != pass_2 && pass_1 =='' ) {
                alert("<?= $l->lang_pas_enter[$lang] ?>");
                $("#password_login").addClass("error");
                return false;
            } else {
                $("#password_login").removeClass("error");

            }
            $.ajax({
                type: "POST",
                url: "dat-hang",
                data: form,
                success: function (msg) {
                    if (msg == 1) {

                        alert("<?= $l->lang_tc[$lang] ?>");
                        window.location.reload();
                    } else {
                        alert(msg);
                        window.location.reload();
                    }
                }
            });

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