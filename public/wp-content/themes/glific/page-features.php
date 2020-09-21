<?php
/**
 * File functions.php for theme coloredcow
 *
 * @package coloredcow
 */

	get_header();
?>

<?php $features_section = get_field('features');
	if (!empty($features_section)) : ?>
	<div class="features-section">
		<h3 class="text-theme-primary fz-28 leading-33 fz-xl-36 leading-xl-43 font-heebo-bold text-center mb-26"><?php echo $features_section['heading']; ?></h3>
		<div class="w-328 w-md-752 w-xl-1054 mx-auto">
			<?php foreach( $features_section['sections'] as $key => $section ) :
				if ( $key%2 == 0 ) {
					$border_class = 'rounded-bottom-left-30';
					$class ="flex-xl-row";
				}else{
					$border_class = 'rounded-bottom-right-30';
					$class ="flex-xl-row-reverse";
				}
			?>
			<div class="d-flex flex-column mb-18 justify-content-xl-between <?php echo $class ; ?>">
				<div class="rounded-30">
					<img src="<?php echo $section['image'] ; ?>" class="w-full w-md-510">
				</div>
				<div class="mt-6 mt-xl-0 rounded-top-30 bg-theme-secondary border-5 border-theme-primary border p-6 w-md-512 ml-md-auto ml-xl-0 h-md-242 <?php echo $border_class ; ?>">
					<h5 class="font-heebo-medium fz-24 leading-35 text-white mb-0"><?php echo $section['content']['heading'] ;?></h5>
					<p class="font-heebo-regular fz-18 leading-27 text-white mb-0 mt-6"><?php echo $section['content']['content'] ;?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
<?php
	get_footer();
