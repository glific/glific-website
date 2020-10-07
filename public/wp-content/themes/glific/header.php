<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <title><?php echo bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<header>
	<?php
	$banner_content = get_field('banner_section', 'option');
	if (!empty($banner_content)) :
		if ( !empty( $banner_content['details']) && !empty( $banner_content['link']) ) : ?>
			<nav class="bg-theme-pewter d-flex flex-row justify-content-center navbar fixed-top banner-header py-3.5">
				<p class="font-heebo-bold fz-14 leading-21 text-white mb-0"><?php echo $banner_content['details']; ?></p>
				<a class="fz-14 leading-21 text-theme-primary font-heebo-bold text-decoration-none ml-10"
					href="<?php echo $banner_content['link']; ?>">Sign up
				</a>
			</nav>
		<?php
		endif;
	endif; ?>

	<nav class="navbar navbar-expand-xl py-4.5 px-6 py-xl-6.6 px-xl-8 fixed-top bg-white box-shadow-dark-10 <?php echo !empty( $banner_content['details']) && !empty( $banner_content['link']) ? 'mt-10' : '' ; ?>">
		<a class="navbar-brand py-0 mr-0 d-inline-flex" href="<?php echo esc_url(home_url('/')); ?>">
		<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
			echo '<img src="' . esc_url( $custom_logo_url ) . '"class=" navbar-brand w-85 h-52 py-0">';
		?>
		</a>
		<div class="ml-auto d-xl-none d-flex align-items-center">
			<a class="bg-theme-primary font-heebo-bold px-6 py-4 fz-18 leading-27 text-white text-decoration-none  glific-button-border d-xl-none mr-9 mr-md-11"
				data-toggle="modal"
				data-target="#demoModal"
				href="#">Book a demo
			</a>
			<button type="button" class="navbar-toggle position-relative d-xl-none bg-transparent border-0">
				<span class="icon-bar position-absolute border-0 bg-theme-primary top"></span>
				<span class="icon-bar position-absolute border-0 bg-theme-primary center"></span>
				<span class="icon-bar position-absolute border-0 bg-theme-primary bottom"></span>
			</button>
		</div>
		<?php
			wp_nav_menu(array(
				'theme_location' => 'header_nav',
				'container' => 'ul',
				'menu_class' => 'navbar-nav justify-content-center d-none d-xl-flex fz-xl-18 leading-xl-22  align-items-center desktop-menu',
				'echo' => true,
			));
		?>
		<div class="ml-xl-auto d-flex flex-row">
		<?php
			wp_nav_menu(array(
				'theme_location' => 'secondary_header_nav',
				'container' => 'ul',
				'menu_class' => 'navbar-nav justify-content-center d-none d-xl-flex fz-xl-18 leading-xl-22 ml-md-auto align-items-center desktop-menu',
				'echo' => true,
			));
		?>
			<a class="bg-theme-primary font-heebo-bold px-10 py-4 fz-18 leading-27 text-white text-decoration-none ml-11 glific-button-border d-none d-xl-block"
				href="#"
				data-toggle="modal"
				data-target="#demoModal">Book a demo
			</a>
		</div>
	</nav>
	<div class="mobile-menu position-fixed w-screen h-screen text-right bg-theme-primary pl-0 d-none flex-column d-xl-none font-primary fz-18 leading-22 pt-14 pt-md-15 justify-content-center pr-10 z-index-1 overflow-auto">
	<?php
		wp_nav_menu(array(
			'theme_location' => 'header_nav',
			'container' => 'ul',
			'menu_class' => 'list-unstyled my-0 mobile-primary-menu w-100p',
			'echo' => true,
		));
	?>
	<?php
		wp_nav_menu(array(
			'theme_location' => 'secondary_header_nav',
			'container' => 'ul',
			'menu_class' => 'list-unstyled my-0 mobile-primary-menu w-100p',
			'echo' => true,
		));
	?>
	</div>
</header>

<body class="<?php echo !empty( $banner_content['details']) && !empty( $banner_content['link']) ? 'mt-28.5' : 'mt-20.5' ; ?> " >
	<?php get_template_part('template-parts/book-demo-modal', null) ;?>
