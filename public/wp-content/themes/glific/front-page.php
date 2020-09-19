<?php
/**
 * File functions.php for theme coloredcow
 *
 * @package coloredcow
 */

	get_header();
?>

<div class="homepage">
	<?php $cover_section = get_field('cover_section'); ?>
	<div class="bg-theme-primary d-flex flex-column flex-xl-row align-items-center justify-content-xl-center pt-22 pb-22">
		<div class="w-328 w-md-625 w-xl-534 mr-xl-18 pt-xl-18">
			<h3 class="text-white fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-regular"><?php echo $cover_section['content']; ?></h3>
			<div class="d-flex flex-column flex-md-row align-items-end justify-content-md-end justify-content-xl-start pr-7 mt-md-9.5 mt-xl-13.5">
				<a class="glific-button-border bg-theme-secondary py-4 w-170 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none" href="<?php echo $cover_section['link_first']['url']; ?>"><?php echo $cover_section['link_first']['text']; ?></a>
				<a class="glific-button-border bg-white  py-4 w-170 fz-18 leading-27 text-center text-theme-secondary font-heebo-bold mt-6 text-decoration-none mt-md-0" href="<?php echo $cover_section['link_second']['url']; ?>"><?php echo $cover_section['link_second']['text']; ?></a>
			</div>
		</div>
		<div class="w-328 w-md-625 w-xl-427 mt-n12 ml-xl-18">
			<img src="<?php echo $cover_section['image']; ?>" class="w-full">
		</div>
	</div>
	<?php $demo_section = get_field('demo_section');
		if (!empty($demo_section)) : ?>
	<div class="demo-section d-flex flex-column flex-md-row justify-content-md-between w-330 w-660 w-xl-880 mx-auto py-26">
		<div class="d-flex flex-column w-md-298">
			<h3 class="text-theme-primary font-heebo-regular fz-28 fz-md-36 leading-40 mb-0"><?php echo $demo_section['heading']; ?></h3>
			<p class="fz-18 leading-27 mb-0 font-heebo-regular text-theme-pewter mt-6"><?php echo $demo_section['sub_heading']; ?></p>
		</div>
		<div class="embed-responsive embed-responsive-16by9 border-3-pewter rounded-29 w-full w-md-336 w-xl-502 h-240 h-xl-362 mt-6 mt-md-0">
  			<iframe class="embed-responsive-item" src="<?php echo $demo_section['video']; ?>" allowfullscreen></iframe>
		</div>
	</div>
	<?php endif ; ?>

</div>

<?php
	get_footer();
