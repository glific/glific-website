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
