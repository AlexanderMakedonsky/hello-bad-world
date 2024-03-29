$(document).ready(function () {
    $("#burger").click(function () {
        $(".siteNavigation").stop().toggleClass("active");
        $("#burger, body").stop().toggleClass("open");
    });
    $(".site").css('padding-top',$(".siteHeader").outerHeight());
    $(window).resize(function (){
        $(".site").css('padding-top',$(".siteHeader").outerHeight());
    });
    function headerFixed(){
        if ($(window).scrollTop() > 0) {
            $(".siteHeader").addClass("fixed");
            $('.siteHeaderTop').slideUp();
        } else {
            $(".siteHeader").removeClass("fixed");
            $('.siteHeaderTop').slideDown();
        }
    }
    $(window).scroll(function () {
        headerFixed();
    });
    $(".scroll-link").click(function (event) {
        event.preventDefault();
        var id = $(this).attr("href"),
            top = $(id).offset().top;
        $("body,html").animate({scrollTop: top}, 1500);
    });
    $('.faqBlockItemQ').click(function (){
        $(this).find('.faqBlockItemOpen').stop().toggleClass('active');
        $(this).next('.faqBlockItemA').stop().slideToggle();
    });

    // ANCHORS
    $('a[href^="#"]').click(function (e){
        if($($.attr(this, 'href')).length > 0){
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top-$('.siteHeader').height()
            }, 1500);
        }else{
            $(this).attr('href', '/'+$.attr(this, 'href'));
        }
    });
    if(window.location.hash) {
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top-$('.siteHeader').height()
        }, 1500);
    }

    // MODAL
    // var overlay = $('#overlay');
    // var open_modal = $('.open_modal');
    // var close = $('.modal_close, #overlay');
    // var modal = $('.modal_div');
    // open_modal.click( function(event){
    //     event.preventDefault();
    //     $('body').addClass('noscroll');
    //     var div = $(this).attr('href');
    //     overlay.fadeIn(400,
    //         function(){
    //             $(div).css('display', 'block').animate({opacity: 1, top: '0'}, 200);
    //         });
    // });
    // close.click( function(){
    //     $('body').removeClass('noscroll');
    //     modal
    //         .animate({opacity: 0, top: '0%'}, 200,
    //             function(){
    //                 $(this).css('display', 'none');
    //                 overlay.fadeOut(400);
    //             }
    //         );
    // });
});