<div class="order_info">
    <div style="width:100%; background:#FFF; text-align:center; font-weight:bold; color:#F00"><?php echo $l->lang_buy_success[$lang]?></div>

</div>

<div style="clear:both"></div>

<script type="text/javascript">

    $(document).ready(function(){

        $('.back_home').click(function(){
            var hoten = $("#hoten").val();
            var email = $("#email").val();
            var diachi = $("#diachi").val();
            var dienthoai = $("#dienthoai").val();
            var ghichu = $("#ghichu").val();

            if (hoten == '') {
                alert("Bạn vui lòng nhập họ & tên.");
                $("#hoten").addClass("error");
                return false;
            } else {
                $("#hoten").removeClass("error");
            }
            if (email == '' || IsEmail(email) == false) {
                alert("Bạn vui lòng nhập email hoặc email không đúng định dạng .");
                $("#email").addClass("error");
                return false;
            } else {
                $("#email").removeClass("error");
            }
            if (diachi == '') {
                alert("Bạn vui lòng địa chỉ .");
                $("#diachi").addClass("error");
                return false;
            } else {
                $("#diachi").removeClass("error");
            }
            if (dienthoai == '') {
                alert("Bạn vui lòng số điện thoại.");
                $("#dienthoai").addClass("error");
                return false;
            } else {
                $("#dienthoai").removeClass("error");
            }

            if (ghichu == "" ) {
                alert("<Bạn vui lòng nhập nội dung");
                $("#ghichu").addClass("error");
                return false;
            } else {
                $("#ghichu").removeClass("error");
            }
            $.post("insert-order", {hoten:hoten,email: email,diachi:diachi,dienthoai:dienthoai,ghichu:ghichu}, function(data) {
                if (data == "1")
                {
                    alert("Gửi thành công !");
                    window.location.reload();
                } else {
                    alert("Error !");
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