(function( $ ){

	$(document).ready(function() {

		if( $('.top-bar-container.fixed').length ){
			$('body').addClass('fixie');
		}

		// Reponsify videos.
		$('#content').fitVids();

		// Initialize any flexslider objects
		$('.flexslider').flexslider();

		if ( 'ontouchstart' in window || 'onmsgesturechange' in window ) {
			$('body').addClass('touch');
		}

		$('.oembed').oembed(null, {embedMethod: "append"});

		$('.oembed').on('click',function(e){
			e.preventDefault();
			var $slide = $(this).parents('li'),
				slideHeight = $slide.height();

			$slide.height(slideHeight);

			$(this).parent().sliderVids({slideHeight: slideHeight}).find('.oembedall-container').parents('li').addClass('visible');
			$('.flexslider').flexslider('pause');
		});
	});

})( jQuery );