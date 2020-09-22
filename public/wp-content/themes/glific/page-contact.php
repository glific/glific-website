<?php
/**
 * Page contact for theme coloredcow
 *
 * @package coloredcow
 */

	get_header();
?>

<div class="page-contact bg-theme-white-smoke pb-26">
	<div class="pt-10 pt-md-16 pt-xl-18 pb-xl-4 pb-md-14 pb-10">
		<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 text-center mb-6 mb-md-14 mb-xl-18">Write to us</h3>
	</div>
	<div class="contact-form bg-white w-90p w-md-717 w-xl-805 mx-auto rounded-30 p-8">
		<p class="mb-6 fz-18 leading-27 font-heebo-regular text-theme-mine-shaft text-theme-mine-shaft">
			If you have any queries, features suggestions, or want to discuss how Glific is right for you, please drop a message and we’ll get back to you soon.
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
	<div class="get-help-quickly pt-10 pt-md-16 pt-xl-26 pb-xl-4 pb-md-14 pb-10">
		<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 text-center mb-6 mb-md-14 mb-xl-10">Get help quickly</h3>
		
		<div class="w-90p w-md-738 w-xl-1106 d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-between mx-auto">

			<div class="w-90p w-md-235 h-285 w-xl-358 h-xl-258 bg-white rounded-30 p-6 p-xl-10 card-shadow position-relative">
				<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
					For the development and design community
				</h5>
				<div class="position-absolute bottom-8 d-flex flex-column bottom-1">
					<a class="glific-button-border bg-theme-primary py-4 px-2 w-190 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none mt-5 mb-5" href="">Glific on Discord</a>
					<a class="glific-button-border bg-theme-secondary py-4 px-2 w-190 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none px-6" href="">Book a demo</a>
				</div>
			</div>	

			<div class="my-6 w-90p w-md-235 h-285 w-xl-358 h-xl-258 bg-white rounded-30 p-6 p-xl-10 card-shadow position-relative">
				<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
					For NGOs
				</h5>
				<p class="font-heebo-regular fz-18 leading-27 mt-6">
					Stay connected for updates and post queries on our Tech4Dev channel
				</p>
				<a class="position-absolute bottom-8 glific-button-border bg-theme-secondary w-190 px-6 py-4 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none mt-3" href="">LinkedIn</a>
			</div>

			<div class="my-md-0 w-90p w-md-235 h-285 w-xl-358 h-xl-258 bg-white rounded-30 p-6 p-xl-10 card-shadow position-relative">
				<h5 class="font-heebo-medium fz-24 leading-xl-35 leading-26">
					Connect with us directly
				</h5>
				<p class="font-heebo-regular fz-18 leading-27 mt-6">
					Send us a message by opting in to our Glific WhatsApp number directly.
				</p>
				<a class="position-absolute bottom-8 glific-button-border bg-theme-secondary w-190 px-6 py-4 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none mt-3" href="">WhatsApp us</a>
			</div>
		</div>	
	</div>
</div>	
<?php
	get_footer();