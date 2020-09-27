<?php

/**
 * Template for displaying single posts
 *
 * @package glific
 */

get_header(); ?>

<div class="single-blog" style="background-color: #F7F7F7">

	<div class="blog-banner w-full h-354 h-md-517 h-xl-585 py-26 px-24 mb-10 bg-theme-bottle-green"></div>

	<div class="w-90p mt-md-n500 mt-n350 mx-auto max-w-360 max-w-xl-1010 max-w-md-765">

		<div class="text-white pl-9">
			<p class="font-heebo-bold fz-18 leading-27 mb-4.5">
				<?php echo strtoupper(get_the_date('F d, Y')); ?>
			</p>
			<h3 class="fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-regular mb-5">
				<?php echo get_the_title(); ?>
			</h3>
			<p class="font-heebo-regular fz-18 leading-27">
				<img src="<?php echo get_avatar_url($post->post_author); ?>" class="w-40 h-40 rounded-circle mr-5" />
				By <?php echo get_the_author_meta('display_name', $post->post_author); ?>
			</p>
		</div>
		<?php $featured_image_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/dist/images/blog-delaut-image.svg'; ?>
		
		<div class="w-90p h-200 w-md-741 h-md-451 w-xl-1092 h-xl-641 mx-auto bg-position-center bg-size-cover rounded-30" style="background-image: url(<?php echo $featured_image_url; ?>);"></div>

		<div class="d-flex w-md-741 w-xl-1092 flex-column flex-md-row-reverse" style="flex-direction: row-reverse; justify-content: space-between;">

			<div class="mt-9 mt-md-15 w-full w-md-50 d-flex flex-column align-items-center">
				
				<p class="font-heebo-regular fz-18 leading-27 mb-5">Share</p>

				<div class="d-flex justify-content-between align-items-center flex-row flex-md-column">

					<div class="w-40 h-40 mb-7 rounded-circle text-white">
						<a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink()); ?>&t=<?php echo get_the_title(); ?>">
							<?php echo file_get_contents(get_template_directory() . '/dist/images/fb-icon.svg'); ?>
						</a>
					</div>

					<div class="w-40 h-40 mb-7 rounded-circle mx-7 mx-md-auto">
						<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink()); ?>&title=Volunteering%20Story&summary=<?php echo get_the_title(); ?>">
							<?php echo file_get_contents(get_template_directory() . '/dist/images/twitter-icon.svg'); ?>
						</a>
					</div>

					<div class="w-40 h-40 mb-7 rounded-circle">
						<a target="_blank" href="https://twitter.com/share?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo get_the_title(); ?>">
							<?php echo file_get_contents(get_template_directory() . '/dist/images/linkedin-icon.svg'); ?>
						</a>
					</div>

				</div>

			</div>
			<div class="w-90p w-md-615 mt-4 mt-md-15 ml-8 text-black font-heebo-regular fz-18 leading-27 mb-26">
				<?php echo the_content(); ?>
			</div>
		</div>
		<div class="d-flex justify-content-between mx-auto bg-white w-md-741 w-xl-1092" style="border-radius: 30px; padding: 25px;">
			<div class="d-flex bg-white flex-column-reverse">
				<?php
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>
			</div>
			<div class="w-363">
				<h3 class="fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-bold mb-5">
					Tags
				</h3>
				<p class="font-heebo-regular fz-18 leading-27 text-theme-pewter">
					#TECH4GOOD #66A #ANALYTICS #ARCHITECTURE #AVNI #CONFERENCE #CORONAVIRUS #COVID-19 #CRM-PLATFORM #DATAEXPLORER #DESIGN #RESEARCH #DISCOUNTS
				</p>
			</div>	
		</div>
	</div>
</div>

<?php get_footer(); ?>