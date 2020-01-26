(function($){

	/**
	 * Astra Slider Frontend AJAX script data
	 *
	 * @since 1.0.0
	 */
    var astra_slider_frontend_script = {

        init: function() {

            $( '.home-page-ast-slider' ).each(function( index ) {

                var slider_id   	= $(this).attr('id');
                var slider_conf 	= $(this).closest('.ast-slider-wrapper').find('.ast-slider-config').data('slide_conf');

                if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
                    jQuery('#'+slider_id).slick({
                        dots			: (slider_conf.dots) == "true" ? true : false,
                        arrows			: (slider_conf.arrows) == "true" ? true : false,
                        speed			: parseInt(slider_conf.speed),
                        autoplay		: (slider_conf.autoplay) == "true" ? true : false,
                        autoplaySpeed	: parseInt(slider_conf.autoplay_interval),
                        fade 			: (slider_conf.fade) == "true" ? true : false,
                        infinite 		: true,
                        slidesToShow	: 1,
                        slidesToScroll	: 1,
                        adaptiveHeight 	: false,
                        rtl             : (slider_conf.rtl) == "true" ? true : false,
                    });
                }
            });
		},
    };

    $(document).ready(function($) {
        astra_slider_frontend_script.init();
	});

})(jQuery);