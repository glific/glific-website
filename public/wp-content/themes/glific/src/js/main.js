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

	if(jQuery('#faq_search').length == 0 || jQuery('#faq_search').val() == '') {
		jQuery("#faq_close_button").addClass('d-none');
	}

	jQuery('#faq_search').on('keyup', function name() {
		if(jQuery(this).length == 0 || jQuery(this).val() == '') {
			jQuery("#faq_close_button").addClass('d-none');
		} else {
			jQuery("#faq_close_button").removeClass('d-none');
		}
	})

});

jQuery('.show-more-blogs').on('click', show_more_blogs);
blog_offset = 9;
function show_more_blogs(event) {
	event.preventDefault();
	var show_more_link = jQuery(this);
	show_more_link.addClass('link-not-active');
	show_more_link.text('Loading...');
	jQuery.ajax({
		url: PARAMS.ajaxurl,
		method: 'POST',
		data: {
			'offset' : blog_offset,
			'action' : 'show_more_blogs'
		},
		success: function(res) {
			jQuery('.glific-blogs-container').append(res.data);
			blog_offset += 9;
			if (PARAMS.total_blog_count <= jQuery('.glific-blog').length ) {
				show_more_link.hide();
			}
			show_more_link.text('Show more');
		},
		error: function(res) {
			console.log('there is an error');
		},
		complete: function() {
			show_more_link.removeClass('link-not-active');
		}
	});
}
