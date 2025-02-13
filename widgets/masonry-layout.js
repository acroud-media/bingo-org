jQuery(document).ready(function($) {
    "use strict";

    //Masonry script
    if ($('#full-area').length) {
        var fullwidthmas = $('#full-area').masonry({
            columnWidth: function(containerWidth) {
                return containerWidth / 24;
            },
            itemSelector: '.home-widget',
            animationOptions: {
                duration: 30
            }
        });
        fullwidthmas.imagesLoaded(function() {
            setTimeout(function() {
                fullwidthmas.masonry();
                setTimeout(function() {
                    fullwidthmas.masonry();
                }, 1500);
            }, 10);
        });
        $(window).load(function() {
            setTimeout(function() {
                $('#full-area').masonry().masonry('reloadItems');
            }, 10);
        });
        $(window).resize(function() {
            setTimeout(function() {
                fullwidthmas.masonry();
                setTimeout(function() {
                    fullwidthmas.masonry();
                }, 1500);
            }, 10);
        });

        $(window).scroll(function() {
            setTimeout(function() {
                fullwidthmas.masonry();
                setTimeout(function() {
                    fullwidthmas.masonry();
                }, 1500);
            }, 1000);
        });


    }



    function full_width_elements() {
        $('.fullwidth-widget.row').css('max-width', $(window).width()).css('min-width', $(window).width());;
        $('.fullwidth-widget.row').css('margin-left', -($('#main').offset().left + parseInt($('#main').css('padding-left'))));
    };
    full_width_elements();
    $(window).load(function() {
        full_width_elements();
    });
    $(window).resize(full_width_elements);



});