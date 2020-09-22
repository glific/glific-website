jQuery(document).ready(function() {
	jQuery('.navbar-toggle').on('click', function(){
		if (jQuery(this).hasClass('navbar-toggle-cross')) {
			jQuery('.mobile-menu').removeClass('d-flex');
			jQuery('html, body').removeClass('overflow-hidden position-relative h-100p');
		} else {
			jQuery('.mobile-menu').addClass('d-flex');
			jQuery('html, body').addClass('overflow-hidden position-relative h-100p');
		}
		jQuery(this).toggleClass('navbar-toggle-cross');
	});

	jQuery('.single-video').on('click', function(){
		var target = jQuery(this).data('target');
		jQuery('.video-content-block').removeClass('d-flex').addClass('d-none');
		jQuery(target).addClass('d-flex').removeClass('d-none');
	});

});
