


<div class="wp_tuyendung_bm">
    <div style="float: left;width: 100%;clear: both;height: 10px"></div>
   <form id="" action="post">


    <table class="table_cv_mb">
        <tbody>
        <tr>
            <td><input type="text" name="name" id="name" class="inpunt_mb" placeholder="<?=$l->lang_name[$lang]?>"></td>
        </tr>
        <tr>
            <td>
                <select class="select_mb">
                    <option><?=$l->lang_nganh_ut[$lang]?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email" class="inpunt_mb" placeholder="Email"></td>
        </tr>
        <tr>
            <td>
                <input type="text" name="phone" id="phone" class="inpunt_mb" placeholder="Phone">
            </td>
        </tr>
        <tr>
            <td>
                File CV :
            </td>
        </tr>
        <tr>
            <td>
                <input type="file" name="file" id="file" class="inpunt_mbs">
            </td>
        </tr>
        <tr>
            <td>
                <textarea class="note" id="note_mb"></textarea>
            </td>
        </tr>

            <tr style="text-align: center;display: inline-block">
                <td style="display: inline-block;text-align: center">
                    <input type="button" name="" id="btn-dang-ky" value="<?=$l->lang_gui[$lang]?>">
                </td>
            </tr>
        </tbody>
    </table>
   </form>
    <div style="float: left;width: 100%;clear: both;height: 10px"></div>
</div>




<script type="text/javascript">
    $(document).ready(function() {

        $("#btn-dang-ky").click(function() {
            var name = $("#name").val();

            var phone = $("#phone").val();
            var email = $("#email").val();
            var sl = $("#note").val();
            var form = $("#f_register").serialize();
            if (name == '') {
                alert("<?= $l->lang_ht[$lang] ?>");
                $("#name").addClass("error");
                return false;
            } else {
                $("#name").removeClass("error");
            }
            if (email == '' || IsEmail(email) == false) {
                alert("<?= $l->lang_email_dh[$lang] ?>");
                $("#email").addClass("error");
                return false;
            } else {
                $("#email").removeClass("error");
            }

            if (phone == '' || chk_val(phone) == false) {
                alert("<?= $l->lang_p[$lang] ?>");
                $("#phone").addClass("error");
                return false;
            } else {
                $("#phone").removeClass("error");

            }

            if (sl == '') {
                alert("<?= $l->lang_sluong[$lang] ?>");
                $("#note").addClass("error");
                return false;
            } else {
                $("#note").removeClass("error");

            }
            $.ajax({
                type: "POST",
                url: "dat-hang",
                data: form,
                success: function(msg) {
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