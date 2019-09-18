(function($) {

	"use strict"; 
    
    
    /*------------------------------------------
        = FUNCTIONS
    -------------------------------------------*/
    // Check ie and version
    function isIE () {
        var myNav = navigator.userAgent.toLowerCase();
        return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1], 10) : false;
    }


    // Toggle mobile navigation
    function toggleMobileNavigation() {
        var navbar = $(".navigation-holder");
        var openBtn = $(".navbar-header .open-btn");
        var closeBtn = $(".navigation-holder .close-navbar");

        openBtn.on("click", function() {
            if (!navbar.hasClass("slideInn")) {
                navbar.addClass("slideInn");
            }
            return false;
        })

        closeBtn.on("click", function() {
            if (navbar.hasClass("slideInn")) {
                navbar.removeClass("slideInn");
            }
            return false;            
        })
    }

    toggleMobileNavigation();


    // Function for toggle a class for small menu
    function toggleClassForSmallNav() {
        var windowWidth = window.innerWidth;
        var mainNav = $("#navbar > ul");

        if (windowWidth <= 991) {
            mainNav.addClass("small-nav");
        } else {
            mainNav.removeClass("small-nav");
        }
    }

    toggleClassForSmallNav();


    // Function for small menu
    function smallNavFunctionality() {
        var windowWidth = window.innerWidth;
        var mainNav = $(".navigation-holder");
        var smallNav = $(".navigation-holder > .small-nav");
        var subMenu = smallNav.find(".sub-menu");
        var megamenu = smallNav.find(".mega-menu");
        var menuItemWidthSubMenu = smallNav.find(".menu-item-has-children > a");

        if (windowWidth <= 991) {
            subMenu.hide();
            megamenu.hide();
            menuItemWidthSubMenu.on("click", function(e) {
                var $this = $(this);
                $this.siblings().slideToggle();
                 e.preventDefault();
                e.stopImmediatePropagation();
            })
        } else if (windowWidth > 991) {
            mainNav.find(".sub-menu").show();
            mainNav.find(".mega-menu").show();
        }
    }

    smallNavFunctionality();


    // Parallax background
    function bgParallax() {
        if ($(".parallax").length) {
            $(".parallax").each(function() {
                var height = $(this).position().top;
                var resize     = height - $(window).scrollTop();
                var doParallax = -(resize/5);
                var positionValue   = doParallax + "px";
                var img = $(this).data("bg-image");

                $(this).css({
                    backgroundImage: "url(" + img + ")",
                    backgroundPosition: "50%" + positionValue,
                    backgroundSize: "cover"
                });
            });
        }
    }


    // Hero slider background setting
    function sliderBgSetting() {
        if ($(".hero-slider .slide").length) {
            $(".hero-slider .slide").each(function() {
                var $this = $(this);
                var img = $this.find(".slider-bg").attr("src");

                $this.css({
                    backgroundImage: "url("+ img +")",
                    backgroundSize: "cover",
                    backgroundPosition: "center center"
                })
            });
        }
    }


    //Setting hero slider
    function heroSlider() {
        if ($(".hero-slider").length) {
            $(".hero-slider").slick({
                autoplay: true,
                autoplaySpeed: 6000,
                pauseOnHover: true,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                nextArrow: '<button type="button" class="slick-next">Next</button>',
                dots: true,
                fade: true,
                cssEase: 'linear'
            });
        }
    }
    
    //Take grid image and make it bg
    function makeBg($selector) {
        var selector = $selector;
        
        selector.each(function() {
            var $this = $(this),
                bgImage = $this.find(".bg-image"),
                bgImageSrc = bgImage.attr("src");
            
            bgImage.hide();
            
            $this.css({
                backgroundImage: "url(" + bgImageSrc + ")",
                backgroundSize: "cover",
                backgroundRepeat: "no-repeat",
            })
        })
    }
    

    /*------------------------------------------
        = HIDE PRELOADER
    -------------------------------------------*/
    function preloader() {
        if($('.preloader').length) {
            $('.preloader').delay(50).fadeOut(100, function() {

                //active wow
                wow.init();

                //Active heor slider
                heroSlider();

            });
        }
    }


    /*------------------------------------------
        = WOW ANIMATION SETTING
    -------------------------------------------*/
    var wow = new WOW({
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       true,       // default
        live:         true        // default
    });


    /*------------------------------------------
        = ACTIVE POPUP IMAGE
    -------------------------------------------*/  
    if ($(".fancybox").length) {
        $(".fancybox").fancybox({
            openEffect  : "elastic",
            closeEffect : "elastic",
            wrapCSS     : "project-fancybox-title-style"
        });
    }


    /*------------------------------------------
        = POPUP VIDEO
    -------------------------------------------*/  
    if ($(".video-btn").length) {
        $(".video-btn").on("click", function(){
            $.fancybox({
                href: this.href,
                type: $(this).data("type"),
                'title'         : this.title,
                helpers     : {  
                    title : { type : 'inside' },
                    media : {}
                },

                beforeShow : function(){
                    $(".fancybox-wrap").addClass("gallery-fancybox");
                }
            });
            return false
        });    
    }


    /*------------------------------------------
        = ACTIVE GALLERY POPUP IMAGE
    -------------------------------------------*/  
    if ($(".popup-gallery").length) {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',

            gallery: {
              enabled: true
            },

            zoom: {
                enabled: true,

                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });    
    }


    /*------------------------------------------
        = FUNCTION FORM SORTING GALLERY
    -------------------------------------------*/
    function sortingGallery() {
        if ($(".sortable-gallery .gallery-filters").length) {
            var $container = $('.gallery-container');
            $container.isotope({
                filter:'*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });

            $(".gallery-filters li a").on("click", function() {
                $('.gallery-filters li .current').removeClass('current');
                $(this).addClass('current');
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter:selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                    }
                });
                return false;
            });
        }
    }

    sortingGallery(); 


    /*------------------------------------------
        = MASONRY GALLERY SETTING
    -------------------------------------------*/
    function masonryGridSetting() {
        if ($('.masonry-gallery').length) {
            var $grid =  $('.masonry-gallery').masonry({
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
                percentPosition: true
            });

            $grid.imagesLoaded().progress( function() {
                $grid.masonry('layout');
            });
        }
    }

	
	
    /*------------------------------------------
        = STICKY HEADER
    -------------------------------------------*/

    // Function for clone an element for sticky menu
//    function cloneNavForSticyMenu($ele, $newElmClass) {
//        $ele.addClass('original').clone().insertAfter($ele).addClass($newElmClass).removeClass('original');
//    }

    // clone home style 1 navigation for sticky menu
//    if ($('.site-header .navigation').length) {
//        cloneNavForSticyMenu($('.site-header .navigation'), "sticky-header");
//    }

    // Function for sticky menu
//    function stickIt($stickyClass, $toggleClass) {
//
//        if ($(window).scrollTop() >= 300) {
//            var orgElement = $(".original");
//            var coordsOrgElement = orgElement.offset();
//            var leftOrgElement = coordsOrgElement.left;  
//            var widthOrgElement = orgElement.css("width");
//
//            $stickyClass.addClass($toggleClass);
//
//            $stickyClass.css({
//                "width": widthOrgElement
//            }).show();
//
//            $(".original").css({
//                "visibility": "hidden"
//            });
//
//        } else {
//
//            $(".original").css({
//                "visibility": "visible"
//            });
//
//            $stickyClass.removeClass($toggleClass);
//        }
//    }


    /*------------------------------------------
        = Header shopping cart toggle
    -------------------------------------------*/  
    if($(".mini-cart").length) {
        var cartToggleBtn = $(".cart-toggle-btn");
        var cartContent = $(".top-cart-content");
        var body = $("body");

        cartToggleBtn.on("click", function(e) {
            cartContent.toggleClass("top-cart-content-toggle");
            e.stopPropagation();
        });

        body.on("click", function() {
            cartContent.removeClass("top-cart-content-toggle");
        }).find(cartContent).on("click", function(e) {
            e.stopPropagation();
        });
    }
    
    
    /*------------------------------------------
        = service slider
    -------------------------------------------*/  
    if($(".service-slider".length)) {
        $(".service-slider").owlCarousel({
            autoplay:true,
            mouseDrag: false,
            smartSpeed: 300,
            dots:false,
            margin: 30,
            loop:false,
            autoplayHoverPause:true,
            responsive: {
                0 : {
                    items: 1
                },
                640 : {
                    items: 3
                },
 
                768 : {
                    items: 3
                },
                992 : {
                    items: 4
                }
            }
        });
    }
    
    
    /*------------------------------------------
        = Testimonials slider
    -------------------------------------------*/  
    if($(".testimonials-slider".length)) {
        $(".testimonials-slider").owlCarousel({
            //autoplay: true,
            mouseDrag: true,
            smartSpeed: 1000,
            autoHeight:true,
            loop:true,
            autoplayHoverPause:true,
            items: 1,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
        });
    }

     /*------------------------------------------
        = Product slider
    -------------------------------------------*/  
    if($(".productslider".length)) {
        $(".productslider").owlCarousel({
            //autoplay: true,
            mouseDrag: true,
            smartSpeed: 1000,
            loop:false,
            margin: 20,
            autoplayHoverPause:true,
            items: 5,
            autoWidth:true,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }
        });
    }    
    
    
    /*------------------------------------------
        = Dealers slider
    -------------------------------------------*/  
    if($(".dealerlocationsslider".length)) {
        $(".dealerlocationsslider").owlCarousel({
            //autoplay: true,
            mouseDrag: true,
            smartSpeed: 1000,
            loop:false,
            margin: 20,
            autoplayHoverPause:true,
            items: 5,
            autoWidth:true,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 7
                }
            }
        });
    }   

    /*-------------------------------------------------------
        = Function for setting horizental overflow scroolbar
    --------------------------------------------------------*/  
    function setMcustomScrollBar($selector) {
        var selector = $selector,
            windowWidth = window.innerWidth;

        if((selector.length) && (windowWidth >= 768)) {
            selector.addClass("mCustomScrollbar _mCS_1");
            selector.mCustomScrollbar({
                axis:"x",
                advanced:{
                    autoExpandHorizontalScroll: true
                },
                mouseWheel: "disable"
            });
        } else {
            selector.removeClass("mCustomScrollbar _mCS_1");
            selector.mCustomScrollbar("destroy");
        }
    }


    /*------------------------------------------
        = Partners slider
    -------------------------------------------*/  
    if($(".partners-slider".length)) {
        $(".partners-slider").owlCarousel({
            autoplay:true,
            smartSpeed: 300,
            margin: 30,
            loop:true,
            autoplayHoverPause:true,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left">','<i class="fa fa-angle-right">'],
            responsive: {
                0 : {
                    items: 2
                },

                600 : {
                    items: 3
                },

                992 : {
                    items: 4
                }
            }
        });
    }


    /*------------------------------------------
        = team slider
    -------------------------------------------*/  
    if($(".team-slider".length)) {
        $(".team-slider").owlCarousel({
            // autoplay:true,
            smartSpeed: 300,
            margin: 30,
            loop:true,
            autoplayHoverPause:true,
            nav: true,
            navText: ['<i class="fa fa-arrow-left">','<i class="fa fa-arrow-right">'],
            responsive: {
                0 : {
                    items: 1
                },

                450 : {
                    items: 2
                },

                700 : {
                    items: 3
                }
            }
        });
    }


    /*------------------------------------------
        = FAN FACT COUNT
    -------------------------------------------*/
    if ($(".start-count").length) {
        $('.counter').appear();
        $(document.body).on('appear', '.counter', function(e) {
            var $this = $(this),
            countTo = $this.attr('data-count');

            $({ countNum: $this.text()}).animate({
                countNum: countTo
            }, {
                duration: 3000,
                easing:'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }


    /*------------------------------------------
        = Testimonials slider
    -------------------------------------------*/  
    if($(".testimoials-s2-slider".length)) {
        $(".testimoials-s2-slider").owlCarousel({
            autoplay:true,
            smartSpeed: 300,
            margin: 30,
            loop:true,
            autoplayHoverPause:true,
            nav: true,
            navText: ['<i class="fa fa-arrow-left">','<i class="fa fa-arrow-right">'],
            dots: false,
            responsive: {
                0 : {
                    items: 1
                },

                768 : {
                    items: 2
                }
            }
        });
    }


    /*------------------------------------------
        = SHOP RANGE SLIDER
    -------------------------------------------*/
    if ($("#range").length) {
        $("#range").slider({
            min: 50,
            max: 1000,
            value: [85, 300],
            tooltip: "hide"
        });

        $("#range").on("slide", function(v1) {
            $("#min-value").text("$" + v1.value[0]);
            $("#max-value").text("$" + v1.value[1]);
        });
    }

    /*------------------------------------------
        = SHOP DETAILS PRODUCT SLIDER
    -------------------------------------------*/
    $('.multiple-items').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: false,
       arrows: false,
        autoplaySpeed: 2000,
      autoplay: true
    });
    
    if ($(".shop-single-slider-wrapper").length) {
        $('.slider-for').slick({
            slidesToShow: 1,
            dots: true,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            fade: true,
            autoplaySpeed: 2000,
            asNavFor: '.slider-nav'
        });

        

        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            focusOnSelect: true,
            prevArrow: '<i class="nav-btn nav-btn-lt fa fa-long-arrow-left"></i>',
            nextArrow: '<i class="nav-btn nav-btn-rt fa fa-long-arrow-right"></i>',

            responsive: [
                {
                  breakpoint: 500,
                  settings: {
                    slidesToShow: 3,
                    infinite: true
                  }
                }
            ]

        });
    }
    

    // Bootstrap touchspin for product details page
    if ($("input[name='count-product']").length) {
        $("input[name='count-product']").TouchSpin({
            verticalbuttons: true
        });
    }

    //Recent proejct horizental scroolbar
    if($(".recent-projects-grids").length) {
        setMcustomScrollBar($(".recent-projects-grids"));
    }


    /*------------------------------------------
        = BACK TO TOP BTN SETTING
    -------------------------------------------*/
    $("body").append("<a href='#' class='back-to-top'><i class='fa fa-angle-up'></i></a>");

    function toggleBackToTopBtn() {
        var amountScrolled = 300;
        if ($(window).scrollTop() > amountScrolled) {
            $("a.back-to-top").fadeIn("slow");
        } else {
            $("a.back-to-top").fadeOut("slow");
        }
    }

    $(".back-to-top").on("click", function() {
        $("html,body").animate({
            scrollTop: 0
        }, 700);
        return false;
    })



    /*------------------------------------------
        = GOOGLE MAP
    -------------------------------------------*/  
    function map() {

        var locations = [
            ['Hotel royal international khulna ', 22.8103888, 89.5619609,1],
            ['City inn khulna', 22.820884, 89.551216,2],
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng( 22.8103888, 89.5619609),
            zoom: 12,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP

        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {  
                marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon:'assets/images/map-marker.png'
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        map.set('styles',

            [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#fdc900"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#fdc900"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ]
        );

    }; 


    /*------------------------------------------
        = CONTACT FORM SUBMISSION
    -------------------------------------------*/  
    if ($("#contact-form").length) {
        $("#contact-form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },	
                email:{
                    required: true,
                    email: true
                }, 

				phone: {
                   required: true,
                    number:true,
                    digits: true,
                    minlength: 5,
                    maxlength: 10
                },
                message: "required",
            },

            messages: {
                name: "Please enter your name",
                email: {
                    required: 'Please enter email address',
                    email: 'enter valid email address'
                }, 
                phone:{
                    required:"Please enter your phone number",
                    number:"enter only number"
                },
                message: "Please enter your message"
            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "http://benchmarkagencies.com/home/",
                    data: $(form).serialize(),
                    success: function () {
                        $( "#loader").hide();
                        $( "#success").slideDown( "slow" );
                        setTimeout(function() {
                        $( "#success").slideUp( "slow" );
                        }, 3000);
                        form.reset();
                    },
                    error: function() {
                        $( "#loader").hide();
                        $( "#error").slideDown( "slow" );
                        setTimeout(function() {
                        $( "#error").slideUp( "slow" );
                        }, 3000);
                    }
                });
                return false; // required to block normal submit since you used ajax
            }

        });
    }


    /* GET A QUOTE FORM */
    if ($("#get-a-quote").length) {
        $("#get-a-quote").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 2
                },
                lastname: {
                    required: true,
                    minlength: 2
                },  
                email: {
                    required: true,
                    email:true,
                    minlength: 2
                },
                mobile: {
                    required: true,
                    number:true,
                    digits: true,
                    minlength: 5,
                    maxlength: 10
                },
                states_name: {
                    required: true,
                },  
                city_name: {
                    required: true,
                    minlength: 2
                },  
               // message: "required",
            },

            messages: {
                firstname: {
                    required:"Please enter your firstname",
                },
                lastname:{
                    required:"Please enter your lastname"
                },
                email:{
                    required:"Please enter your email"
                },
                mobile:{
                    required:"Please enter your phone number",
                    number:"enter only number"
                },
                 states_name:{
                    required:"Please select state name"
                },
                 city_name:{
                    required:"Please enter city name"
                },
                //message: "Please enter your message"
            },

            submitHandler: function (form) {
                $("#loader").show();
                $.ajax({
                    type: "POST",
                    url: "http://benchmarkagencies.com/home/GetaQuote",
                    data: $(form).serialize(),
                    success: function (data) {
                        var json = $.parseJSON(data);
                        if(json.status==200){
                            $( "#loader").hide();
                            
                            form.reset();
                            $('#quoteModal').modal('hide');
                            $( "#success").show();
                            $( "#success").html(json.message);

                            $( "#success").slideDown( "slow" );
                            setTimeout(function() {
                            $( "#success").slideUp( "slow" );
                            }, 5000);
                              setTimeout(function() {
                             $(".fa-refresh").hide();
                              }, 4000);
                               
                        }else{
                            $('#quoteModal').modal('hide');
                            $( "#loader").hide();
                            $( "#error").show();
                            $( "#error").html(json.message);
                            $( "#error").slideDown( "slow" );
                            
                            setTimeout(function() {
                            $( "#error").slideUp( "slow" );
                            }, 5000);
                                setTimeout(function() {
                             $(".fa-refresh").hide();
                              }, 5000);
                            
                        }
                        
                    },
                    error: function(data) {
                        var json = $.parseJSON(data);
                        $( "#loader").hide();
                        $( "#error").slideDown( "slow" );
                         
                        setTimeout(function() {
                        $( "#error").slideUp( "slow" );
                        }, 5000);
                         setTimeout(function() {
                             $(".fa-refresh").hide();
                              }, 5000);
                        $('#quoteModal').modal('hide');
                    }
                });
                return false; // required to block normal submit since you used ajax
            }

        });
    }

    // Contact page form
    if ($("#contact-form-s2").length) {
        $("#contact-form-s2").validate({
            rules: {
                f_name: {
                    required: true,
                    minlength: 2
                },

                l_name: {
                    required: true,
                    minlength: 2
                },

                email: {
                    required: true,
                    email: true
                },

				phone: {
                    required: true,
                    minlength: 5,
                    maxlength: 10
                },
                states_name:{
                    required:true,
                },
                city_name:{
                    required:true,
                },
                recaptcha_response_field: {
                    required: true,
                },
		message: "required",
            },

            messages: {
                f_name: "Please enter your name",
                l_name: "Please enter your Last name",
                email: {
                    required: 'Please enter email address',
                    email: 'enter valid email address'
                },
			   message: "Please enter your message",
				phone: {
                    required: "Please enter your number",
                    minlength: "your number must consist of at least 5 number"
                },
                states_name:{
                    required:'Please select States',
                },
                city_name:{
                    required:"Please enter city name",
                },
            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "http://benchmarkagencies.com/contact_us/",
                    data: $(form).serialize(),
                    success: function () {
                        $( "#loader").hide();
                        $( "#success").slideDown( "slow" );
                        setTimeout(function() {
                        $( "#success").slideUp( "slow" );
                        }, 3000);
                        form.reset();
                    },
                    error: function() {
                        $( "#loader").hide();
                        $( "#error").slideDown( "slow" );
                        setTimeout(function() {
                        $( "#error").slideUp( "slow" );
                        }, 3000);
                    }
                });
                return false; // required to block normal submit since you used ajax
            }

        });
    } 


    $(document).ready(function(){
        $('.theme-btn').click(function(){
            $("#contact-form-s2").submit(function(){
            //[0] - numer wiersza w tablicy
            if($(this).serializeArray()[0].value == "") 
            {
                return false;
            }
        });
            var captcha = $('#reportReCaptcha');
            var response = grecaptcha.getResponse();

            if (response.length === 0) {
                $( '.msg-error').text( "Please Select captcha first" );
                return false;
                if( !captcha.hasClass( "error" ) ){
                  captcha.addClass( "error" );
              }
          } else {
            $( '.msg-error' ).text('');
            captcha.removeClass( "error" );
    // form submit return true
    return true;
}
});
    });


    /*==========================================================================
        WHEN DOCUMENT LOADING 
    ==========================================================================*/
        $(window).on('load', function() {

            preloader();

            sliderBgSetting();
			
            toggleMobileNavigation();

            smallNavFunctionality();
            
            //service grid bg image setting
            makeBg($(".mk-bg-img"));

            if($("#map").length) {
                map();
            }
			
        });



    /*==========================================================================
        WHEN WINDOW SCROLL
    ==========================================================================*/
    $(window).on("scroll", function() {
         
        var scroll = $(window).scrollTop(); 
        if (scroll >= 200) {
            $(".navigation").addClass("stickyheader"); 
        } else {
            $(".navigation").removeClass("stickyheader");
        } 
        
//		if ($(".site-header").length) {
//            stickIt($(".sticky-header"), "sticky-on"); 
//            
//        } 
        if($(".sticky-header").hasClass("sticky-on")){
            $("body").addClass("stickynavigationmenu");
        }else{ 
            $("body").removeClass("stickynavigationmenu");
        }
        bgParallax();

        toggleBackToTopBtn(); 
    });

        
    /*==========================================================================
        WHEN WINDOW RESIZE
    ==========================================================================*/
    $(window).on("resize", function() {
        
        toggleClassForSmallNav();

        if($(".recent-projects-grids").length) {
            setMcustomScrollBar($(".recent-projects-grids"));
        }


        clearTimeout($.data(this, 'resizeTimer'));

        $.data(this, 'resizeTimer', setTimeout(function() {
            smallNavFunctionality();
        }, 200));

    });
    


})(window.jQuery);

$(document).ready(function() {
    // SearchBox JS
    $(".search_btn").click(function(){            
        $("#search_txt").slideToggle();
    }); 
    
    $(".testimoniallink").click(function() {
        $('html,body').animate({
            scrollTop: $("#testimonialsmain").offset().top - 10},
            'slow');
    });
    
    $(".menu-item-has-children a").click(function(){
      $(this).toggleClass("activesubmenuclick");
    });
    
    $(".menu-item-has-children").hover(function(){
      $(this).toggleClass("activesubmenu");
    }); 
});


