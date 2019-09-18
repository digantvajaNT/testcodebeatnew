var GPTHEME=GPTHEME||{};!function(e){"use strict";GPTHEME.initialize={init:function(){GPTHEME.initialize.general(),GPTHEME.initialize.mobileMenu(),GPTHEME.initialize.sectionBackground(),GPTHEME.initialize.sectionSwitch(),GPTHEME.initialize.countUp(),GPTHEME.initialize.countDown(),GPTHEME.initialize.googleMap(),GPTHEME.initialize.magicLine()},general:function(){e("").on("contextmenu",function(e){return e.preventDefault(),e.stopPropagation(),!1}),e(document).on("keydown",function(e){return!(e.ctrlKey&&85==e.keyCode||e.ctrlKey&&e.shiftKey&&73==e.keyCode||e.ctrlKey&&e.shiftKey&&75==e.keyCode||e.metaKey&&e.shiftKey&&91==e.keyCode)}),e(".youtube-wrapper").on("click",function(t){t.preventDefault();var a=e(this).find("iframe"),i=e(this).find("iframe").attr("src"),n=i+"?autoplay=1";e(this).addClass("reveal"),a.attr("src",n),console.log(i)}),e(".site-menu li a").on("click",function(){e(".site-menu").find(".menu__item--current").removeClass("menu__item--current"),e(this).parent().addClass("menu__item--current")}),e(".toggle-menu").on("click",function(){e(".site-menu").slideToggle(500),e(this).toggleClass("active")}),e(".page-loader").fadeOut("slow"),e("#download-two").raindrops({color:"#f9fbff",canvasHeight:150,waveLength:100,rippleSpeed:.05,density:.04}),e(".slider-for").slick({slidesToShow:1,slidesToScroll:1,speed:1e3,arrows:!0,asNavFor:".slider-nav",prevArrow:'<div class="PrevArrow"> <span class="ei ei-arrow_left"></span></div>',nextArrow:'<div class="NextArrow"> <span class="ei ei-arrow_right"></span></div>'}),e(".slider-nav").slick({slidesToShow:3,slidesToScroll:1,asNavFor:".slider-for",dots:!1,centerMode:!0,focusOnSelect:!0});e(".scene").parallax({scalarX:15,scalarY:40});var t=e("#site-footer").outerHeight();e(document).width()>768&&e("#site").css("margin-bottom",t),e(".faq_accordian_two .card").each(function(){var t=e(this);t.on("click",function(a){var i=t.hasClass("active");e(".faq_accordian_two .card").removeClass("active"),i?t.removeClass("active"):t.addClass("active")})}),new WOW({boxClass:"wow",animateClass:"animated",offset:0,mobile:!1,live:!0,scrollContainer:null}).init(),e(".swiper-container").each(function(){new SwiperRunner(e(this))}),e(".popup-btn").magnificPopup({type:"image"})},mobileMenu:function(){if(e("header .header-main").length&&e("header .header-main").hasClass("gp-header-sticky")){var t=e("header .header-main").offset(),a=50;e(window).height();e(window).on("scroll load",function(i){var n=e(this).scrollTop();n>t.top?e(".gp-header-table").length?e("header .gp-header-table").addClass("gp-header-fixed"):e("header .header-main").addClass("gp-header-fixed"):e(".gp-header-table").length?e("header .gp-header-table").removeClass("gp-header-fixed"):e("header .header-main").removeClass("gp-header-fixed"),n>a&&n>t.top?e(".gp-header-table").length?e("header .gp-header-table").addClass("gp-hidden-menu"):e("header .header-main").addClass("gp-hidden-menu"):n<=a&&(e(".gp-header-table").length?e("header .gp-header-table").removeClass("gp-hidden-menu"):e("header .header-main").removeClass("gp-hidden-menu")),a=n,0==n&&(e(".gp-header-table").length?e("header .gp-header-table").removeClass("gp-header-fixed"):e("header .header-main").removeClass("gp-header-fixed"))})}},sectionBackground:function(){e("[data-bg-image]").each(function(){var t=e(this).data("bg-image");e(this).css({backgroundImage:"url("+t+")"})}),e('[data-parallax="image"]').each(function(){var t=e(this).position().top,a=(e(this).data("parallax-speed"),-(t-e(window).scrollTop())/2+"px");e(this).css({backgroundPosition:"50% "+a})})},sectionSwitch:function(){e('[data-type="section-switch"], .site-menu li a').on("click",function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=e(this.hash);if(t.length>0)return t=t.length?t:e("[name="+this.hash.slice(1)+"]"),e("html,body").animate({scrollTop:t.offset().top},1e3),!1}})},countUp:function(){var t={useEasing:!0,useGrouping:!0,separator:",",decimal:".",prefix:"",suffix:""},a=e("[data-counter]");a&&a.each(function(){var a=e(this).data("counter"),i=new CountUp(this,0,a,0,2.5,t);e(this).appear(function(){i.start()},{accX:0,accY:0})})},countDown:function(){e(".countdown").each(function(t,a){var i=e(this).attr("data-count-year")+"/"+e(this).attr("data-count-month")+"/"+e(this).attr("data-count-day");e(this).countdown(i,function(t){e(this).html(t.strftime('<span class="CountdownContent">%D<span class="CountdownLabel"></span></span><span class="CountdownSeparator"></span><span class="CountdownContent">%H <span class="CountdownLabel"></span></span><span class="CountdownSeparator"></span><span class="CountdownContent">%M <span class="CountdownLabel"></span></span><span class="CountdownSeparator"></span><span class="CountdownContent">%S <span class="CountdownLabel"></span></span>'))})})},magicLine:function(){e("[data-appxbe-tab-box]").each(function(){var t=e(this),a=e(this).find(".button"),i=e(this).find(".buttons"),n=e(this).find(".buttons .line"),s=e(this).find(".item"),o=t.attr("data-options")?JSON.parse(t.attr("data-options")):{};0==a.length&&(s.each(function(){var a=e(this).attr("data-title");t.find(".buttons").append(e(document.createElement("li")).addClass("button "+o.tabClass).html(a))}),(a=e(this).find(".button")).eq(0).addClass("active "+o.tabActiveClass)),s.eq(0).addClass("active"),s.addClass(o.itemClass);var l=function(){var e=t.find(".item.active");t.hasClass("vertical")&&i.outerHeight()>e.outerHeight()?t.find(".items").css("height",i.outerHeight()+"px"):t.find(".items").css("height",e.outerHeight()+"px");var a=t.find(".buttons .active");t.hasClass("vertical")?n.css({height:a.outerHeight()+"px",transform:"translateY("+(a.offset().top-i.offset().top)+"px)"}):n.css({width:a.outerWidth()+"px",transform:"translateX("+(a.offset().left-i.offset().left+i.scrollLeft())+"px)"})};a.on("click",function(){a.removeClass("active "+o.tabActiveClass).addClass(o.tabClass),s.removeClass("active"),e(this).addClass("active "+o.tabActiveClass),s.eq(e(this).index()-1).addClass("active"),l()}),l()}),e("[data-appxbe-tab-box]").each(function(){var t=e(this),a=t.find(".item.active"),i=t.find(".buttons");t.hasClass("vertical")&&i.outerHeight()>a.outerHeight()?t.find(".items").css("height",i.outerHeight()+"px"):t.find(".items").css("height",a.outerHeight()+"px")})},googleMap:function(){e(".gmap3-area").each(function(){var t=e(this),a=(t.data("key"),t.data("lat")),i=t.data("lng"),n=t.data("mrkr");t.gmap3({center:[a,i],zoom:10,scrollwheel:!1,mapTypeId:google.maps.MapTypeId.ROADMAP,styles:[{featureType:"administrative",elementType:"all",stylers:[{color:"#ffffff"}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#ff0000"}]},{featureType:"administrative",elementType:"labels.text.fill",stylers:[{color:"#23232c"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#e4e4e4"},{gamma:"1"},{saturation:"3"},{lightness:"31"}]},{featureType:"landscape.man_made",elementType:"geometry.fill",stylers:[{color:"#f3f3f3"}]},{featureType:"landscape.natural",elementType:"all",stylers:[{color:"#aacf89"},{saturation:"20"},{lightness:"1"}]},{featureType:"landscape.natural",elementType:"labels.text.fill",stylers:[{color:"#000000"}]},{featureType:"landscape.natural.landcover",elementType:"geometry.fill",stylers:[{color:"#9acf89"}]},{featureType:"landscape.natural.terrain",elementType:"geometry.fill",stylers:[{color:"#f3f3f3"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{saturation:-100},{lightness:45}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"simplified"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"#91a5d7"},{visibility:"on"},{lightness:"44"},{saturation:"82"}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{color:"#ffffff"}]}]}).marker(function(e){return{position:e.getCenter(),icon:n}})})}},GPTHEME.documentOnReady={init:function(){GPTHEME.initialize.init(),e("#feel-the-wave").wavify({height:150,bones:7,amplitude:90,color:"rgba(255, 255, 255, 0.06)",speed:.21}),e("#wave-two").wavify({height:150,bones:8,amplitude:70,color:"rgba(255, 255, 255, 0.06)",speed:.24})}},GPTHEME.documentOnLoad={init:function(){}},GPTHEME.documentOnResize={init:function(){}},GPTHEME.documentOnScroll={init:function(){GPTHEME.initialize.sectionBackground(),e(window).scrollTop()>300?e(".switch-top").addClass("back-top"):e(".switch-top").removeClass("back-top")}},e(document).ready(GPTHEME.documentOnReady.init),e(window).on("load",GPTHEME.documentOnLoad.init),e(window).on("resize",GPTHEME.documentOnResize.init),e(window).on("scroll",GPTHEME.documentOnScroll.init)}(jQuery);