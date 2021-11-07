jQuery.noConflict()(function($) {
	'use strict';

	$(document).ready(function(){
		$('.vl-drop-parent').each(function() {
			new Drop({
				target: this,
				content: $(this).children('.vl-drop-content').html(),
				classes: 'vl-drop-tether drop-theme-arrows drop-theme-arrows-bounce-dark',
				position: 'top left',
				openOn: 'hover',
			})
		});
	});


});