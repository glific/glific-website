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
	<div class="bg-theme-primary d-flex flex-column flex-xl-row align-items-center justify-content-xl-center mb-27 pt-22 pb-22">
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
</div>

<?php
	get_footer();
