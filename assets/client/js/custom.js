jQuery(document).ready(function($){
    var HHeight = $("header.header").outerHeight();
    $('body').css('margin-top', HHeight);
    $(window).scroll(function () {
        if ($(this).scrollTop() > HHeight ) {
            $('header.header').addClass('fixed');
            
        } else {
            $('header.header').removeClass('fixed');
        }
    });

    $(".mnutog").click(function(){
        $("header.header").addClass("active");
    });
    $(".mnucls").click(function(){
        $("header.header").removeClass("active");
    });
    $(".downarwanimation").click(function() {
        $('html, body').animate({
            scrollTop: $("#abtsec").offset().top - HHeight + 20
        }, 1000);
    });

    $('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
       if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' +   this.hash.slice(1) + ']');
      if (target.length) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top  - HHeight + 20
        }, 1000, function() {
          var $target = $(target);
        $target.focus();
        if ($target.is(":focus")) {
          return false;
        } else {
          $target.attr('tabindex','-1');
          $target.focus();
        };
      });
    }
  }
});

    $('.homeslider').slick({
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
    });

    $('.clientslogoslider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        rows:2,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            }
        ]
    });

    $('.testislider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
        ]
    });

    var $animation_elements = $('.imageeffect .wp-block-image, .fadeLeft, .fadeUp, .fadeRight, .fadePopup, .leftSlide');
    var $window = $(window);
    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);
        $.each($animation_elements, function() {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = (element_top_position + element_height);
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
            $element.addClass('in-view');
        } else {
            $element.removeClass('in-view');
        }
        });
    }
    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');

    var a = 0;
    $(window).scroll(function () {
        var oTop = $("#counter-box").offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $(".counter").each(function () {
                var $this = $(this),
                    countTo = $this.attr("data-number");
                $({ countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },
                    {
                        duration: 850,
                        easing: "swing",
                        step: function () {
                            $this.text(
                                Math.ceil(this.countNum).toLocaleString("en")
                            );
                        },
                        complete: function () {
                            $this.text(
                                Math.ceil(this.countNum).toLocaleString("en")
                            );
                        }
                    }
                );
            });
            a = 1;
        }
    });


});