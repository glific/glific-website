<?php
/**
 * Footer for the theme
 *
 * @package coloredcow
 */

?>
	<footer class="d-flex flex-column flex-md-row justify-content-center align-items-center py-10 bg-theme-primary py-xl-22">
		<div class="d-flex flex-column mr-xl-33">
			<div  class="d-flex flex-row w-190 mx-auto mx-md-0">
				<div class="h-58">
					<?php echo file_get_contents(get_template_directory(). '/dist/images/glific_logo.svg') ?>
				</div>
				<p class="mb-0 fz-12 leading-18 font-heebo-regular text-white">Two way communication for NGOs</p>
			</div>
			<div class="d-flex flex-md-wrap font-heebo-regular fz-14 leading-18 mt-6 mt-xl-11 w-md-190">
				<span class="text-theme-pewter">A </span>
				<span class="text-white mx-3"><a href="https://chintugudiya.org/tech4dev/" target="_blank" class="text-decoration-none text-white">Tech4Dev</a></span>
				<span class="text-theme-pewter">initiative by </span>
				<span class="text-white ml-3"><a href="https://chintugudiya.org/" target="_blank" class="text-decoration-none text-white">Chintu Gudiya Foundation</a></span>
			</div>
		</div>
		<div class="d-flex flex-wrap w-252 w-md-536 w-xl-750 pl-md-8 justify-content-xl-between">
			<div class="">
				<h5 class="font-heebo-bold fz-18 leading-27 text-white mt-8 mt-xl-0">Know more</h5>
			<?php
				wp_nav_menu(
					array(
						'menu' => 'footer_primary',
						'theme_location' => 'footer_primary',
						'menu_class' => 'list-unstyled navbar-nav flex-wrap flex-column text-left footer-menu w-126 w-md-138 -xl-586 w-hd-700 text-white',
					)
				);
			?>
			</div>
			<div>
				<h5 class="font-heebo-bold fz-18 leading-27 text-white mt-8 mt-xl-0">Get help</h5>
			<?php
				wp_nav_menu(
					array(
						'menu' => 'footer-menu',
						'theme_location' => 'footer_secondary',
						'menu_class' => 'list-unstyled navbar-nav flex-wrap flex-column text-left footer-menu w-126 w-md-138 mx-auto w-xl-586 w-hd-700 text-white',
					)
				);
			?>
			</div>
			<div>
				<h5 class="font-heebo-bold fz-18 leading-27 text-white mt-8 mt-xl-0">Resources</h5>
			<?php
				wp_nav_menu(
					array(
						'menu' => 'footer-menu',
						'theme_location' => 'footer_tertiary',
						'menu_class' => 'list-unstyled navbar-nav flex-wrap flex-column text-left footer-menu w-126 w-md-138 mx-auto w-xl-586 w-hd-700',
					)
				);
			?>
			</div>
			<div class="d-flex flex-column w-xl-170">
				<div class="d-flex flex-row mt-8 mt-xl-0">
					<a href="https://www.youtube.com/channel/UCIJfQhrbJSCWQtzdI484nng" target="_blank">
						<?php echo file_get_contents(get_template_directory(). '/dist/images/youtube.svg') ?>
					</a>
					<a href="https://github.com/glific" target="_blank" class="mx-4 mx-xl-8">
						<?php echo file_get_contents(get_template_directory(). '/dist/images/github.svg') ?>
					</a>
					<a href="https://discord.com/invite/scsrGUw" target="_blank">
						<?php echo file_get_contents(get_template_directory(). '/dist/images/discord.svg') ?>
					</a>
				</div>

				<div class="fz-14 leading-21 w-98 w-xl-full text-theme-pewter mt-auto">
					<span class="theme-pewter">Crafted by</span>
					<a class="ml-xl-2 text-decoration-none fz-14 leading-21 fz-xl-16 leading-xl-24 text-theme-pewter" href="https://coloredcow.com/?utm_source=website&utm_medium=glific" target="_blank">
						ColoredCow
					</a>
				</div>
			</div>
		</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
