<div class="modal fade module-modal bd-example-modal-lg" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl w-md-717 w-xl-805 max-w-full" role="document">
		<div class="modal-content page-contact rounded-30 mx-auto">
			<div class="d-flex justify-content-end pr-5 pt-5">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="contact-form bg-white p-8 rounded-30">
				<?php
				$demo_content = get_field('demo_content', 'option');
				if (!empty($demo_content)) : ?>
				<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 mb-8 mb-md-6 mb-xl-4"><?php echo $demo_content['text']; ?></h3>
				<p class="mb-6 fz-18 leading-27 font-heebo-regular text-theme-mine-shaft text-theme-mine-shaft">
					<?php echo $demo_content['content']; ?>
				</p>
				<?php endif; ?>
				<?php if (is_active_sidebar('glific_form_contact')) : ?>
					<div class="contact-form">
						<div class="form-group mb-md-0 list-unstyled">
							<div id="glific_form_demo" role="complementary">
								<?php dynamic_sidebar('glific_form_demo'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
