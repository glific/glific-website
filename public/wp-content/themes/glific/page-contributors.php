<?php

/**
 * Page contact for theme glific
 *
 * @package glific
 */
	get_header();
?>
<div class="page-contributors">
	<?php $cover_section = get_field('cover_section');
	if (!empty($cover_section)) : ?>
		<div class="pt-17">
			<h1 class="text-center fz-28 leading-40 fz-xl-36 leading-40 font-heebo-black text-theme-primary mb-0"><?php echo $cover_section['heading']; ?></h1>
			<div class="font-heebo-regular fz-18 leading-28 w-328 w-md-615 mx-auto mt-6 text-center">
				<?php echo $cover_section['sub_heading']; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php $contributors = get_field('contributors');
	if (!empty($contributors)) : ?>
		<div class="d-flex flex-wrap w-320 w-md-648 w-xl-972 mx-auto mt-16">
			<?php foreach ($contributors as $key => $contributor) : ?>
				<div class="d-flex flex-column w-288 mx-auto border border-5 border-theme-primary mx-md-6.5 rounded-bottom-20 rounded-top-left-20 p-7 bg-theme-gin mb-11">
					<div>
						<img class="h-72" src="<?php echo $contributor['logo'] ; ?>">
					</div>
					<h3 class="mt-8 fz-24 leading-28 font-heebo-black text-theme-primary"><?php echo $contributor['title'] ; ?></h3>
					<p class="mt-5 fz-18 leading-22 font-heebo-regular text-theme-primary mb-0"><?php echo $contributor['content'] ; ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
<?
get_footer();
