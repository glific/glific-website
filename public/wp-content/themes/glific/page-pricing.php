<?php

/**
 * Pricing page for the theme glific
 *
 * @package glific
 */
get_header();
$cover_content = get_field('cover_content');
?>
<div class="page-pricing pb-26 pt-14 pt-md-18 bg-theme-white-smoke">
	<h1 class="text-center fz-28 leading-40 fz-xl-36 leading-40 font-heebo-bold text-theme-primary"><?php echo get_the_title(); ?></h1>
	<?php $cover_content = get_field('cover_content');
	if(!empty($cover_content)) : ?>
	<div class="font-heebo-regular fz-18 leading-28 w-328 w-md-641 w-xl-830 mx-auto mt-10 mt-md-14 mt-xl-18">
		<?php echo $cover_content ; ?>
	</div>
	<?php endif;
	$details = get_field('details');
	if(!empty($details)) : ?>
	<div class="bg-white w-328 w-md-689 w-xl-900 mx-auto p-6 p-md-8 rounded-30 box-shadow-dark-20 mt-26">
	<?php foreach ($details  as $key => $detail) : ?>
		<div class="d-flex flex-column <?php echo $key == count( $details ) - 1 ? '' : 'mb-10 mb-xl-14' ; ?>">
			<h5 class="font-heebo-medium fz-24 leading-35 mb-0"><?php echo $detail['heading']; ?></h5>
			<div class="font-heebo-regular fz-18 leading-27 mb-0 mt-6"><?php echo $detail['content']; ?></div>
		</div>
	<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>
<?php
	get_footer();
