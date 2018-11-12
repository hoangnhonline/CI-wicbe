   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>

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
    
    <div class="emailWrap_popup"  id="inline2">
        <div class="title"><?= $l->lang_dathang[$lang]?></div>

        <div style="clear: both"></div>
        <div class="thongtin_lienhe">
            <form method="post" action="" name="f_register" id="f_register">
                <table  >

                    <tr><td colspan="2">  <h2><?= $l->lang_tensp[$lang]?> : <?=$item->item_name?></h2></td></tr>
                    <tr>
                        <td  class="lable"><?= $l->lang_name[$lang]?></td>

                        <td>
                            <input type="text" name="name_dk" id="name_dk" class="input_dk" value=""  /> 

                        </td>
                    </tr>
                   
                    
                    <tr>
                        <td  class="lable"><?= $l->lang_diachi[$lang]?></td>

                        <td>
                            <input type="text" name="address_dk" id="address_dk"  value="" class="input_dk" /> 

                        </td>
                    </tr>
                    <tr>
                        <td  class="lable"><?= $l->lang_phone_dh[$lang]?></td>

                        <td>
                            <input type="text" name="phone_dk" id="phone_dk"  value="" class="input_dk" /> 

                        </td>
                    </tr>
                    <tr>
                        <td  class="lable"><?= $l->lang_email[$lang]?></td>

                        <td>
                            <input type="text" name="email_dk" id="email_dk" class="input_dk" value=""  /> 

                        </td>
                    </tr>
                    <tr style="display: none">
                        <td  class="lable"></td>

                        <td>
                            <input type="text" name="id_item" id="email_dk" class="input_dk" value="<?=$item->id?>"  /> 

                        </td>
                    </tr>
                    
                    <tr>
                        <td  class="lable"><?= $l->lang_sl[$lang]?></td>

                        
                            <td>
                            <input type="text" name="soluong" id="soluong" class="input_dk" value=""  /> 

                        </td>

                        </td>
                    </tr>
 <tr>
     <td  class="lable" style="vertical-align:top"><?= $l->lang_note[$lang]?></td>

                        <td>
                 <textarea class="textarea" cols="80" id="item_content" name="note" rows="15" style="width:359px;height: 50px;border: 1px solid #eee"></textarea>

                        </td>
                    </tr>
                    
                 
                    <tr>
                        <td></td>

                        <td>
                            <span class="btn right"  id="btn-dang-ky" style="cursor: pointer">
                                <?php if($this->uri->segment(1)=='vn') {  ?>
                                <img  src="theme/images/send_button.png" alt="dang_ky.png"/></span> 
                                <?php }?>
                            <?php if($this->uri->segment(1)=='en') {  ?>
                                <img  src="theme/images/send.png" alt="dang_ky.png"/></span> 
                                <?php }?>
                            <span style="display: none;cursor: pointer"><input type="submit" id="submit-login" name="ok"/></span>
                        </td>
                    </tr>

                </table>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#tk").fancybox({
        'width': '100%',
        'height': '43%',
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none'
    });
         $("#btn-dang-ky").click(function() {

        var name = $("#name_dk").val();
      
        var address = $("#address_dk").val();
        var phone = $("#phone_dk").val();
        var email = $("#email_dk").val();
        var sl = $("#soluong").val();
        
        
        var form = $("#f_register").serialize();
        if (name == '') {
            alert("<?= $l->lang_ht[$lang]?>");
            $("#name_dk").addClass("error");
            return false;
        } else {
            $("#name_dk").removeClass("error");
        }
        
        if (address == '') {
            alert("<?= $l->lang_dc[$lang]?>");
            $("#address_dk").addClass("error");
            return false;
        } else {
            $("#address_dk").removeClass("error");

        }
        if (phone == '' || chk_val(phone) == false) {
            alert("<?= $l->lang_p[$lang]?>");
            $("#phone_dk").addClass("error");
            return false;
        } else {
            $("#phone_dk").removeClass("error");

        }
        if (email == '' || IsEmail(email) == false) {
            alert("<?= $l->lang_email_dh[$lang]?>");
            $("#email_dk").addClass("error");
            return false;
        } else {
            $("#email_dk").removeClass("error");
        }
        if (sl == '' || chk_val(sl) == false) {
            alert("<?= $l->lang_sluong[$lang]?>");
            $("#soluong").addClass("error");
            return false;
        } else {
            $("#soluong").removeClass("error");

        }
        $.ajax({
            type: "POST",
            url: "dat-hang",
            data: form,
            success: function(msg) {
                if (msg == 1) {
                    
                    alert("<?= $l->lang_tc[$lang]?>");
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


