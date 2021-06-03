<?php
/**
* Template Name: content
 *
 * @package ColoredCow
 * @subpackage webmentor4you
 */

get_header();
	while (have_posts()) : the_post();
?>
<div class="d-flex d-flex flex-column bg-theme-white-smoke pb-26 pt-14 pt-md-18 bg-theme-white-smoke">
	 <div class="p-7 w-full">
		<h3 class="font-heebo-bold text-theme-primary fz-28 fz-md-36 leading-40 mb-0 text-center"><?php echo get_the_title(); ?></h3>
	</div>
	<div class="w-full fz-18 leading-27 font-heebo-regular mt-15  container pb-7">
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile;
	get_footer();
