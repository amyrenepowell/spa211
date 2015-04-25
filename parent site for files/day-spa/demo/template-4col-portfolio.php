<?php
/**
 * Template Name: 4 Column Portfolio
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

?>

	<!-- Archive Header -->
	<div id="archive-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB5"><?php echo __('Our Works', 'contempo') ?></h1>
			</div>
		</div>
	</div>
	<!-- //Archive Header -->

	<!-- // Tags Filtering -->
	<div class="container marT60">
			<?php woc_tags_filtering(); ?>
	</div>

	<!-- // Isotope Container -->
	<div class="container padB60">
		<div id="isotope-container">
		    <ul class="grid cs-style-3 effect-6">
			<?php
			if (have_posts()) {

				$args = array(
					'post_type' => 'portfolio',
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);

			while ( $query->have_posts() ) : $query->the_post(); ?>

			    <li class="<?php woc_first_term(); ?> item col span_3">
					<?php woc_first_image_linked_portfolio(); ?>
			    </li>

			<?php endwhile; ?>

			</ul>

			<?php } else { ?>

			    <p class="nomatches left clear"><?php _e( 'Apologies, but no results were found for the requested archive.<br />Perhaps searching will help find a related post.', 'contempo' ); ?></p>

			<?php } wp_reset_query(); ?>
			    <div class="clear"></div>
		</div>
	</div>

<?php get_footer(); ?>
