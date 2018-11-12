$(document).ready(function () {
    call();

});

function call() {
    $("#submit_callback").click(function () {
        var b = $("#call_back_id").val();
        var c = /^0([0-9]{9,10})$/;
        var a = $("input[name=callback_phone]").val();
        if (a == "") {
            $("#error_callback").html('<div class="show_error_white">Bạn chưa nhập số điện thoại</div>');
            return false
        } else {
            if (!c.test(a)) {
                $("#error_callback").html('<div class="show_error_white">Số điện thoại không hợp lệ.</div>');
                return false
            }
        }
        if (a != "" && c.test(a)) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "call-back",
                data: {id_item: b, phone: a, link: window.location.href},
                success: function (d) {
                    if (d == 1) {
                        alert("Cảm ơn bạn. Chúng tôi sẽ gọi lại sau ít phút !");
                        $("#error_callback").html('<div class="show_error_white">Cảm ơn bạn. Chúng tôi sẽ gọi lại sau ít phút.</div>');
                        return false
                    } else {
                        alert("Xảy ra lỗi.Vui lòng thử lại !");
                        $("#error_callback").html('<div class="show_error_white">Xảy ra lỗi.Vui lòng thử lại.</div>');
                        return false
                    }
                }
            })
        }
    })
};


