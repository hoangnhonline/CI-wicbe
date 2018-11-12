$(document).ready(function() {
	




    $('#list_select .text_select').each(function() {
        $(this).click(function() {
            data = $(this).text();
            $('.control_select').text(data);
            $('#list_select').hide();
        });
    });
    $('#list_small_tin').niceScroll({
        background: "#32adf1",
        cursorcolor: "#f8f8f9",
        cursorwidth: "10px",
        cursorborder: "1px solid #c5c9cf",
        cursorborderradius: "5px"
    });
    $('#slide_bottom_wrap .list_slide_bt').carouFredSel({
        items: 6,
        next: {
            button: '#slide_bottom_wrap .right_ct'
        },
        prev: {
            button: '#slide_bottom_wrap .left_ct'
        },
        auto: false,
        direction: 'left',
        scroll: {
            items: 1,
            duration: 1000,
            pauseOnHover: true
        }
    });

    $('#slide_hinhanh_small .list_hinhanh').carouFredSel({
        synchronise: ['.large-show', false, true],
        auto: false,
        direction: 'left',
        items: {
            visible: 4,
            start: -1
        },
        scroll: {
            items: 1,
            duration: 1600,
            onBefore: function(data) {
                data.items.old.eq(1).removeClass('selected');
                data.items.visible.eq(1).addClass('selected');
            }
        },
        next: {
            button: '#slide_hinhanh_small .right_slide'
        },
        prev: {
            button: '#slide_hinhanh_small .left_slide'
        }
    });

    $('.large-show').carouFredSel({
        synchronise: ['#slide_hinhanh_small .list_hinhanh', false, true],
        width: 856,
        height: 384,
        auto: true,
        items: 1,
        //  direction:'left',
        scroll: {
            items: 1,
            fx: 'fade',
            duration: 1500
                    //fx: 'directscroll'
        }
    });

    $('.list_hinhanh .th_171_168').click(function() {
        $('.list_hinhanh').trigger('slideTo', [this, -1]);
    });
    // $('.list_hinhanh .th_171_168:eq(0)').addClass('selected');
    

    $('.aside_block').each(function() {
        $(this).find('.list_aslide').carouFredSel({
            items: 3,
            next: {
                button: $(this).find('#control_wt .right_ct')
            },
            prev: {
                button: $(this).find('#control_wt .left_ct')
            },
            auto: false,
			direction:'up',
            scroll: {
                fx: 'fade',
                items: 1,
                duration: 1000,
                pauseOnHover: true
            }
        });
    });
// $('body').click(function(e){$('#list_select').hide()});
    $("#btnstatv").click(function() {
        var user_id = $("#user_id").val();
        if (user_id == 0) {
            alert("Bạn vui lòng đăng nhập để thực hiện chức năng này !");
            return false;
        } else {
            var note = $("#comment_post").val();
            if (note == '') {
                $(".lay_width_comment").addClass("error");
                return false;
            } else {
                $(".lay_width_comment").removeClass("error");
                $("#form-comment").submit();
            }
        }
    })
})

$(document).ready(function() {
    $('.list_column_footer').each(function() {
        $(this).children('.column').removeClass('hidden');
        $(this).children('.column').find('.hidden').removeClass('hidden');
    })
    $('#prallax-line-8').attr('src', 'themes/images/layout/top_page.png');

// $('body').click(function(e){$('#list_select').hide()});

})
function LoadMap(e) {
    var lang_id = $("#lang_id").val();
    $.post("item/loadmap", {map: e, lang_id: lang_id}, function(data) {
        $(".list_kp").html(data);
    });
}