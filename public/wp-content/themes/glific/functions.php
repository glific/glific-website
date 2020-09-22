<?php

add_action( 'wp_enqueue_scripts', 'glific_scripts' );
function glific_scripts() {
	wp_enqueue_script( 'glific-bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/main.js', array( 'jquery', 'glific-bootstrap' ), filemtime( get_template_directory() . '/main.js' ), true );
	wp_localize_script( 'main', 'PARAMS', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	));
}

add_action( 'wp_enqueue_scripts', 'glific_styles' );
function glific_styles() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() . '/style.css' ) );
}

add_filter( 'show_admin_bar', '__return_false' );

add_action( 'after_setup_theme', 'glific_theme_add_supports' );
function glific_theme_add_supports() {
	add_theme_support( 'custom-logo' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'align-full' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
}


if ( ! function_exists( 'glific_theme_setup' ) ) {
	function glific_theme_setup(){
		register_nav_menu( 'header_nav', 'Header Navigation' );
		register_nav_menu('footer_primary', 'Footer Menu Primary');
		register_nav_menu('footer_secondary', 'Footer Menu Secondary');
		register_nav_menu('footer_tertiary', 'Footer Menu Tertiary');
		register_nav_menu('secondary_header_nav', 'Secondary Header Navigation');
		register_nav_menu('social', 'Social Links Menu');
	}
	add_action('init','glific_theme_setup');
}

function get_youtube_video_id($youtube_url) {
	parse_str( parse_url($youtube_url, PHP_URL_QUERY), $url);
	$youtube_video_id = $url['v'];
	return $youtube_video_id;
}

function get_youtube_video_title($youtube_video_id) {
	$apikey = WP_YOUTUBE_API_KEY;
	$googleApiUrl = WP_GOOGLE_API_URL;
	if (!empty($apikey) && !empty($googleApiUrl)) {
		$json_data = file_get_contents($googleApiUrl.'?id='.$youtube_video_id.'&key='.$apikey.'&part=snippet');
		$youtube_data = json_decode($json_data);
		return $youtube_data->items[0]->snippet->title;
	}
}

function get_youtube_video_duration($youtube_video_id) {
	$apikey = WP_YOUTUBE_API_KEY;
	$googleApiUrl = WP_GOOGLE_API_URL;
	if (!empty($apikey) && !empty($googleApiUrl)) {
		$json_data = file_get_contents($googleApiUrl.'?id='.$youtube_video_id.'&key='.$apikey.'&part=contentDetails');
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
}

function get_thumbnail_from_youtube_video($url) {
	$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
	$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
	if (preg_match($longUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}
	if (preg_match($shortUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}

	return 'https://img.youtube.com/vi/'.$youtube_id.'/0.jpg';
}

function get_youtube_embed_url($url){
	$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
	if (preg_match($longUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}
	if (preg_match($shortUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}
	return 'https://www.youtube.com/embed/' . $youtube_id. '?rel=0' ;
}
