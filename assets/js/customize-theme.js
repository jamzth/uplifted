var preview_loaded = function(){
	document.getElementById('scss-loading').style.display = 'none';
}

jQuery(function($) {

	$(document).on( 'ready', function() {

		$loading = $('<div id="scss-loading"></div>');
		$span = $('<span/>').appendTo($loading);

		$loading.hide();

		$('#customize-preview').append($loading);

		$enable_styles 			= $('#customize-control-enable_custom_styles').find('select');

		$color_schemes 			= $('#customize-control-color_schemes');
		$color_scheme_toggle 	= $('#customize-control-color_scheme_toggle');

		$primary_color			= $('#customize-control-primary_color');
		$secondary_color		= $('#customize-control-secondary_color');
		$tertiary_color			= $('#customize-control-tertiary_color');
		$background_color		= $('#customize-control-background_color');
		$panel_color			= $('#customize-control-panel_color');

		$background_color.appendTo('#accordion-section-colors .accordion-section-content');
		$color_schemes.appendTo('#accordion-section-colors .accordion-section-content');

		var check_color_scheme_type = function(el){
			if( $(el).val() == 'yes' ){
				$checked = $color_scheme_toggle.find('input:checked');
				if( $checked.val() == 'scheme' ){
					$primary_color.hide();
					$secondary_color.hide();
					$tertiary_color.hide();
					$background_color.hide();
					$panel_color.hide();
					$color_schemes.show();
				} else if( $checked.val() == 'hex' ){
					$primary_color.show();
					$secondary_color.show();
					$tertiary_color.show();
					$background_color.show();
					$panel_color.show();
					$color_schemes.hide();
				}
			} else{
				$primary_color.hide();
				$secondary_color.hide();
				$tertiary_color.hide();
				$background_color.hide();
				$panel_color.hide();
				$color_schemes.hide();
			}
		}

		check_color_scheme_type($enable_styles);

		$enable_styles.on('change',function(e){
			if( $(this).val() == 'no' ){
				$color_scheme_toggle.hide();
				$color_schemes.hide();
			} else if( $(this).val() == 'yes' ){
				$color_scheme_toggle.show();
				$color_schemes.show();
				$primary_color.show();
				$secondary_color.show();
				$tertiary_color.show();
				$background_color.show();
				$panel_color.show();
			}

			check_color_scheme_type(this);
		});

		$color_schemes.find('input[type=radio]').on('change',function(e){
			$('#scss-loading').show();
		});

		$color_scheme_toggle.find('input').on('change',function(e){
			check_color_scheme_type($enable_styles);
		});

		$('#customize-control-primary_color,#customize-control-secondary_color,#customize-control-tertiary_color,#customize-control-background_color,#customize-control-panel_color').find('.wp-color-picker').each( function() {
			$(this).on('irischange', function() {
					$('#scss-loading').show();
			});
		});
	});
});