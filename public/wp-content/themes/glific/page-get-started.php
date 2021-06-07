<?php

/**
 * Get Started page for the theme
 *
 * @package glific
 */
get_header();
$main_heading = get_field( 'main_heading' );
?>

<div class="d-flex flex-column main-container bg-theme-white-smoke font-heebo-regular">
	<?php if ( ! empty( $main_heading ) ) : ?>
		<div class="justify-content-between w-320 w-md-310 mx-auto pt-18 pt-md-18 ">
			<h1 class="font-heebo-black fz-28 leading-40 fz-md-36 text-theme-primary text-center"><?php echo $main_heading['title']; ?></h1>
		</div>
		<div class="justify-content-between w-320 w-md-615 pt-5 mx-auto pb-md-13.5 pb-11.5">
			<div class="fz-18 text-theme-primary text-center"><?php echo $main_heading['sub_title']; ?></div>
		</div>
	<?php endif; ?>
	<div class="subsection-container d-flex flex-column w-md-720 mx-auto mb-16">
		<?php
		$primary_section_data = get_field( 'primary_section' );
		if ( ! empty( $primary_section_data ) ) :
			foreach ( $primary_section_data as $key => $data ) :
				$primary_count_index = $key >= 9 ? '' : 0;
				?>
				<div class="flex-column flex-md-row d-flex justify-content-between mb-13.5 mb-xl-18 mb-md-20 align-items-start">
					<?php
					if ( $key % 2 === 1 ) :
						?>
						<img class="mb-9 mb-md-0 d-md-none" src="<?php echo $data['image']['url']; ?>" />
						<div class="mr-md-17 w-300 mx-auto">
							<h2 class="font-weight-light text-theme-primary mb-8"><?php echo $data['title']; ?></h2>
							<div class="content fz-18 mb-6 text-theme-pewter"><?php echo $data['content']; ?></div>
							<div class="fz-18 read-more text-theme-secondary font-weight-medium c-pointer"> Read more</div>
						</div>
						<img class="mb-9 mb-md-0 d-none d-md-block" src="<?php echo $data['image']['url']; ?>" />
						<?php
					else :
						?>
						<img class="mb-9 mb-md-0" src="<?php echo $data['image']['url']; ?>" />
						<div class="ml-md-17 w-300 mx-auto">
							<h2 class="font-weight-light text-theme-primary mb-8"><?php echo $data['title']; ?></h2>
							<div class="fz-18 content mb-6 text-theme-pewter"><?php echo $data['content']; ?></div>
							<div class="fz-18 read-more text-theme-secondary font-weight-medium c-pointer"> Read more</div>
						</div>
						<?php
					endif;
					?>
				</div>
				<?php
			endforeach;
		endif;
		?>
	</div>

	<div class="subsection-container d-flex flex-column w-xl-856 w-md-720 w-320 mx-auto mb-20">
	<h1 class="font-heebo-black fz-24 leading-40 fz-md-24 text-theme-primary text-center mb-8">Latest case study</h1>
	<div>
<?php
	$posts = new WP_Query(
		array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
		)
	);
	if ( $posts->have_posts() ) :
		?>
		<div class="d-flex flex-column-reverse flex-md-row  mx-auto  mx-md-6.5  rounded-top-30 rounded-bottom-left-30 box-shadow-light-10 p-10 mb-11 bg-white ">
			<?php
			while ( $posts->have_posts() ) :
				$posts->the_post();
				?>
			<div class="w-md-half w-full">			
						<h5 class="font-weight-light fz-36 leading-xl-35 leading-26 mt-6 text-theme-primary mb-8">
							<?php echo get_the_title(); ?>
						</h5>
						<a class="font-weight-medium fz-18 text-theme-secondary" href="<?php echo get_the_permalink(); ?>">Read case study</a>					
			</div>

					<?php $featured_image_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/dist/images/blog-delaut-image.svg'; ?>
					<div class="w-md-half w-full h-214 bg-position-center bg-size-cover rounded-30" style="background-image: url('<?php echo $featured_image_url; ?>');">					
					</div>			
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			?>
			<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26 mt-6 text-center mb-0 text-theme-primary">No case studies!</h5>
		</div>
	<?php endif; ?>
	</div>
	</div>



</div>

<?php
get_footer(); ?>
