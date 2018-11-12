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
           <div class="title"><?=$l->lang_dangnhap[$lang]?></div>

           <div style="clear: both"></div>
           <div class="thongtin_lienhe">
               <form method="post" action="" name="f_login" id="f_login">
                   <table>


                       <tr>


                           <td>
                               <input type="text" name="email" id="code" class="input_dk" value="" placeholder="Email" />

                           </td>
                       </tr>

                       <tr>

                           <td>
                               <input type="password" name="password" id="password" placeholder="<?php echo $l->lang_matkhau[$lang] ?>" class="input_dk" />
                           </td>
                       </tr>
                       <tr style="text-align: left;display: none">


                           <td>
                               <input type="checkbox" name="remember" id="remember"  style="padding-left: 0px !important; margin-left: 0px !important"/>
                               <label for="remember">Lưu mật khẩu</label>


                           </td>
                       </tr>
                       <tr style="text-align: left;">


                           <td>

                               <a href="#" onclick="return false" id="quenmk" title="Quên mật khẩu ?" style="color:#232323; text-decoration: underline !important"><?=$l->lang_quen_mk[$lang]?></a>

                           </td>
                       </tr>
                     <tr>


                           <td>

                               <span style="display: none"><input type="submit" id="submit-login-one" name="ok"/></span>
                           </td>
                       </tr>
                       <tr>


                           <td>
                               <span class="btn right"  id="btn-login"><?=$l->lang_dangnhap[$lang]?></span>

                           </td>
                       </tr>
                       <tr>

                           <td style="float: right">  <?=$l->lang_tai_khoan[$lang]?> &nbsp;<a class="btn right" id="btn-singin" style="padding: 0px !important;border: none !important;background: none;font-size: 13px;color: #f00" href="#inline2"><?=$l->lang_dangky[$lang]?></a></td>
                       </tr>


                   </table>

               </form>

               <form id="quenmatkhau" method="post" action="">
                   <table class="quen_m_k">
                       <tbody>
                       <tr>
                           <td colspan="2">
                               <?=$l->lang_quen_mail[$lang]?>
                           </td>
                       </tr>
                       <tr>
                           <td>  <input type="text" name="email" id="email_lay_mk" class="input_dk" value="" placeholder="Email" /></td>
                       </tr>

                       <td>
                           <span class="btn right"  id="lay_mk"><?=$l->lang_gui[$lang]?></span>

                       </td>
                       </tbody>
                   </table>

               </form>
           </div>

           <script type="text/javascript">
               $(document).ready(function(){

                   $("#lay_mk").click(function() {
                       var email = $("#email_lay_mk").val();
                       if (email == '' || IsEmail(email)  == false) {
                           alert("<?=$l->lang_email[$lang]?>");
                           $("#email_lay_mk").addClass("error");
                           return false;
                       } else {
                           $("#email_lay_mk").removeClass("error");
                       }
                       $.post("reset_pas", {email: email}, function(data) {
                           if (data == "1")
                           {
                               alert("<?=$l->lang_tc[$lang]?>");
                               window.location.reload();
                           } else {
                               alert("Error !");
                           }
                       })
                   });

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

           <script>
               $(document).ready(function () {
                $('#quenmk').click(function(){

                    $('#f_login').addClass('f_login_hide');
                    $('.quen_m_k').addClass('quen_m_k_1');
                    $('.quen_m_k_1').removeClass('quen_m_k');
                })
                   $("#fancybox-close").click(function(){
                       $('#f_login').removeClass('f_login_hide');
                       $('.quen_m_k_1').addClass('quen_m_k');
                       $('.quen_m_k').removeClass('quen_m_k_1');
                   })

               })
           </script>
           <div style="width: 10px; display: inline-block; height: 275px"></div>

       </div>
       <div class="emailWrap_popup"  id="inline2">
           <div class="title"><?=$l->lang_text_dk[$lang]?></div>

           <div style="clear: both"></div>
           <div class="thongtin_lienhe" style="margin-left: 0px !important;">
               <form method="post" action="" name="f_register" id="f_register">
                   <table  >


                       <tr>


                           <td>
                               <input type="text" name="name_dk" id="name_dk" class="input_dk" value="" placeholder="<?=$l->lang_name[$lang]?>"  />

                           </td>
                       </tr>


                       <tr>


                           <td>
                               <input type="text" name="address_dk" id="address_dk"  value="" class="input_dk" placeholder="<?=$l->lang_diachi[$lang]?>" />

                           </td>
                       </tr>
                       <tr>


                           <td>
                               <input type="text" name="phone_dk" id="phone_dk" placeholder="Phone"  value="" class="input_dk" />

                           </td>
                       </tr>
                       <tr>


                           <td>
                               <input type="text" name="email_dk" id="email_dk" class="input_dk" value="" placeholder="Email"  />

                           </td>
                       </tr>

                       <tr>

                           <td>
                               <input type="password" name="password_dk" id="password_dk1" class="input_dk" placeholder="<?php echo $l->lang_matkhau[$lang] ?>" />
                           </td>
                       </tr>
                       <tr>

                           <td>
                               <input type="password" name="repassword_dk" id="repassword_dk" class="input_dk" placeholder="<?php echo $l->lang_matkhau[$lang] ?>" />
                           </td>
                       </tr>
                       <tr>
                           <td></td>
                       </tr>



                           <td>
                               <input type="checkbox" name="check" id="check"  style="padding-left: 0px !important; margin-left: 0px !important"/>
                               <label for="remember"> <?=$l->lang_dieukhoan[$lang]?></label>


                           </td>
                       </tr>

                       <tr>


                           <td>
                               <span class="btn right"  id="btn-dang-ky" style="margin-right: 47px"><?=$l->lang_dangky[$lang]?></span>
                               <span style="display: none"><input type="submit" id="submit-login" name="ok"/></span>
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
            alert("<?=$l->lang_dn_cx[$lang]?>");
            $("#code").addClass("error");
            return false;
        } else {
            $("#code").removeClass("error");
        }
        if (pass == '') {
            alert("<?=$l->lang_mk_cx[$lang]?>");
            $("#password").addClass("error");
            return false;
        } else {
            $("#password").removeClass("error");
        }
        $.post("login-ajax", {email: code, password: pass}, function(data) {
            if (data == "1")
            {
                alert("<?=$l->lang_dn_tc[$lang]?>");
                window.location.reload();
            } else {
                alert("<?=$l->lang_dn_tb[$lang]?>");
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

   <script>
       $(document).ready(function(){
           $("#btn-singin").fancybox({
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
               var pass = $("#password_dk1").val();
               var repass = $("#repassword_dk").val();
               var form = $("#f_register").serialize();
               if (name == '') {
                   alert("<?=$l->lang_ht[$lang]?>");
                   $("#name_dk").addClass("error");
                   return false;
               } else {
                   $("#name_dk").removeClass("error");
               }

               if (address == '') {
                   alert("<?=$l->lang_address[$lang]?>");
                   $("#address_dk").addClass("error");
                   return false;
               } else {
                   $("#address_dk").removeClass("error");

               }
               if (phone == '' || chk_val(phone)== false) {
                   alert("<?=$l->lang_p[$lang]?>");
                   $("#phone_dk").addClass("error");
                   return false;
               } else {
                   $("#phone_dk").removeClass("error");

               }
               if (email == '' || IsEmail(email) == false) {
                   alert("<?=$l->lang_email[$lang]?>");
                   $("#email_dk").addClass("error");
                   return false;
               } else {
                   $("#email_dk").removeClass("error");
               }

               if (pass == '') {
                   alert("<?=$l->lang_nhap_mk[$lang]?>");
                   $("#password_dk1").addClass("error");
                   return false;
               } else {
                   $("#password_dk1").removeClass("error");
               }
               if (pass != repass) {
                   alert("<?=$l->lang_xac_mk[$lang]?>");
                   $("#repassword_dk").addClass("error");
                   return false;
               } else {
                   $("#repassword_dk").removeClass("error");
               }
               $.ajax({
                   type: "POST",
                   url: "sigin-ajax",
                   data: form,
                   success: function(msg) {
                       if (msg == 1) {
                           alert("<?=$l->lang_tc[$lang]?>");
                           window.location.reload();
                       } else {
                           alert(msg);
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
