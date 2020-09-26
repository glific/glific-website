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

	jQuery('.single-video-container').on('click', function(){
		var target = jQuery(this).data('target');
		var videoTitle = jQuery(this).find('.video-title').text();
		var videoDuration = jQuery(this).find('.video-duration').text();
		jQuery('.selected-video-container .selected-video-title').html(videoTitle);
		jQuery('.selected-video-container .selected-video-duration').html(videoDuration);
		var url = 'https://www.youtube.com/embed/'+target;
		jQuery('.single-video-block iframe').attr('src', url);
	});

	jQuery('.single-video').on('click', function(){
		var target = jQuery(this).data('target');
		jQuery('.video-content-block').removeClass('d-flex').addClass('d-none');
		jQuery(target).addClass('d-flex').removeClass('d-none');
	});

	jQuery('.desktop-menu .menu-item-has-children').hover(function() {
		jQuery(this).find('.sub-menu').show();
		jQuery(this).find('a').addClass('open');
	}, function() {
		jQuery(this).find('.sub-menu').hide();
		jQuery(this).find('a').removeClass('open');
	});

	jQuery('.mobile-primary-menu > li').each(function() {
		if (jQuery(this).hasClass('menu-item-has-children')) {
			jQuery('>a', this).after('<span class="mt-0 text-white-80 position-absolute c-pointer glific-menu-dropdown"></span>');
		}
	});
	jQuery('.mobile-primary-menu').on('click', 'li.menu-item-has-children>span', function() {
		var sub_menu = jQuery(this).parent().find('.sub-menu');
		sub_menu.toggleClass('d-block');
	});
});
