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
			<?php echo get_field('blogs_page_title'); ?>
		</h3>
	</div>
	<?php
	$posts = new WP_Query(
		array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 9
		)
	);
	if ($posts->have_posts()) : ?>
		<div class="blogs-section mx-auto w-320 w-md-600 w-xl-1135 d-flex justify-content-center justify-content-md-between flex-wrap glific-blogs-container">
			<?php while ($posts->have_posts()) : $posts->the_post(); ?>
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
<?php if (wp_count_posts('post')->publish > 9) : ?>
	<div class="w-full d-flex justify-content-center">
		<a class="show-more-blogs glific-button-border bg-theme-secondary w-190 px-6 py-4 fz-18 leading-27 text-center mx-auto text-white font-heebo-bold text-decoration-none" target="_blank" href="">Show More</a>
	</div>
<?php endif; ?>
<div class="page-blog bg-theme-white-smoke w-full pt-20">
	<div class="mx-auto w-90p w-md-737 w-xl-1010 mx-auto pb-26 bg-theme-white-smoke">
		<div class="w-full w-md-full d-flex mb-9 mb-md-10 flex-column flex-md-row mx-auto justify-content-between">
			<?php
			$source_code_section = get_field('source_code_section');
			if (!empty($source_code_section)) :
			?>
				<div class="source-code-section rounded-top-30 rounded-bottom-left-30 bg-theme-gin py-7 w-full px-10 w-md-361  w-xl-572 d-flex flex-column">
					<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
						<?php echo $source_code_section['section_title'] ?>
					</h5>
					<p class="font-heebo-regular fz-18 leading-27 mt-6 w-md-292 w-xl-460 mb-8">
						<?php echo $source_code_section['section_text'] ?>
					</p>
					<a class="glific-button-border bg-theme-primary py-4 px-10 fz-18 leading-27 text-center text-white font-heebo-bold text-decoration-none w-162" target="_blank" href="<?php echo $source_code_section['view_github_link'] ?>">
						<?php echo $source_code_section['view_github_text'] ?>
					</a>
				</div>
			<?php endif; ?>
			<?php
			$community_section = get_field('community_section');
			if (!empty($community_section)) :
			?>
				<div class="community-section rounded-top-30 rounded-bottom-right-30 bg-theme-gin py-7 px-10 w-full w-md-361 w-xl-421 mt-10 mt-md-0 d-flex flex-column">
					<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
						<?php echo $community_section['section_title'] ?>
					</h5>
					<p class="font-heebo-regular fz-18 leading-27 mt-6 w-md-310 mb-8">
						<?php echo $community_section['section_text'] ?>
					</p>
					<a class="glific-button-border bg-theme-primary py-4 px-10 fz-18 leading-27 text-center text-white font-heebo-bold text-decoration-none w-172 mt-auto" target="_blank" href="<?php echo $community_section['view_discord_link'] ?>">
						<?php echo $community_section['view_discord_text'] ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
		<?php if (is_active_sidebar('glific_form_newsletter')) :
			$newsletter_section = get_field('newsletter_section');
			if ($newsletter_section) :
		?>
				<div class="newsletter-section rounded-top-right-30 rounded-bottom-30 bg-theme-gin py-6 px-10 d-flex  justify-content-between w-full flex-column flex-md-row align-items-center">
					<div>
						<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
							<?php echo $newsletter_section['section_title'] ?>
						</h5>
						<p class="font-heebo-regular fz-18 leading-27 mt-6 w-full w-md-335">
							<?php echo $newsletter_section['section_text'] ?>
						</p>
					</div>
					<div class="newsletter-form-section w-full w-md-495">
						<div class="newsletter-form">
							<div class="form-group mb-md-0 list-unstyled">
								<div id="glific_form_newsletter" role="complementary">
									<?php dynamic_sidebar('glific_form_newsletter'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
