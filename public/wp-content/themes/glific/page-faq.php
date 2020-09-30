<?php

/**
 * File functions.php for theme glific
 *
 * @package glific
 */

get_header();

$page_title = get_the_title();

global $wpdb;
$db_prefix = $wpdb->prefix;
$post_table = $db_prefix . 'posts';
$post_meta_table = $db_prefix . 'postmeta';
$search_key_sub_query = isset( $_GET['search_key'] ) ? "AND $post_meta_table.meta_value LIKE '%" . $_GET['search_key'] . "%' " : '';
$results = $wpdb->get_results( "SELECT $post_table.id, $post_meta_table.meta_key, $post_meta_table.meta_value
	FROM $post_table
	INNER JOIN $post_meta_table ON ( $post_table.ID = $post_meta_table.post_id )
	WHERE $post_meta_table.meta_key like 'faq_content_%' $search_key_sub_query
	AND $post_table.post_type = 'page'
	AND(  $post_table.post_status = 'publish'  )
	ORDER BY $post_table.post_date DESC" );

$faqs = array();
$faq_post_id = null;
if ( !empty( $results ) ) {
	$faq_post_id = $results[0]->id;
	foreach ( $results as $key => $post ) {
		$index = filter_var( $post->meta_key, FILTER_SANITIZE_NUMBER_INT );
		$faqs[$index][$post->meta_key] = $post->meta_value;
	}
}
?>

<div class="bg-theme-white-smoke page-faq">
	<div class="demo-section d-flex flex-column flex-md-row justify-content-md-between w-320 w-md-660 w-xl-880 mx-auto">
		<div class="d-flex flex-column w-full justify-content-center pt-18 text-center mx-auto">
			<h3 class="text-theme-primary font-heebo-bold fz-28 fz-md-36 mx-auto leading-40 mb-0"><?php echo $page_title; ?></h3>
		</div>
	</div>

	<div class="demo-section d-flex flex-column flex-md-row justify-content-md-between w-320 w-md-660 w-xl-880 mx-auto">
		<div class="pt-6 pb-10 pb-xl-18 mx-auto">
			<form class="form-inline" action="">
				<div class="d-flex border-4 border-theme-primary bg-white w-320 w-md-560 h-64 rounded-20 border p-2">
					<input type="text"
						value="<?php echo isset( $_GET['search_key'] ) ? $_GET['search_key'] : '' ?>"
						name="search_key"
						class="w-full px-6 px-md-6 border-0 rounded-20 text-theme-scorpion font-heebo-light"
						placeholder="Search..."
						autocomplete="off"
						id="faq_search" />
					<span class="w-25 h-25 my-auto c-pointer <?php echo isset( $_GET['search_key'] ) ? '' : 'd-none' ?>"
						onClick="window.location.href = window.location.href.split( '?' )[0];"
						id="faq_close_button">
						<?php echo file_get_contents( get_template_directory() . '/dist/images/close.svg' ) ?>
					</span>
					<button type="submit" class="rounded-circle border border-0 mb-2 my-auto mx-4 mx-md-6 p-4">
						<div class="w-25 w-md-30 h-25 h-md-30">
							<?php echo file_get_contents( get_template_directory() . '/dist/images/search.svg' ) ?>
						</div>
					</button>
				</div>
			</form>
		</div>
	</div>

	<div class="pb-26 px-6 px-xl-31">
		<?php
		if ( !empty( $faqs ) ) : ?>
			<div class="accordion" id="accordionFaq">
				<?php
				$faq_count = 1;
				foreach ( $faqs as $key => $faq ) :
					$title_key = 'faq_content_' . $key . '_title';
					$description_key = 'faq_content_' . $key . '_description';
					$title = $faq[$title_key];
					$description = $faq[$description_key];
					if ( count( $faq ) === 1 ) {
						if ( isset( $faq[$title_key] ) ) {
							$post_meta = get_post_meta( $faq_post_id, $description_key );
							$description = isset( $post_meta[0] ) ? $post_meta[0] : '';
							$title = $faq[$title_key];
						} else {
							$post_meta = get_post_meta( $faq_post_id, $title_key );
							$title = isset( $post_meta[0] ) ? $post_meta[0] : '';
							$description = $faq[$description_key];
						}
					}
				?>

					<div class="card rounded-20 my-6 card-shadow">
						<div class="card-header bg-white rounded-20 p-0 card-shadow" id="heading<?php echo $faq_count; ?>">
							<button class="btn btn-link btn-block text-left rounded-20 px-6 text-decoration-none fz-24 leading-33 font-heebo-regular text-theme-mine-shaft"
								type="button"
								data-toggle="collapse"
								data-target="#collapse<?php echo $faq_count; ?>"
								aria-expanded="false"
								aria-controls="collapse<?php echo $faq_count; ?>"
							>
								<div class="d-flex flex-column flex-md-row">
									<div class="d-flex flex-row justify-content-between">
										<div class="fz-36 font-heebo-light my-auto pr-md-6 pr-xl-16">
											<?php echo $faq_count < 10 ? '0' . $faq_count : $faq_count; ?>
										</div>
										<div class="icon-dropdown d-md-none w-22 h-25 mt-4">
											<?php echo file_get_contents( get_template_directory() . '/dist/images/icon-arrow.svg' ) ?>
										</div>
									</div>
									<div class="my-auto py-6 w-md-85p">
										<?php echo $title; ?>
									</div>
									<div class="icon-dropdown d-none d-md-block w-22 h-30 mt-6 ml-auto">
										<?php echo file_get_contents( get_template_directory() . '/dist/images/icon-arrow.svg' ) ?>
									</div>
								</div>
							</button>
						</div>
						<div id="collapse<?php echo $faq_count; ?>"
							class="collapse"
							aria-labelledby="heading<?php echo $faq_count; ?>"
							data-parent="#accordionFaq"
						>
							<div class="card-body fz-18 leading-29 font-heebo-regular pl-xl-31 pr-xl-15 py-xl-9.5">
								<?php echo $description; ?>
							</div>
						</div>
					</div>

				<?php $faq_count++;
				endforeach; ?>
			</div>
		<?php
		else : ?>
			<div class="text-center mt-10">
				<p class="font-heebo-regular text-theme-mine-shaft fz-24 leading-33">
					No Result found
				</p>
				<p class="text-theme-scorpion font-heebo-light">
					We can't find any faq matching your search.
				</p>
			</div>

		<?php endif; ?>
	</div>

</div>

<?php
get_footer();
