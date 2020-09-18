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
	<div class="bg-theme-primary d-flex flex-column flex-md-row align-items-center mb-27">
		<div class="w-328">
			<h3 class="text-white fz-28 leading-33"><?php echo $cover_section['content']; ?></h3>
			<div class="d-flex flex-column justify-content-end">
				<a class="glific-button-border  bg-theme-secondary  py-4 w-170 fz-18 leading-27 text-center text-white font-heebo-bold" href="<?php echo $cover_section['link_first']['url']; ?>"><?php echo $cover_section['link_first']['text']; ?></a>
				<a class="glific-button-border bg-white  py-4 w-170 fz-18 leading-27 text-center text-theme-secondary font-heebo-bold" href="<?php echo $cover_section['link_second']['url']; ?>"><?php echo $cover_section['link_second']['text']; ?></a>
			</div>
		</div>

		<div class="w-328">
			<img src="<?php echo $cover_section['image']; ?>" class="w-full">
		</div>
	</div>
</div>

<?php
	get_footer();
