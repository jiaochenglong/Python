/*
 
 Vesta Lite WordPress Theme
 Author: Mahdi Yazdani
 
 */

(function ($) {

    "use strict";

    /* ---------------------------------------------- /*
     * Preloader
     /* ---------------------------------------------- */

    $('.loader').fadeOut(); // will first fade out the loading animation
    $('.preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({
        'overflow': 'visible'
    });

    $(document).ready(function () {

        /* ---------------------------------------------- /*
         * Initialization general scripts for all pages
         /* ---------------------------------------------- */

        var overlayMenu = $('#overlay-menu'),
                navbar = $('.navbar-custom'),
                navbatTrans,
                mobileTest;

        navbarCheck(navbar);

        $('#wp-calendar').addClass('table table-striped');
        $('#commentform .form-submit').addClass('col-md-12');
        $('.logged-in-as').addClass('col-md-12');
        $('.comment-reply-title').addClass('col-md-12');
        $('.wpcf7-submit').addClass('btn btn-round btn-d');
        $('.wpcf7-textarea').attr('rows', '6');

        /* ---------------------------------------------- /*
         * Mobile detect
         /* ---------------------------------------------- */

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        } else {
            mobileTest = false;
        }

        /* ---------------------------------------------- /*
         * Transparent navbar animation
         /* ---------------------------------------------- */

        function navbarCheck() {
            if (navbar.length > 0 && navbar.hasClass('navbar-transparent')) {
                navbatTrans = true;
            } else {
                navbatTrans = false;
            }
        }

        /* ---------------------------------------------- /*
         * Show/Hide overlay menu
         /* ---------------------------------------------- */

        $('#toggle-menu').on('click', function () {
            showMenu();
            $('body').addClass('aux-navigation-active');
            return false;
        });

        $('#overlay-menu-hide').on('click', function () {
            hideMenu();
            $('body').removeClass('aux-navigation-active');
            return false;
        });

        $(window).keydown(function (e) {
            if (overlayMenu.hasClass('active')) {
                if (e.which === 27) {
                    hideMenu();
                }
            }
        });

        function showMenu() {
            navbar.animate({'opacity': 0, 'top': -80}, {
                duration: 150,
                easing: 'easeInOutQuart'
            });

            overlayMenu.addClass('active');
        }

        function hideMenu() {
            navbar.animate({'opacity': 1, 'top': 0}, {
                duration: 150,
                easing: 'easeInOutQuart'
            });

            overlayMenu.removeClass('active');
        }

        /* ---------------------------------------------- /*
         * Overlay dropdown menu
         /* ---------------------------------------------- */

        $('#nav > li.slidedown > a').on('click', function () {
            if ($(this).attr('class') !== 'active') {
                $('#nav li ul').slideUp({duration: 300, easing: 'easeInOutQuart'});
                $('#nav li a').removeClass('active');
                $(this).next().slideToggle({duration: 300, easing: 'easeInOutQuart'}).addClass('open');
                $(this).addClass('active');
            } else {
                $('#nav li ul').slideUp({duration: 300, easing: 'easeInOutQuart'}).removeClass('open');
                $(this).removeClass('active');
            }
            return false;
        });

        /* ---------------------------------------------- /*
         * A jQuery plugin for fluid width video embeds
         /* ---------------------------------------------- */

        $('body').fitVids();

        /* ---------------------------------------------- /*
         * WOW Animation
         /* ---------------------------------------------- */
        new WOW().init();

        /* ---------------------------------------------- /*
         * Main OWL Carousel Slider
         /* ---------------------------------------------- */
        $(".mainslider").owlCarousel({
            navigation: false, // Show next and prev buttons
            pagination: false,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoPlay: 6000,
            autoHeight: true,
            stopOnHover: true,
            itemsCustom: [
                [0, 1],
                [450, 1],
                [600, 1],
                [700, 2],
                [1000, 3],
                [1200, 3],
                [1400, 3],
                [1600, 3]
            ]
        });

        /* ---------------------------------------------- /*
         * Isotope Filter
         /* ---------------------------------------------- */
        $(window).load(function () {
            var $container2 = $('#blog-masonry');
            $container2.isotope({
                itemSelector: '.blog'
            });
        });

        /* ---------------------------------------------- /*
         * Navbar Search Form
         /* ---------------------------------------------- */

        $('#lnk-show-search').click(function () {
            var searchbox = $('#search-box');
            if (searchbox.hasClass('visible')) {
                searchbox.removeClass('visible');
                $('#lnk-hide-search').hide();
                searchbox.fadeOut();
            }
            else {
                searchbox.addClass('visible');
                $('#lnk-hide-search').hide();
                var _top = $('.navbar-custom').height() + 10;
                searchbox.animate({'top': _top, 'display': 'block'}, function () {
                    $('#lnk-hide-search').show();
                }).fadeIn({
                    duration: 200,
                    easing: 'swing'
                });
            }
        });
        $('#lnk-hide-search').click(function () {
            var searchbox = $('#search-box');
            searchbox.removeClass('visible');
            $('#lnk-hide-search').hide();
            searchbox.fadeOut();
        });

        /* ---------------------------------------------- /*
         * Scroll to Top
         /* ---------------------------------------------- */

        $('.page-scroll').on('click', function () {
            $('html, body').animate({scrollTop: 0}, 1500);
            return false;
        });

    });

})(jQuery);
