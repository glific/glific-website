<?php

/**
 * Template for displaying single posts
 *
 * @package glific
 */

get_header(); ?>

<div class="single-blog pb-15 bg-theme-white-smoke">
	<div class="blog-banner w-full h-354 h-md-517 h-xl-585 py-26 px-24 mb-10 bg-theme-bottle-green"></div>
	<div class="w-90p mt-xl-n140 mt-md-n125 mt-n89 mx-auto max-w-360 max-w-xl-1010 max-w-md-765">
		<div class="text-white pl-9 mb-9">
			<p class="font-heebo-regular fz-18 leading-27 mb-4.5">
				<?php echo strtoupper(get_the_date('F d, Y')); ?>
			</p>
			<h3 class="fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-bold mb-5">
				<?php echo get_the_title(); ?>
			</h3>
			<p class="font-heebo-regular fz-18 leading-27">
				<img src="<?php echo get_avatar_url($post->post_author); ?>" class="w-40 h-40 rounded-circle mr-5" />
				By <?php echo get_the_author_meta('display_name', $post->post_author); ?>
			</p>
		</div>
		<?php $featured_image_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/dist/images/blog-delaut-image.svg'; ?>
		<div class="w-90p h-200 w-md-741 h-md-451 w-xl-1092 h-xl-641 mx-auto bg-position-center bg-size-cover rounded-30" style="background-image: url(<?php echo $featured_image_url; ?>);"></div>
		<div class="d-flex w-md-741 w-xl-1092 flex-column flex-md-row-reverse justify-content-between">
			<div class="mt-9 mt-md-15 w-full w-md-50 d-flex flex-column align-items-center">
				<p class="font-heebo-regular fz-18 leading-27 mb-5">Share</p>
				<div class="d-flex justify-content-between align-items-center flex-row flex-md-column">
					<div class="w-40 h-40 mb-7 rounded-circle bg-theme-mine-shaft">
						<a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink()); ?>&t=<?php echo get_the_title(); ?>">
							<?php echo file_get_contents(get_template_directory() . '/dist/images/fb-icon.svg'); ?>
						</a>
					</div>
					<div class="w-40 h-40 mb-7 rounded-circle bg-theme-mine-shaft mx-7 mx-md-auto">
						<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink()); ?>&title=Volunteering%20Story&summary=<?php echo get_the_title(); ?>">
							<?php echo file_get_contents(get_template_directory() . '/dist/images/twitter-icon.svg'); ?>
						</a>
					</div>
					<div class="w-40 h-40 mb-7 rounded-circle bg-theme-mine-shaft">
						<a target="_blank" href="https://twitter.com/share?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo get_the_title(); ?>">
							<?php echo file_get_contents(get_template_directory() . '/dist/images/linkedin-icon.svg'); ?>
						</a>
					</div>
				</div>
			</div>
			<div class="w-90p w-md-615 mt-4 mt-md-15 ml-8 text-black font-heebo-regular fz-18 leading-27 mb-26 single-blog-content">
				<?php echo the_content(); ?>
			</div>
		</div>
		<div class="mb-16 d-flex justify-content-between mx-auto bg-white flex-xl-row flex-column-reverse w-md-741 w-xl-1092 rounded-30 p-8">
			<div class="d-flex bg-white flex-column-reverse w-full w-md-600">
				<?php
				if (comments_open() || get_comments_number()) {
					comments_template();
				}
				?>
			</div>
			<?php
			$post_tags = get_the_tags($post->ID);
			if ($post_tags) :
			?>
				<div class="w-full w-xl-363">
					<h3 class="fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-bold mb-5">
						Tags
					</h3>
					<p class="font-heebo-regular fz-18 leading-27 text-theme-pewter">
						<?php
						$posttags = get_the_tags($post->ID);
						foreach ($posttags as $key => $value) : ?>
							<a class="font-heebo-regular text-theme-pewter text-uppercase text-decoration-none" href="<?php echo get_tag_link($value->term_id); ?>"><?php echo '#' . $value->name . ' ';?></a>
					<?php endforeach; ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
		<?php
		$posts = new WP_Query(
			array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'post__not_in' => array($post->ID)
			)
		);
		if ($posts->have_posts()) : ?>
			<div class="mx-auto w-md-741 w-xl-1092 mt-10">
				<h3 class="fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-bold mb-14">Recommended reading</h3>
				<div class="blogs-section mx-auto d-flex justify-content-center justify-content-md-between flex-wrap glific-blogs-container">
					<?php while ($posts->have_posts()) : $posts->the_post(); ?>
						<div class="w-285 mb-12 glific-blog">
							<?php $featured_image_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/dist/images/blog-delaut-image.svg'; ?>
							<div class="w-full h-169 bg-position-center bg-size-cover rounded-30" style="background-image: url('<?php echo $featured_image_url; ?>');">
							</div>
							<a href="<?php echo get_the_permalink(); ?>" class="text-decoration-none text-theme-mine-shaft">
								<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26 mt-6">
									<?php echo get_the_title(); ?>
								</h5>
							</a>
							<p class="font-heebo-regular fz-18 leading-27 mt-6">
								<?php echo wp_trim_words(get_the_content(), 13, '...'); ?>
							</p>
							<p class="font-heebo-regular fz-18 leading-27 mt-6">
								<?php echo strtoupper(get_the_date('F d, Y')); ?>
							</p>
						</div>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		<?php endif; ?>
		<div class="ml-6 ml-md-n5">
			<a class="glific-button-border bg-theme-secondary px-10 py-4 fz-18 leading-27 text-center mx-auto text-white font-heebo-bold text-decoration-none" href="<?php echo get_permalink(get_page_by_path('blogs')) ?>">Back to Blogs</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>
