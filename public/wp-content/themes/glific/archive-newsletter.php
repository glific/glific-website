<?php
get_header();
?>

<div class="px-42 py-18 bg-theme-white-smoke font-heebo-regular">
	<h2 class="pb-18 fz-36 font-weight-bold text-theme-primary">Newsletters</h2>
	<?php
	if ( have_posts() ) :
		?>
			<div class="row">
			<?php
			while ( have_posts() ) :
				the_post();
				?>		
				<div class="col-md-6 col-12 col-xl-4 mb-11">
				<a href="<?php echo get_field( 'link' ); ?>" class="text-decoration-none position-relative" target="_blank">					
					<div class="px-8 py-10 bg-white h-full">
					<h1 class="fz-36 font-weight-light text-theme-secondary pb-8"><?php echo get_field( 'date' ); ?></h1>
					<div class="description fz-18 text-theme-pewter leading-hd-24"><?php echo get_field( 'description' ); ?> </div></div>
					</a>
					<svg class="position-absolute left-36 bottom-20 c-pointer"  width="18px" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M9 5v2h6.59L4 18.59 5.41 20 17 8.41V15h2V5H9z" fill="#119656"></path></svg>					
				</div>	
				<?php
		endwhile;
			?>
		</div>
		<?php
	endif;
	?>
</div>
<?php
get_footer();

