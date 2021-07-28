$(document).ready(function () {
    var windowWidth = $('body').width(),
        containerWidth = $('.container').width(),
        paddingContainer = ((windowWidth - containerWidth) / 2);
    console.log(windowWidth);
    console.log(containerWidth);
    console.log(paddingContainer);
    // right
    $('.companysmission, .services, .contact-us, footer, .missionfscr__wrap, .servicesmainpic__wrap').css('padding-right', paddingContainer)
    // left
    $('.companysmission-container, .services__container, .contactus__container, .footer__container, .missionfscr-container, .servicesmainpic__container').css('padding-left', paddingContainer);


    $(window).resize(function () {
        var windowWidth = $('body').width(),
            containerWidth = $('.container').width(),
            paddingContainer = ((windowWidth - containerWidth) / 2)
        // right
        $('.companysmission, .services, .contact-us, footer, .missionfscr__wrap, .servicesmainpic__wrap').css('padding-right', paddingContainer)
        // left
        $('.companysmission-container, .services__container, .contactus__container, .footer__container, .missionfscr-container, .servicesmainpic__container').css('padding-left', paddingContainer);
    });




    // SLIDER

    var $status = $('.companysmission__slider .pagingInfo');
    var $slickElement = $('.mainslider');

    $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        if (slick.slideCount < 10) {
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.text('0' + i + ' | 0' + slick.slideCount);
        } else {
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.text(i + ' | ' + slick.slideCount);
        }

    });

    $slickElement.slick({
        dots: false,
        infinite: true,
        speed: 2500,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        autoplay: true,
        autoplaySpeed: 4000,
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1200
    });

    // mouse icon


    $(".mousescroll").on("click", function (event) {
        event.preventDefault();

        var id = $(this).attr('href'),

            top = $(id).offset().top;

        $('body,html').animate({ scrollTop: top }, 1000);
    });

    $(".scroll_contact").on("click", function (event) {
        event.preventDefault();
        $('.mobilemenu').removeClass('show');
        $('body').css('overflow', 'initial')
        var id = $(this).attr('href'),

        top = $(id).offset().top;

        $('body,html').animate({ scrollTop: top }, 1000);
        
    });

    


    // SLY slider
    var $frame = $('#basic');
    var $slidee = $frame.children('ul').eq(0);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
        horizontal: 1,
        itemNav: 'basic',
        smart: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        startAt: 0,
        scrollBar: $wrap.find('.scrollbar'),
        // scrollBy: 1,
        activatePageOn: 'click',
        speed: 300,
        elasticBounds: 1,
        dragHandle: 1,
        dynamicHandle: 1,
        clickBar: 1,
    });

    // to top btn
    (function ($) {
        $(function () {
            $('.upbtn').click(function () {
                $('html, body').animate({ scrollTop: 0 }, 1500);
                return false;
            })
        })
    })(jQuery)


    // mob menu

    $('.burgerbtn').click(function () {
        $('.mobilemenu').addClass('show');
        $('body').css('overflow', 'hidden');
    });

    $('.mobilemenu__close').click(function () {
        $('.mobilemenu').removeClass('show');
        $('body').css('overflow', 'initial')
    });

    $('.wpcf7').on('wpcf7mailsent', function(event) {
        $('.modal').modal('hide');
        $('#tymodal').modal('show');
            setTimeout(function() {						
            $('#tymodal').modal('hide');

        }, 5000);		    		

    });

    //  cookies

    $('.close-cookies, .cookies-section a.cookies__ok').click(function () {
        $('.cookies-section').fadeOut();
        // $('body').removeClass('hidecook');
    });

    function setCookie(name, value, minutes) {
        var expires = "";
    
        if (minutes) {
        var date = new Date();
        date.setTime(date.getTime() + minutes * 1000);
        expires = "; expires=" + date.toUTCString();
        }
    
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    } // Get cookie
    
    
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
    
        return null;
    } 
    
    var vfCookie = readCookie('vfCookie')
    
    if(!vfCookie) {
        // $('.cookies__wrapper').css('display','flex');
        setTimeout(function () {
            $('.cookies-section').fadeIn();
          
        }, 3000);
        $('.cookies__ok').on('click', function(e){
            e.preventDefault();
            setCookie('vfCookie', true, 15650000)
            $('.cookies-section').fadeOut();
        })
        $('.close-cookies').on('click', function(e){
            $('.cookies-section').fadeOut();
        })
        
    } else {
        $('.cookies__wrapper').hide()
    }

});