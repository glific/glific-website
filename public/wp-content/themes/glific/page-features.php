<?php
/**
 * Features page for the theme glific
 *
 * @package coloredcow
 */

	get_header();
	$demo_videos = get_field('demo_videos');
?>
<div class="features-page">
	<?php if (!empty($demo_videos)) : ?>
	<div class="demo-videos pt-18">
		<h3 class="text-theme-primary fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-bold text-center mb-10 mb-xl-14 mb-xl-19"><?php echo $demo_videos['heading']; ?></h3>
		<div class="demo-section bg-theme-pewter pt-26 pb-18 pb-md-28">
			<div class="d-flex flex-column flex-md-row w-328 w-md-641 w-xl-1108 mx-auto justify-content-md-between">
				<?php foreach ($demo_videos['videos'] as $key => $video) :
				?>
				<div class="d-flex flex-column">
					<div class="h-200 w-md-432 h-md-264 w-xl-747 h-xl-456 video-content-block flex-column position-relative selected-video-container single-video-block <?php echo $key > 0 ? 'd-none' : 'd-flex'; ?>" id="<?php echo "video-$key" ;?>">
						<?php
						$embeded_video_url = get_youtube_embed_url($video['video']);
						if($key == 0) : ?>
							<h3 class="fz-24 leading-35 text-theme-mine-shaft font-heebo-medium position-absolute top-n12 top-xl-n17 ml-md-8">Latest demo video</h3>
						<?php endif; ?>
						<iframe class="embed-responsive-item w-full rounded-30 h-full border-0" src="<?php echo $embeded_video_url; ?>" allowfullscreen></iframe>
						<h5 class="font-heebo-bold fz-16 leading-24 fz-md-18 leading-md-27 mt-4 mb-0  position-absolute left-0 bottom-n9 bottom-md-n11 bottom-xl-n12 ml-5 selected-video-title"><?php echo $video['name']; ?></h5>
						<p class="font-heebo-regular fz-16 leading-24 fz-md-18 leading-md-27 mb-0 text-right mr-xl-10 mt-6 mt-xl-7 position-absolute right-0 bottom-n9 bottom-md-n11 mr-5 bottom-xl-n12 selected-video-duration"><?php echo $video['time']; ?></p>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="d-flex flex-row flex-md-column h-md-264 w-full w-md-182 w-xl-315 h-xl-456 overflow-auto mx-auto mx-md-0 mt-15 box-shadow-dark-inset-10 py-10 align-items-md-center pt-md-6 mt-md-0 ml-md-auto">
					<?php foreach ($demo_videos['videos'] as $key => $video) :
						$video_thumbnail = get_thumbnail_from_youtube_video($video['video']);
						$video_id = get_youtube_video_id($video['video']);
					?>
					<div class="d-block h-auto flex-column mx-4 mx-md-0 w-124 w-xl-214 mb-md-6 mb-xl-13 single-video c-pointer position-relative h-full single-video-container" data-target="<?php echo $video_id ; ?>">
						<img src="<?php echo $video_thumbnail ; ?>" class="w-124 h-80 h-xl-136 w-xl-full border-0 rounded-15 d-block">
						<h5 class="font-heebo-bold fz-12 leading-18 mt-4 mb-0 video-title"><?php echo $video['name']; ?></h5>
						<p class="font-heebo-regular fz-12 leading-18 mb-0 mt-xl-7 text-left video-duration"><?php echo $video['time']; ?></p>
						<div class="w-20 w-xl-35 position-absolute ml-15 ml-xl-24 top-8.5 top-xl-16">
							<?php echo file_get_contents(get_template_directory(). '/dist/images/play-button.svg') ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php $features_section = get_field('features');
	if (!empty($features_section)) : ?>
	<div class="features-section pt-18 py-md-26">
		<h3 class="text-theme-primary fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-bold text-center mb-26"><?php echo $features_section['heading']; ?></h3>
		<div class="w-328 w-md-752 w-xl-1054 mx-auto">
		<?php foreach( $features_section['sections'] as $key => $section ) :
			if ( $key%2 == 0 ) {
				$border_class = 'rounded-bottom-left-30';
				$class ="flex-xl-row";
			} else {
				$border_class = 'rounded-bottom-right-30';
				$class ="flex-xl-row-reverse";
			}
		?>
			<div class="d-flex flex-column mb-18 justify-content-xl-between <?php echo $class ; ?>">
				<div class="rounded-30">
					<img src="<?php echo $section['image'] ; ?>" class="w-full w-md-510 rounded-30">
				</div>
				<div class="mt-6 mt-xl-0 rounded-top-30 bg-theme-secondary border-7 border-theme-primary border p-7.5 px-md-10 py-md-6 w-md-512 ml-md-auto ml-xl-0 h-md-242 <?php echo $border_class ; ?>">
					<h5 class="font-heebo-medium fz-24 leading-35 text-white mb-0"><?php echo $section['content']['heading'] ;?></h5>
					<p class="font-heebo-regular fz-18 leading-27 text-white mb-0 mt-6"><?php echo $section['content']['content'] ;?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php
	get_footer();
