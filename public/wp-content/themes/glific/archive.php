<?php

/**
 * Blogs page for theme glific
 *
 * @package glific
 */

get_header();
?>
<div class="page-blog bg-theme-white-smoke">
	<div class="pt-10 pt-md-16 pt-xl-18 pb-xl-4 pb-md-14 pb-10">
		<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 text-center mb-6 mb-md-14 mb-xl-18">
			Blogs
		</h3>
	</div>
	<?php
	if (have_posts()) : ?>
		<div class="blogs-section mx-auto w-320 w-md-600 w-xl-1135 d-flex justify-content-center justify-content-md-between flex-wrap glific-blogs-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<a class="w-285 mb-12 glific-blog text-decoration-none" href="<?php echo get_the_permalink(); ?>">
					<?php $featured_image_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/dist/images/blog-delaut-image.svg'; ?>
					<div class="w-full h-169 bg-position-center bg-size-cover rounded-30" style="background-image: url('<?php echo $featured_image_url; ?>');">
					</div>
						<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26 mt-6 text-theme-mine-shaft">
							<?php echo get_the_title(); ?>
						</h5>
					<p class="font-heebo-regular fz-18 leading-27 mt-6 text-theme-mine-shaft">
						<?php echo wp_trim_words(get_the_content(), 13, '...'); ?>
					</p>
					<p class="font-heebo-regular fz-18 leading-27 mt-6 text-theme-mine-shaft">
						<?php echo strtoupper(get_the_date('F d, Y')); ?>
					</p>
				</a>
			<?php
			endwhile;
			wp_reset_postdata();
		else : ?>
			<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26 mt-6 text-center mb-0 text-theme-primary">No blogs!</h5>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();
