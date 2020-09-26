<?php
/**
 * Template for displaying single posts
 *
 * @package ColoredCow
 */

get_header(); ?>

<div class="single-blog">
	<div class="blog-banner w-full h-354 h-md-517 h-xl-585 py-26 px-24 mb-10 bg-theme-bottle-green"></div>
		<div class="w-90p mt-md-n500 mt-n350 mx-auto max-w-360 max-w-xl-1010 max-w-md-765">
			<div class="text-white pl-9">
				<p class="font-heebo-regular fz-18 leading-27 mb-4.5">
					<?php echo strtoupper(get_the_date('F d, Y')); ?>
				</p>
				<h3 class="fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-regular mb-5">
					<?php echo get_the_title(); ?>
				</h3>
				<p class="font-heebo-regular fz-18 leading-27">
					<img src="<?php echo get_avatar_url( $post->post_author ); ?>" class="w-40 h-40 rounded-circle mr-5" /> 
					By <?php echo get_the_author_meta('display_name', $post->post_author); ?>
				</p>
			</div>
			<?php $featured_image_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/dist/images/blog-delaut-image.svg'; ?>
			<div class="w-90p h-200 w-md-741 h-md-451 w-xl-1092 h-xl-641 mx-auto bg-position-center bg-size-cover rounded-30" style="background-image: url(<?php echo $featured_image_url; ?>);"></div>
			<div class="w-90p w-md-615 mt-15 ml-8 text-black font-heebo-regular fz-18 leading-27 mb-26">
				<?php echo the_content(); ?>
			</div>
		</div>
	</div>
</div>	

<?php get_footer(); ?>