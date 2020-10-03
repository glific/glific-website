<?php

add_action('wp_enqueue_scripts', 'glific_scripts');
function glific_scripts()
{
	wp_enqueue_script('glific-bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/main.js', array('jquery', 'glific-bootstrap'), filemtime(get_template_directory() . '/main.js'), true);
	wp_localize_script('main', 'PARAMS', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'total_blog_count' => wp_count_posts('post')->publish,
	));
}

add_action('wp_enqueue_scripts', 'glific_styles');
function glific_styles()
{
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'));
}

add_filter('show_admin_bar', '__return_false');

add_action('after_setup_theme', 'glific_theme_add_supports');
function glific_theme_add_supports()
{
	add_theme_support('custom-logo');
	add_theme_support('align-wide');
	add_theme_support('align-full');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
}


if (!function_exists('glific_theme_setup')) {
	function glific_theme_setup()
	{
		register_nav_menu('header_nav', 'Header Navigation');
		register_nav_menu('footer_primary', 'Footer Menu Primary');
		register_nav_menu('footer_secondary', 'Footer Menu Secondary');
		register_nav_menu('footer_tertiary', 'Footer Menu Tertiary');
		register_nav_menu('secondary_header_nav', 'Secondary Header Navigation');
		register_nav_menu('social', 'Social Links Menu');
	}
	add_action('init', 'glific_theme_setup');
}

function get_youtube_video_id($youtube_url)
{
	parse_str(parse_url($youtube_url, PHP_URL_QUERY), $url);
	$youtube_video_id = $url['v'];
	return $youtube_video_id;
}

function get_youtube_video_title($youtube_video_id)
{
	$apikey = WP_YOUTUBE_API_KEY;
	$googleApiUrl = WP_GOOGLE_API_URL;
	if (!empty($apikey) && !empty($googleApiUrl)) {
		$json_data = file_get_contents($googleApiUrl . '?id=' . $youtube_video_id . '&key=' . $apikey . '&part=snippet');
		$youtube_data = json_decode($json_data);
		return $youtube_data->items[0]->snippet->title;
	}
}

function get_youtube_video_duration($youtube_video_id)
{
	$apikey = WP_YOUTUBE_API_KEY;
	$googleApiUrl = WP_GOOGLE_API_URL;
	if (!empty($apikey) && !empty($googleApiUrl)) {
		$json_data = file_get_contents($googleApiUrl . '?id=' . $youtube_video_id . '&key=' . $apikey . '&part=contentDetails');
		$youtube_data = json_decode($json_data);
		$duration = $youtube_data->items[0]->contentDetails->duration;
		$interval = new \DateInterval($duration);
		return gmdate("i:s", $interval->d * 24 * 60 * 60 + ($interval->h * 60 * 60) + ($interval->i * 60) + $interval->s);
	}
}

add_action('widgets_init', 'glific_widget_forms');
function glific_widget_forms()
{
	register_sidebar(array(
		'name' => 'Contact',
		'id' => 'glific_form_contact',
		'before_title' => '<span class="d-none">',
		'after_title' => '</span>',
	));

	register_sidebar(array(
		'name' => 'Newsletter',
		'id' => 'glific_form_newsletter',
		'before_title' => '<span class="d-none">',
		'after_title' => '</span>',
	));

	register_sidebar(array(
		'name' => 'Demo',
		'id' => 'glific_form_demo',
		'before_title' => '<span class="d-none">',
		'after_title' => '</span>',
	));
}

function get_thumbnail_from_youtube_video($url)
{
	$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
	$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
	if (preg_match($longUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}
	if (preg_match($shortUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}

	return 'https://img.youtube.com/vi/' . $youtube_id . '/0.jpg';
}

function get_youtube_embed_url($url)
{
	$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
	if (preg_match($longUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}
	if (preg_match($shortUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}
	return 'https://www.youtube.com/embed/' . $youtube_id . '?rel=0';
}

function show_more_blogs()
{
	if (!isset($_POST['offset']) || empty($_POST['offset'])) {
		wp_die();
	}

	$offset = intval($_POST['offset']);

	$blogs = new WP_Query(array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 9,
		'offset' => $offset
	));

	$html = '';
	if ($blogs->have_posts()) {

		while ($blogs->have_posts()) {
			$blogs->the_post();
			$featured_image_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/dist/images/blog-delaut-image.svg';
			$html .= '<a class="w-285 mb-12 glific-blog text-decoration-none" href="' . get_the_permalink(). '">';
			$html .= '<div class="w-full h-169 bg-position-center bg-size-cover rounded-30" style="background-image: url(' . $featured_image_url . ');"></div>';
			$html .= '<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26 mt-6 text-theme-mine-shaft">' . get_the_title() . '</h5>';
			$html .= '<p class="font-heebo-regular fz-18 leading-27 mt-6 text-theme-mine-shaft">' . wp_trim_words(get_the_content(), 13, '...') . '</p>';
			$html .= '<p class="font-heebo-regular fz-18 leading-27 mt-6 text-theme-mine-shaft">' . strtoupper(get_the_date('F d, Y')) . '</p>';
			$html .= '</a>';
		}

		wp_reset_query();
	}
	wp_send_json_success($html);
}
add_action('wp_ajax_show_more_blogs', 'show_more_blogs');
add_action('wp_ajax_nopriv_show_more_blogs', 'show_more_blogs');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

function wp_move_comment_field_to_bottom($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_fields', 'wp_move_comment_field_to_bottom');

function wp_remove_comment_url($arg)
{
	$arg['url'] = '';
	return $arg;
}
add_filter('comment_form_default_fields', 'wp_remove_comment_url');

function wp_add_comment_fields($fields)
{
	$fields['company'] = '<p class="comment-form-company"><label for="company">' . __('Organisation name *') . '</label>' . '<input id="company" name="company" type="text" size="30" required/></p>';
	return $fields;
}
add_filter('comment_form_default_fields', 'wp_add_comment_fields');

function wp_modify_comment_form_text_area($arg)
{
	$arg['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x('Comment *', 'noun') . '</label><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true" required></textarea></p>';
	return $arg;
}
add_filter('comment_form_defaults', 'wp_modify_comment_form_text_area');

function wp_change_submit_button_text($defaults)
{
	$defaults['label_submit'] = 'Post comment';
	return $defaults;
}
add_filter('comment_form_defaults', 'wp_change_submit_button_text');
