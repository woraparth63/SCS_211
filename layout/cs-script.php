<script type="text/javascript" src="https://cookiecdn.com/cwc.js"></script>
<script id="cookieWow" type="text/javascript" src="https://cookiecdn.com/configs/K3VSC9aVmgw2NmDbj3aosHyc" data-cwcid="K3VSC9aVmgw2NmDbj3aosHyc"></script>

<!--script src="js/jquery-3.3.1.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--script src="js/jquery-ui.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--script src="js/popper.min.js"></script-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!--script src="js/bootstrap.min.js"></script-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!--script src="js/owl.carousel.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!--script src="js/jquery.countdown.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<!--script src="js/bootstrap-datepicker.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!--script src="js/jquery.easing.1.3.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!--script src="js/aos.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!--script src="js/jquery.fancybox.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<!--script src="js/jquery.sticky.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/brands.min.js"></script>

<!--script src="https://kit.fontawesome.com/d59a8a2721.js"></script-->
<!--script src="js/main.js"></script-->
<script>
    AOS.init({
        duration: 800,
        easing: 'slide',
        once: true
    });

    jQuery(document).ready(function($) {

        "use strict";



        var siteMenuClone = function() {

            $('.js-clone-nav').each(function() {
                var $this = $(this);
                $this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
            });


            setTimeout(function() {

                var counter = 0;
                $('.site-mobile-menu .has-children').each(function() {
                    var $this = $(this);

                    $this.prepend('<span class="arrow-collapse collapsed">');

                    $this.find('.arrow-collapse').attr({
                        'data-toggle': 'collapse',
                        'data-target': '#collapseItem' + counter,
                    });

                    $this.find('> ul').attr({
                        'class': 'collapse',
                        'id': 'collapseItem' + counter,
                    });

                    counter++;

                });

            }, 1000);

            $('body').on('click', '.arrow-collapse', function(e) {
                var $this = $(this);
                if ($this.closest('li').find('.collapse').hasClass('show')) {
                    $this.removeClass('active');
                } else {
                    $this.addClass('active');
                }
                e.preventDefault();

            });

            $(window).resize(function() {
                var $this = $(this),
                    w = $this.width();

                if (w > 768) {
                    if ($('body').hasClass('offcanvas-menu')) {
                        $('body').removeClass('offcanvas-menu');
                    }
                }
            })

            $('body').on('click', '.js-menu-toggle', function(e) {
                var $this = $(this);
                e.preventDefault();

                if ($('body').hasClass('offcanvas-menu')) {
                    $('body').removeClass('offcanvas-menu');
                    $this.removeClass('active');
                } else {
                    $('body').addClass('offcanvas-menu');
                    $this.addClass('active');
                }
            })

            // click outisde offcanvas
            $(document).mouseup(function(e) {
                var container = $(".site-mobile-menu");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    if ($('body').hasClass('offcanvas-menu')) {
                        $('body').removeClass('offcanvas-menu');
                    }
                }
            });
        };
        siteMenuClone();


        var sitePlusMinus = function() {
            $('.js-btn-minus').on('click', function(e) {
                e.preventDefault();
                if ($(this).closest('.input-group').find('.form-control').val() != 0) {
                    $(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
                } else {
                    $(this).closest('.input-group').find('.form-control').val(parseInt(0));
                }
            });
            $('.js-btn-plus').on('click', function(e) {
                e.preventDefault();
                $(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
            });
        };
        // sitePlusMinus();


        var siteSliderRange = function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 100000,
                values: [0, 15000],
                slide: function(event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        };
        siteSliderRange();



        var siteCarousel = function() {
            if ($('.nonloop-block-13').length > 0) {
                $('.nonloop-block-13').owlCarousel({
                    center: false,
                    items: 1,
                    loop: true,
                    lazyLoad: true,
                    stagePadding: 0,
                    margin: 30,
                    autoplay: true,
                    nav: false,
                    responsive: {
                        600: {
                            margin: 30,

                            items: 2
                        },
                        1000: {
                            margin: 30,
                            stagePadding: 0,

                            items: 3
                        },
                        1200: {
                            margin: 30,
                            stagePadding: 0,

                            items: 4
                        }
                    }
                });
            }

            $('.slide-one-item, .with-dots').owlCarousel({
                center: false,
                items: 1,
                loop: true,
                lazyLoad: true,
                stagePadding: 0,
                margin: 0,
                autoplay: true,
                smartSpeed: 1000,
                pauseOnHover: false,
                nav: false,
                dots: true,
                navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
            });

            $('.slide-one-item-alt').owlCarousel({
                center: false,
                items: 1,
                loop: true,
                lazyLoad: true,
                stagePadding: 0,
                smartSpeed: 700,
                margin: 0,
                autoplay: true,
                pauseOnHover: false,

            });



            $('.custom-prev1').click(function(e) {
                e.preventDefault();
                $('.nonloop-block-13').trigger('prev.owl.carousel');
            });
            $('.custom-next1').click(function(e) {
                e.preventDefault();
                $('.nonloop-block-13').trigger('next.owl.carousel');
            });


            $('.custom-next').click(function(e) {
                e.preventDefault();
                $('.slide-one-item-alt').trigger('next.owl.carousel');
            });
            $('.custom-prev').click(function(e) {
                e.preventDefault();
                $('.slide-one-item-alt').trigger('prev.owl.carousel');
            });

        };
        siteCarousel();



        var siteCountDown = function() {

            $('#date-countdown').countdown('2020/10/10', function(event) {
                var $this = $(this).html(event.strftime('' +
                    '<span class="countdown-block"><span class="label">%w</span> weeks </span>' +
                    '<span class="countdown-block"><span class="label">%d</span> days </span>' +
                    '<span class="countdown-block"><span class="label">%H</span> hr </span>' +
                    '<span class="countdown-block"><span class="label">%M</span> min </span>' +
                    '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
            });

        };
        siteCountDown();

        var siteDatePicker = function() {

            if ($('.datepicker').length > 0) {
                $('.datepicker').datepicker();
            }

        };
        siteDatePicker();

        var siteSticky = function() {
            $(".js-sticky-header").sticky({
                topSpacing: 0
            });
        };
        siteSticky();

        // navigation
        var OnePageNavigation = function() {
            var navToggler = $('.site-menu-toggle');
            $("body").on("click", ".main-menu li a.scroll[href^='#'], .smoothscroll[href^='#'], .site-mobile-menu .site-nav-wrap li a", function(e) {
                //e.preventDefault();

                var hash = this.hash;

                $('html, body').animate({
                    'scrollTop': $(hash).offset().top
                }, 600, 'easeInOutExpo');

            });

            $('.gototop').on('click', function() {


                $('html, body').animate({
                    'scrollTop': $('body').offset().top
                }, 600, 'easeInOutExpo');
            });
        };
        OnePageNavigation();

        var siteScroll = function() {



            $(window).scroll(function() {

                var st = $(this).scrollTop();

                if (st > 100) {
                    $('.js-sticky-header').addClass('shrink');
                } else {
                    $('.js-sticky-header').removeClass('shrink');
                }


                if (st > 200) {
                    $('.gototop').addClass('active');
                } else {
                    $('.gototop').removeClass('active');
                }

            })

        };
        siteScroll();

    });
</script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="2105621063039483" logged_in_greeting="สวัสดี ... เราสามารถช่วยเหลืออะไรคุณได้บ้าง บอกเราได้นะ?" logged_out_greeting="สวัสดี ... เราสามารถช่วยเหลืออะไรคุณได้บ้าง บอกเราได้นะ?">
</div>
<!-- script -->
<script>
    $(document).ready(function() {
        //$('a.sub-menu').dropdown();
        /*
        $('a.sub-menu').on("click", function(e){
            
            //$(this).next('ul').toggle();
            //e.stopPropagation();
            //e.preventDefault();
            
        });*/
    });
</script>