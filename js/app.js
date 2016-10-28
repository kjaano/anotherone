(function ($) {
    $(document).ready(function () {
        // Foundation JavaScript
        // Documentation can be found at: http://foundation.zurb.com/docs
        $(document).foundation();
        
        // All document ready stuff below please.

        //Add and remove classes to let the css magic to shine
        $('.signup-switch').on('click', function (e) {
            $('.signup-block').toggleClass("pressed");

            $('.comparison-block').removeClass("pressed"); //hide comparison
            $('.shopping-block').removeClass("pressed"); //hide shopping
            $('.cart-block').removeClass("pressed"); //hide cart
            e.preventDefault();
        });

        $('.comparison-switch').on('click', function (e) {
            $('.comparison-block').toggleClass("pressed"); 

            $('.signup-block').removeClass("pressed"); //hide signup
            $('.shopping-block').removeClass("pressed"); //hide shopping
            $('.cart-block').removeClass("pressed"); //hide cart
            e.preventDefault();
        });

        $('.shopping-switch').on('click', function (e) {
            $('.shopping-block').toggleClass("pressed"); 

            $('.signup-block').removeClass("pressed"); //hide signup
            $('.comparison-block').removeClass("pressed"); //hide comparison
            $('.cart-block').removeClass("pressed"); //hide cart
            e.preventDefault();
        });

        $('.cart-switch').on('click', function (e) {
            $('.cart-block').toggleClass("pressed"); 

            $('.signup-block').removeClass("pressed"); //hide signup
            $('.comparison-block').removeClass("pressed"); //hide comparison
            $('.shopping-block').removeClass("pressed"); //hide shopping
            e.preventDefault();
        });
        // the end
        // This is for community slider. To make it work. Duh! 
        $('.community_slider').slick({
            dots: true
            , infinite: true
            , speed: 300
            , slidesToShow: 1
            , adaptiveHeight: true
        });
        // the end		
        /* Thanks to CSS Tricks for pointing out this bit of jQuery
http://css-tricks.com/equal-height-blocks-in-rows/
It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

        equalheight = function (container) {

            var currentTallest = 0
                , currentRowStart = 0
                , rowDivs = new Array()
                , $el
                , topPosition = 0;
            $(container).each(function () {

                $el = $(this);
                $($el).height('auto')
                topPostion = $el.position().top;

                if (currentRowStart != topPostion) {
                    for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                        rowDivs[currentDiv].height(currentTallest);
                    }
                    rowDivs.length = 0; // empty the array
                    currentRowStart = topPostion;
                    currentTallest = $el.height();
                    rowDivs.push($el);
                } else {
                    rowDivs.push($el);
                    currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
                }
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
            });
        }

        $(window).load(function () {
            equalheight('.height_as .same_as');
        });

        $(window).resize(function () {
            equalheight('.height_as .same_as');
        });
        // the end        
        // Check if div is higher than... if is then please add class and show 'read more' button to toggle view. 

        $(".single-product-specs-wrapper").each(function () {
            var _self = $(this);

            if (_self.outerHeight() > 200) {
                _self.addClass('spec-high');
                _self.removeClass('spec-low');
            } else {
                _self.addClass('spec-low');
                _self.removeClass('spec-high');
            }
        });
        // the end

    });
})(window.jQuery);