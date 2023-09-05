$(document).ready(function(){
    $("#account").click(function() {
        $(".account").addClass("show-account");
        $("body").css("overflow","hidden");
    });

    $("#account-mb").click(function() {
        $(".account").addClass("show-account");
        $("body").css("overflow","hidden");
    });

    $(".background-account-close").click(function() {
        $(".account").removeClass("show-account");
        $("body").css("overflow","unset");
    });

    $("#close-account").click(function() {
        $(".account").removeClass("show-account");
        $("body").css("overflow","unset");
    });

// View image product
    $(".image-product").click(function() {
        $(".fancybox-slide").css({"opacity":"1","z-index":"10"});
    });

    $(".background-fancybox-slide").click(function() {
        $(".fancybox-slide").css({"opacity":"0","z-index":"-10"});
    });
//Toggle detail info product
    $("#material-info").click(function() {
        $(this).toggleClass("active-content-detail");
        $("#material-content").toggle();
        $("#specification-info").removeClass("active-content-detail");
        $("#specification-content").hide();
        $("#clothing-care-info").removeClass("active-content-detail");
        $("#clothing-care-content").hide();
        $("#description-info").removeClass("active-content-detail");
        $("#description-content").hide();
    });

    $("#specification-info").click(function() {
        $(this).toggleClass("active-content-detail");
        $("#specification-content").toggle();
        $("#material-info").removeClass("active-content-detail");
        $("#material-content").hide();
        $("#clothing-care-info").removeClass("active-content-detail");
        $("#clothing-care-content").hide();
        $("#description-info").removeClass("active-content-detail");
        $("#description-content").hide();
    });

    $("#clothing-care-info").click(function() {
        $(this).toggleClass("active-content-detail");
        $("#clothing-care-content").toggle();
        $("#material-info").removeClass("active-content-detail");
        $("#material-content").hide();
        $("#specification-info").removeClass("active-content-detail");
        $("#specification-content").hide();
        $("#description-info").removeClass("active-content-detail");
        $("#description-content").hide();
    });

    $("#description-info").click(function() {
        $(this).toggleClass("active-content-detail");
        $("#description-content").toggle();
        $("#material-info").removeClass("active-content-detail");
        $("#material-content").hide();
        $("#specification-info").removeClass("active-content-detail");
        $("#specification-content").hide();
        $("#clothing-care-info").removeClass("active-content-detail");
        $("#clothing-care-content").hide();
    });

// Nav menu mobile
    $("#show-nav-mobile").click(function(){
        $(".nav").addClass("show-nav");
        $("body").css("overflow","hidden");
    });

    $("#hide-nav-mobile").click(function(){
        $(".nav").removeClass("show-nav");
        $("body").css("overflow","unset");
    });

// Slider hero banner homepage
    $('.slider-hero-banner').slick({
        slidesToShow: 1,
        adaptiveHeight: true,
        Speed:1500,
        cssEase: 'linear',
        centerPadding: 'calc((100% - 1280px)/2)',
        centerMode: true,
        appendArrows: ".arrow-hero-banner",
        nextArrow: ".arrow-next",
        prevArrow: false,
        dots: true,
        appendDots: ".dot-slider-hero-banner",
    });

// Slider list product
    $('#collection-slider-1').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        variableWidth: true,
        infinite: false,
        touchThreshold: 0,
        Swipe: false,
        touchMove: false,
        appendArrows: ".arrow-collection-slider",
        nextArrow: ".slider-1-next",
        prevArrow: ".slider-1-prev",
        Speed:500,
        responsive: [
            {
                breakpoint: 1246,
                settings: {
                    slidesToShow: 3

                }
            },
            {
                breakpoint: 932,
                settings: {
                    slidesToShow: 2

                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            },
            {
                breakpoint: 614,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            },
            {
                breakpoint: 402,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            }
        ]
    });

    $('#collection-slider-2').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        variableWidth: true,
        infinite: false,
        touchThreshold: 0,
        Swipe: false,
        touchMove: false,
        appendArrows: ".arrow-collection-slider",
        nextArrow: ".slider-2-next",
        prevArrow: ".slider-2-prev",
        Speed:500,
        responsive: [
            {
                breakpoint: 1246,
                settings: {
                    slidesToShow: 3

                }
            },
            {
                breakpoint: 932,
                settings: {
                    slidesToShow: 2

                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            },
            {
                breakpoint: 614,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            },
            {
                breakpoint: 402,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            }
        ]
    });

    $('#collection-slider-3').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        variableWidth: true,
        infinite: false,
        touchThreshold: 0,
        Swipe: false,
        touchMove: false,
        appendArrows: ".arrow-collection-slider",
        nextArrow: ".slider-3-next",
        prevArrow: ".slider-3-prev",
        Speed:500,
        responsive: [
            {
                breakpoint: 1246,
                settings: {
                    slidesToShow: 3

                }
            },
            {
                breakpoint: 932,
                settings: {
                    slidesToShow: 2

                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            },
            {
                breakpoint: 614,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            },
            {
                breakpoint: 402,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    adaptiveHeight: false,
                    Swipe: true,
                    touchMove: true,
                    touchThreshold: 100
                }
            }
        ]
    });

// Slider image product
    $('.product-slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        fade: true,
        speed: 500,
        asNavFor: '.product-slider-nav',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    dots: true,
                    appendDots: ".dot-slider-hero-banner"
                }
            }
        ]
    });

    $('.product-slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        infinite: false,
        asNavFor: '.product-slider-for',
        nextArrow: '.product-next',
        prevArrow: '.product-prev',
        dots: false,
        focusOnSelect: true
    });
});
