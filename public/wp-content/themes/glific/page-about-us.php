<?php

/**
 * Page About us for theme glific
 *
 * @package glific
 */

get_header();
?>
<div class="page-about-us">
	<div class="pb-26 pt-14 pt-md-18 bg-theme-white-smoke">
		<h1 class="text-center fz-28 leading-40 fz-xl-36 leading-40 font-heebo-bold text-theme-primary mb-10 mb-md-14 mb-xl-18"><?php echo get_the_title(); ?></h1>
		<?php $cover_content = get_field('cover_content');
			if (!empty($cover_content)) : ?>
		<div class="font-heebo-regular fz-18 leading-27 w-328 mx-auto w-md-674 w-xl-830"><?php echo $cover_content ; ?> </div>
			<?php endif; ?>
	</div>
	<?php $team_section = get_field('team_section');
		if (!empty($team_section)) : ?>
	<div class="bg-theme-gin pt-10 pt-md-14 box-shadow-dark-20 mb-4">
		<h1 class="text-center fz-28 leading-40 fz-xl-36 leading-40 font-heebo-bold text-theme-primary mb-10 mb-md-14 mb-xl-18">Our Team</h1>
		<div class="d-flex flex-wrap w-328 w-md-688 w-xl-1100 mx-auto justify-content-between">
			<?php foreach ($team_section as $key => $team) : ?>
			<div class="w-156 w-md-250 d-flex flex-column mb-6 mb-xl-22">
				<img src="<?php echo $team['image'] ; ?>" class="w-100 w-md-165 rounded-20">
				<div class="w-156 w-md-224 team-bg-image bg-no-repeat pt-4.5 pb-6 pt-md-5 pb-md-8 ml-md-auto mt-n5 mt-md-n7 bg-size-cover">
					<p class="mb-0 font-heebo-medium fz-16 leading-24 fz-md-24 leading-md-35 text-center w-md-209 ml-md-5 ml-xl-6 text-center ml-4"><?php echo $team['name'] ; ?></p>
				</div>
			</div>
			<?php endforeach ; ?>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php
get_footer();
