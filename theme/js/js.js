$(document).ready(function () {
    load_slide()
});

function load_slide() {
    $(window).load(function () {
        $("#carousel").flexslider({
            animation: "slide",
            controlNav: true,
            animationLoop: false,
            slideshow: true,
            itemWidth: 90.5,
            itemMargin: 12,
            asNavFor: "#slider"
        });
        $("#slider").flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: true,
            sync: "#carousel",
            start: function (a) {
                $("body").removeClass("loading")
            }
        })
    })
};