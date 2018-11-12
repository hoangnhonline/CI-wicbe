
<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');
$list= $CI->Thongtin_web->show_company_lang(1,'vn');

?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=vi"></script>
<div class="wp_contact">
    <span style="float: left;clear: both;width: 100%;height: 5px"></span>
    <div class="title_div_search">Liên hệ</div>
    <span style="float: left;clear: both;width: 100%;height: 5px"></span>
        <div class="text_contact">
            <?=$list->wellcome?>
        </div>
    <span style="float: left;clear: both;width: 100%;height: 10px"></span>

    <div class="map_google">
        <div class="map">
            <div id='div_id' style='float: left;margin-top: 10px'></div>
        </div>
    </div>
    <span style="float: left;clear: both;width: 100%;height: 10px"></span>
    <form id="f_register" action="post">


        <table class="table_cv_mb">
            <tbody>
            <tr>
                <td><input type="text" name="name" id="name" class="inpunt_mb" placeholder="Họ và Tên"></td>
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
                    <textarea class="note" id="note_mb" name="note" placeholder="Ghi chú"></textarea>
                </td>
            </tr>

            <tr style="text-align: center;display: inline-block;width: 100%">
                <td style="display: inline-block;text-align: center">
                    <input type="button" name="" id="btn-dang-ky" value="Gửi">
                </td>
            </tr>
            </tbody>
        </table>
    </form>



</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-dang-ky").click(function () {
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var sl = $("#note").val();
            var form = $("#f_register").serialize();

            if (name == '') {
                alert("Bạn vui lòng nhập họ & tên .");
                $("#name").addClass("error");
                return false;
            } else {
                $("#name").removeClass("error");
            }
            if (email == '' || IsEmail(email) == false) {
                alert("Bạn vui lòng nhập Email .");
                $("#email").addClass("error");
                return false;
            } else {
                $("#email").removeClass("error");
            }
            if (phone == '') {
                alert("Bạn vui lòng nhập số điện thoại .");
                $("#phone").addClass("error");
                return false;
            } else {
                $("#phone").removeClass("error");

            }

            if (sl == '') {
                alert("Bạn vui lòng nhập nội dung .");
                $("#note").addClass("error");
                return false;
            } else {
                $("#note").removeClass("error");

            }
            $.post("dat-hang", {name: name, email: email,phone:phone,sl:sl}, function (data) {
                if (data == "1") {
                    alert("Gửi thành công.");
                    window.location.reload();
                } else {
                    alert("Lỗi");
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




<script type="text/javascript">
    var map;
    function initialize() {
        var myLatlng = new google.maps.LatLng(10.7891152, 106.7089688);
        var myOptions = {
            zoom: 16,
            scrollwheel: false,
            center: myLatlng,

            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("div_id"), myOptions);
        // Bie^'n text chu+'a no^.i dung se~ ?u+o+.c hie^?n thi.
        var text;
        text= "<b style='color:#00F' " +
        "style='text-align:center'><?php echo'Địa chỉ : 25 Mê Linh, P.19, Q. Bình Thạnh, Tp.HCM ';?>" +
        "</b>";
        var infowindow = new google.maps.InfoWindow(
            { content: text,
                size: new google.maps.Size(100,50),
                position: myLatlng
            });
        infowindow.open(map);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title:"Earthvn Viet Nam"
        });
    }
    window.onload=initialize();
</script>
