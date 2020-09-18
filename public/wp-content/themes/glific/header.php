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
	<nav class="navbar navbar-expand-xl py-4.5 px-6 py-xl-6.6 px-xl-8 fixed-top <?php echo $header_bg_color ; ?>">
		<a class="navbar-brand py-0 mr-0 d-inline-flex" href="<?php echo esc_url(home_url('/')); ?>">
		<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
			echo '<img src="' . esc_url( $custom_logo_url ) . '"class=" navbar-brand h-44 h-xl-80 py-0">';
		?>
		</a>
		<button type="button" class="navbar-toggle position-relative ml-auto d-xl-none bg-transparent border-0">
			<span class="icon-bar position-absolute border-0 bg-theme-secondary top"></span>
			<span class="icon-bar position-absolute border-0 bg-theme-secondary center"></span>
			<span class="icon-bar position-absolute border-0 bg-theme-secondary bottom"></span>
		</button>
		<?php
			wp_nav_menu(array(
				'theme_location' => 'header_nav',
				'container' => 'ul',
				'menu_class' => 'navbar-nav justify-content-center d-none d-xl-flex fz-xl-18 leading-xl-22  align-items-center',
				'echo' => true,
			));
		?>
		<div class="ml-xl-auto d-flex flex-row">
		<?php
			wp_nav_menu(array(
				'theme_location' => 'secondary_header_nav',
				'container' => 'ul',
				'menu_class' => 'navbar-nav justify-content-center d-none d-xl-flex fz-xl-18 leading-xl-22 ml-md-auto align-items-center',
				'echo' => true,
			));
		?>
		<a class="bg-theme-primary font-heebo-bold px-10 py-4 fz-18 leading-27 text-white text-decoratin-none ml-11 glific-button-border d-none d-xl-block" href="">Book a demo</a>

		</div>
	</nav>
	<div class="mobile-menu position-fixed w-screen h-screen text-right bg-theme-primary pl-0 d-none flex-column d-xl-none font-primary fz-18 leading-22 pt-14 pt-md-15 justify-content-center pr-10">
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

<body>
