$(document).ready(function () {
    var o;
    jQuery(window).load(function () {
        $(".loader").fadeOut(500, function () {
            $(".gooey").fadeOut(500), $("body").css("overflow-y", "auto");
        });
    }),
        $(".navbar a, .header a, .footer a, .top-nav a").click(function (o) {
            $("html, body").animate(
                {
                    scrollTop: $($(this).attr("href")).offset().top,
                },
                1e3
            ),
                o.preventDefault();
        }),
        $("#nav-icon1").click(function () {
            $(this).toggleClass("open"),
                $(".navy").toggleClass("back-nav"),
                $(".nav-y").toggleClass("fixed-r"),
                $(".body-overlay").toggleClass("back"),
                $("body").toggleClass("body-mob");
        }),
        $(".body-overlay").click(function () {
            $(this).toggleClass("back"),
                $("#nav-icon1").toggleClass("open"),
                $(".navy").toggleClass("back-nav"),
                $(".nav-y").toggleClass("fixed-r"),
                $("body").toggleClass("body-mob");
        }),
        (o = $("#scroll-top")),
        $(window).scroll(function () {
            $(this).scrollTop() >= 500 ? o.show() : o.hide();
        }),
        $("#scroll-top").click(function () {
            $("html,body").animate(
                {
                    scrollTop: 0,
                },
                600
            );
        });
    /** Fixed Navbar **/
    $(window).scroll(function () {
        var st = $(window).scrollTop();
        if (st > 60) {
            $(".navbar").addClass("fixd-navbar");
        } else {
            $(".navbar").removeClass("fixd-navbar");
        }
    });

    ///////////// Font awesome 5 on pseudo elements
    window.FontAwesomeConfig = {
        searchPseudoElements: true,
    };
    ///////////// current year
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();

    $('.customizer-toggle').on('click', function(e) {
        $(this).parents(".products_row").toggleClass('open');
     });

});
//////// like button
$(function () {
    $("button.likerr").each(function () {
        $(this).click(function () {
            $(this).toggleClass("i_liked");
        });
    });
});
