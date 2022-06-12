/**
 * Theme functions file
 */

jQuery(function( $ ) {

    var $document = $(document);
    var $window = $(window);


    /**
    * Document ready (jQuery)
    */
    $(function () {

        /**
         * Activate superfish menu.
         */
        $('.sf-menu').superfish({
            'speed': 'fast',
            'delay' : 0,
            'animation': {
                'height': 'show'
            }
        });



        /**
         * SlickNav
         */

        $('#menu-main-slide').slicknav({
            prependTo:'.navbar-header-main',
            allowParentLinks: true,
            closedSymbol: "",
            openedSymbol: ""
            }
        );


        /**
         * FitVids - Responsive Videos in posts
         */
        $(".post-content, .widget").fitVids();


        /**
         * Search form in header.
         */
        $(".sb-search").sbSearch();


        $window.on('load', function() {
            // $window.ready(function() {

            /**
             * Activate main slider.
             */
            $('#slider').sllider();

        });

    });


    $.fn.sllider = function() {
        return this.each(function () {
            var $this = $(this);

            var $slides = $this.find('.slide');

            if ($slides.length <= 1) {
                $slides.addClass('is-selected');

                return;
            }

            var flky = new Flickity('.slides', {
                autoPlay: (zoomOptions.slideshow_auto ? parseInt(zoomOptions.slideshow_speed, 10) : false),
                cellAlign: 'center',
                contain: true,
                percentPosition: false,
                //prevNextButtons: false,
                pageDots: false,
                wrapAround: true,
                draggable: true,
                arrowShape: {
                  x0: 10,
                  x1: 50, y1: 40,
                  x2: 60, y2: 35,
                  x3: 25
                },
                accessibility: false
            });
        });
    };

    $.fn.sbSearch = function() {
       return this.each(function() {
           new UISearch( this );
       });
    };

});