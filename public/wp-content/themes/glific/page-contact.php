<?php

/**
 * Page contact for theme glific
 *
 * @package glific
 */

get_header();
?>
<div class="page-contact bg-theme-white-smoke pb-26">
	<div class="pt-10 pt-md-16 pt-xl-18 pb-xl-4 pb-md-14 pb-10">
		<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 text-center mb-6 mb-md-14 mb-xl-18"><?php echo get_field('contact_page_title'); ?></h3>
	</div>
	<div class="contact-form bg-white w-90p w-md-717 w-xl-805 mx-auto rounded-30 p-8">
		<p class="mb-6 fz-18 leading-27 font-heebo-regular text-theme-mine-shaft text-theme-mine-shaft">
			<?php echo get_field('contact_page_tagline'); ?>
		</p>
		<?php if (is_active_sidebar('glific_form_contact')) : ?>
			<div class="contact-form">
				<div class="form-group mb-md-0 list-unstyled">
					<div id="glific_form_contact" role="complementary">
						<?php dynamic_sidebar('glific_form_contact'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<?php
	$get_help_section = get_field('contact_get_help_section');
	if (!empty($get_help_section)) :
	?>
		<div class="get-help-quickly py-26">
			<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 text-center mb-6 mb-md-14 mb-xl-10"><?php echo $get_help_section['contact_get_help_title']; ?></h3>
			<div class="w-90p w-md-738 w-xl-1106 d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-between mx-auto">
				<div class="w-90p w-md-235 h-285 w-xl-358 h-xl-258 bg-white rounded-30 p-6 p-xl-10 box-shadow-dark-10 position-relative">
					<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
						<?php echo $get_help_section['development_and_design_title']; ?>
					</h5>
					<div class="position-absolute bottom-8 d-flex flex-column bottom-1">
						<a class="glific-button-border bg-theme-primary py-4.5 px-9 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none mt-5 mb-5" target="_blank" href="<?php echo $get_help_section['discord_link']; ?>">
							<?php echo $get_help_section['discord_title']; ?>
						</a>
						<a class="glific-button-border bg-theme-secondary py-4.5 px-9 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none" target="_blank" href="<?php echo $get_help_section['book_a_demo_link']; ?>">
							<?php echo $get_help_section['book_a_demo_title']; ?>
						</a>
					</div>
				</div>
				<div class="my-6 w-90p w-md-235 h-285 w-xl-358 h-xl-258 bg-white rounded-30 p-6 p-xl-10 box-shadow-dark-10 position-relative">
					<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
						<?php echo $get_help_section['for_ngos_title']; ?>
					</h5>
					<p class="font-heebo-regular fz-18 leading-27 mt-6">
						<?php echo $get_help_section['for_ngos_tagline']; ?>
					</p>
					<a class="position-absolute bottom-8 glific-button-border bg-theme-secondary py-4.5 px-9 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none mt-3" target="_blank" href="<?php echo $get_help_section['linkedin_link']; ?>">
						<?php echo $get_help_section['linkedin_title']; ?>
					</a>
				</div>
				<div class="my-md-0 w-90p w-md-235 h-285 w-xl-358 h-xl-258 bg-white rounded-30 p-6 p-xl-10 box-shadow-dark-10 position-relative">
					<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
						<?php echo $get_help_section['connect_with_us_title']; ?>
					</h5>
					<p class="font-heebo-regular fz-18 leading-27 mt-6">
						<?php echo $get_help_section['connect_with_us_tagline']; ?>
					</p>
					<a class="position-absolute bottom-8 glific-button-border bg-theme-secondary py-4.5 px-9 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none mt-3" target="_blank" href="<?php echo $get_help_section['whatsapp_us_link']; ?>">
						<?php echo $get_help_section['whatsapp_title']; ?>
					</a>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php
get_footer();