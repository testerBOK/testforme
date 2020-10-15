(function($) {
	'use strict';
	$( window ).load(function() {

		$("input[name*='changenowio-widget\[custom_colors\]']").on('change', function(){
			var v = $(this).val() == 'yes';
			// $("input[name*='changenowio-widget\[custom_colors2\]']").prop('checked', v);
			$("input[name*='changenowio-widget\[custom_colors2\]']").click();
		});
		$("input[name*='changenowio-widget\[custom_colors2\]']").on('change', function(){
			var v = $(this).val() == 'yes';
			$("input[name*='changenowio-widget\[custom_colors\]']").click();
		});

	});
})( jQuery );
