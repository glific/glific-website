<?php
/**
 * File functions.php for theme glific
 *
 * @package glific
 */

	get_header();
?>

<div class="homepage">
	<?php $cover_section = get_field('cover_section'); ?>
	<div class="bg-theme-primary d-flex flex-column flex-xl-row align-items-center justify-content-xl-center pt-22 pb-22">
		<div class="w-90p w-md-625 w-xl-534 mr-xl-18 pt-xl-18">
			<h3 class="text-white fz-28 leading-43 fz-md-36 font-heebo-regular"><?php echo $cover_section['content']; ?></h3>
			<div class="d-flex flex-column flex-xl-row justify-content-md-end justify-content-xl-start pr-7 mt-10.5 mt-md-9.5 mt-xl-13.5">
				<a class="glific-button-border bg-theme-secondary py-4 w-170 fz-18 leading-27 text-center text-white font-heebo-bold mr-md-8 text-decoration-none" data-toggle="modal" data-target="#demoModal"  href="#"><?php echo $cover_section['link_first']['text']; ?></a>
				<a class="glific-button-border bg-white  py-4 w-170 fz-18 leading-27 text-center text-theme-secondary font-heebo-bold text-decoration-none mt-md-10 mt-10.5 mt-xl-0"
					href="<?php echo $cover_section['link_second']['url']; ?>">
					<?php echo $cover_section['link_second']['text']; ?>
				</a>
			</div>
		</div>
		<div class="w-90p w-md-625 w-xl-427 mt-n12  mt-md-n42 ml-xl-18 mt-xl-0">
			<img src="<?php echo $cover_section['image']; ?>" class="w-full w-md-382 ml-md-auto d-block">
		</div>
	</div>
	<?php $demo_section = get_field('demo_section');
		if (!empty($demo_section)) : ?>
	<div class="demo-section d-flex flex-column flex-md-row justify-content-md-between w-90p w-md-660 w-xl-880 mx-auto py-26">
		<div class="d-flex flex-column w-md-298">
			<h3 class="text-theme-primary font-heebo-regular fz-28 fz-md-36 leading-40 mb-0"><?php echo $demo_section['heading']; ?></h3>
			<p class="fz-18 leading-27 mb-0 font-heebo-regular text-theme-pewter mt-6"><?php echo $demo_section['sub_heading']; ?></p>
		</div>
		<div class="embed-responsive embed-responsive-16by9 border-3-pewter rounded-29 w-full w-md-336 w-xl-502 h-240 h-xl-362 mt-6 mt-md-0">
  			<iframe class="embed-responsive-item" src="<?php echo $demo_section['video']; ?>" allowfullscreen></iframe>
		</div>
	</div>
	<?php endif ; ?>

	<?php $glific_section = get_field('why_glific');
		if (!empty($glific_section )) : ?>
		<div class="why-glific pb-18 pb-md-23 pb-xl-26">
			<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 text-center mb-6 mb-md-14 mb-xl-18"><?php echo $glific_section['heading']; ?></h3>
			<div class="w-288 w-md-664 w-xl-878 mx-auto d-flex flex-column flex-md-row flex-md-wrap justify-content-md-between">
			<?php foreach ($glific_section['sections'] as $key => $section) :
				switch ($key) {
					case '0':
						$border_class = 'rounded-top-20 rounded-bottom-left-20';
						break;
					case '1':
						$border_class = 'rounded-top-20 rounded-bottom-right-20';
						$img_class = 'w-80';
						break;
					case '2':
						$border_class = 'rounded-bottom-20 rounded-top-left-20';
						break;
					case '3':
						$border_class = 'rounded-bottom-20 rounded-top-right-20';
						break;
				}
				?>
				<div class="d-flex flex-column flex-xl-row w-full w-md-310 w-xl-380 mb-10 justify-content-xl-between">
					<div>
						<img src="<?php echo $section['image'] ; ?>" class="h-md-90 <?php echo $img_class ; ?>">
					</div>
					<div class="d-flex flex-column mt-4 mt-xl-0 w-xl-266">
						<div class="border border-theme-primary border-5 py-4 px-5 d-flex flex-row position-relative bg-theme-gin <?php echo $border_class ; ?>">
							<h5 class="font-heebo-medium fz-21 leading-31 fz-xl-24 leading-xl-35 text-theme-mine-shaft"><?php echo $section['text'] ; ?></h5>
							<img src="<?php echo $section['sub_image'] ; ?>" class="mt-auto position-absolute right-0 bottom-0 mr-7 mb-5">
						</div>
						<div class="mt-4 mt-6 fz-18 leading-27 font-heebo-regular text-theme-mine-shaft pl-xl-6 text-theme-mine-shaft"><?php echo $section['content'] ; ?></div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php $key_features = get_field('key_features');
		if (!empty($key_features)) : ?>
	<div class="key-features bg-theme-gin pt-10 pt-md-16 pt-xl-18 pb-xl-4 pb-md-14 pb-10 box-shadow-dark-20">
		<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 text-center mb-6 mb-md-14 mb-xl-18"><?php echo $key_features['heading']; ?></h3>

		<div class="d-flex flex-column w-90p mx-auto w-md-737 w-xl-1044">
			<?php foreach ($key_features['sections'] as $key => $section) :
				switch ($key) {
					case '0':
						$class = 'rounded-top-30 rounded-bottom-right-30 pr-xl-20';
						break;
					case '1':
						$class = 'rounded-bottom-30 rounded-top-left-30 pl-xl-16 pr-xl-12';
						$img_class = 'w-80';
						break;
					case '2':
						$class = 'rounded-top-30 rounded-bottom-right-30 pr-xl-24';
						break;
					case '3':
						$class = 'rounded-bottom-30 rounded-top-left-30 pr-xl-12';
						break;
				}
				?>
			<div class="d-flex flex-column bg-white align-items-center px-7 mb-10 mb-xl-18 py-9 justify-content-md-between w-xl-936 <?php echo $class; ?> <?php echo $key % 2 == 0 ? 'flex-md-row-reverse' : 'flex-md-row ml-xl-auto' ;?>">
				<div class="h-138 w-md-238 w-xl-320">
					<img src="<?php echo $section['image'] ; ?>" class="h-full w-md-full">
				</div>
				<div class="d-flex flex-column w-md-384 w-xl-427 mt-6 mt-md-0">
					<h5 class="font-heebo-medium fz-24 leading-35"><?php echo $section['heading'] ; ?></h5>
					<p class="font-heebo-regular fz-18 leading-27 mb-0 mt-6"><?php echo $section['content'] ; ?></p>
				</div>
			</div>
			<?php endforeach ; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php $early_adopters = get_field('early_adopters');
		if (!empty($early_adopters )) : ?>
		<div class="bg-theme-white-smoke d-flex flex-column py-26 mt-3.5">
			<div class="w-90p w-md-641 w-xl-840 mx-auto">
				<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 mb-6"><?php echo $early_adopters['heading']; ?></h3>
				<p class="mb-0 font-heebo-regular fz-18 leading-27"><?php echo $early_adopters['sub_heading']; ?></p>
			</div>
			<?php if (!empty($early_adopters ['npo_logos'])) : ?>
			<div class="d-flex flex-row w-90p w-md-641 w-xl-840 mx-auto justify-content-center mt-10">
				<?php foreach ($early_adopters ['npo_logos'] as $key => $logo) :?>
					<div class="w-54 w-md-108 mx-4 mx-md-6">
						<img src="<?php echo $logo['image'] ; ?>" class="w-full">
					</div>
				<?php endforeach;  ?>
			</div>
			<?php endif; ?>
			<?php if (!empty($early_adopters ['users_saying'])) : ?>
				<div id="user_satying" class="carousel slide w-90p w-md-641 w-xl-840 mx-auto mt-12" data-ride="carousel">
					<h5 class="font-heebo-bold fz-24 leading-35">What users are saying</h5>
					<div class="carousel-inner">
						<?php foreach ($early_adopters ['users_saying'] as $key => $saying) : ?>
							<div class="carousel-item <?php echo $key ==0 ? 'active' : ''; ?>">
								<div class="d-md-flex flex-md-row justify-content-md-between">
									<div>
										<p class="mb-0 fz-18 leading-28 text-theme-pewter font-heebo-bold"><?php echo $saying['person_name']; ?></p>
								 		<p class="font-heebo-regular fz-18 leading-27 mb-0"><?php echo $saying['name']; ?></p>
								 	</div>
								 	<div class="w-257 w-md-384 w-xl-536 mt-6 d-none d-md-block fz-18 leading-27 font-heebo-regular">
								 		<div class="user-bg w-60 h-52 position-absolute top-n4"></div>
										<?php echo $saying['content']; ?>
									</div>
								</div>
								<div class="w-257 mx-auto mt-6 d-md-none fz-18 leading-27 font-heebo-regular">
									<div class="user-bg w-60 h-52 position-absolute top-13"></div>
										<?php echo $saying['content']; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<?php if (sizeof($early_adopters ['users_saying']) > 1) : ?>
					<a class="carousel-control-prev" href="#user_satying" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#user_satying" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif ; ?>

	<?php $know_more = get_field('know_more');
		if (!empty($know_more)) : ?>
		<div class="d-flex flex-column w-full mx-auto bg-theme-white-smoke pb-26">
			<div class="d-flex flex-row bg-white box-shadow-dark-10 mt-10 w-90p w-md-full p-6 ml-auto mr-md-0 justify-content-center align-items-md-center align-items-start d-md-none rounded-top-left-30 rounded-bottom-left-30 rounded-md-0 rounded-xl-top-right-30">
				<h5 class="w-150 w-md-auto mr-md-21 font-heebo-medium fz-24 leading-35 mb-6"><?php echo $know_more['whatsapp']['text'] ; ?></h5>
				<a class="glific-button-border bg-theme-secondary w-156 py-4 w-md-170 fz-18 leading-27 text-center text-white font-heebo-bold mt-6 text-decoration-none mt-md-0"
					href="<?php echo $know_more['whatsapp']['button']['url'] ; ?>">
					<?php echo $know_more['whatsapp']['button']['link'] ; ?></a>
			</div>
			<div class="d-flex flex-column flex-md-row mt-md-10">
				<div class="w-md-half mr-md-6 d-xl-flex flex-xl-column">
					<div class="d-md-flex flex-column bg-white box-shadow-dark-10 mt-10 w-90p w-md-full p-6 mr-auto mr-md-0 justify-content-center align-items-center d-none w-xl-full ml-xl-auto mt-md-0 p-xl-10 rounded-md-top-right-30">
						<div class="w-xl-432 ml-xl-auto">
							<h5 class="w-150 w-md-auto font-heebo-medium fz-24 leading-35 mb-6"><?php echo $know_more['whatsapp']['text'] ; ?></h5>
							<a class="glific-button-border bg-theme-secondary w-156 py-4 w-md-170 fz-18 leading-27 text-center text-white font-heebo-bold mt-6 text-decoration-none mt-md-0 d-block"
								href="<?php echo $know_more['whatsapp']['button']['url'] ; ?>">
								<?php echo $know_more['whatsapp']['button']['link'] ; ?></a>
						</div>
					</div>
					<div class="bg-white d-flex flex-column box-shadow-dark-10 mt-10 w-90p w-md-full p-6 mr-auto ml-md-0 w-xl-full ml-xl-auto p-xl-10 rounded-top-right-30 rounded-bottom-right-30 rounded-md-top-right-0">
						<div class="w-md-345 w-xl-432 mx-md-auto ml-xl-auto mr-xl-0">
							<h5 class="font-heebo-medium fz-24 leading-35 mb-6"><?php echo $know_more['open_source']['text'] ; ?></h5>
							<p class="mb-0 font-heebo-regular fz-18 leading-27 mb-6"><?php echo $know_more['open_source']['content'] ; ?></p>
							<a class="glific-button-border bg-theme-primary py-4 w-170 fz-18 leading-27 text-center text-white font-heebo-bold mt-6 text-decoration-none mt-md-0 d-block"
								href="<?php echo $know_more['open_source']['button']['url'] ; ?>">
								<?php echo $know_more['open_source']['button']['link'] ; ?></a>
						</div>
					</div>
				</div>
				<div class="d-flex flex-column bg-white box-shadow-dark-10 mt-10 mt-md-0 w-90p p-6 ml-auto mr-md-0 w-md-half ml-md-6 p-xl-10 rounded-top-left-30 rounded-bottom-left-30 rounded-xl-top-left-0">
					<div class="w-xl-432 mr-xl-auto h-full d-flex flex-column">
						<h5 class="font-heebo-medium fz-24 leading-35 mb-6"><?php echo $know_more['managed_solutions']['heading'] ; ?></h5>
						<p class="fz-18 leading-27 font-heebo-regular mb-0"><?php echo $know_more['managed_solutions']['sub_heading'] ; ?></p>
						<a href="<?php echo $know_more['managed_solutions']['tides_link'] ; ?>" target="_blank" class="mt-xl-9 w-100 w-md-150 w-xl-170 my-9">
							<img src="<?php echo $know_more['managed_solutions']['image'] ; ?>" class="w-full">
						</a>
						<div class="mt-auto fz-18 leading-27 font-heebo-regular"><?php echo $know_more['managed_solutions']['content'] ; ?></div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="page-contact bg-theme-white-smoke pb-28 pb-md-26">
		<div class="contact-form bg-white w-90p w-md-717 w-xl-805 mx-auto rounded-30 p-8">
			<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 leading-40 mb-0 mb-8 mb-md-6 mb-xl-4"><?php echo get_field('contact_page_title'); ?></h3>
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
	</div>
</div>
<?php
	get_footer();
