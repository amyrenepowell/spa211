<?php
/**
 * Services Archive Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header(); ?>

	<!-- Archive Header Image -->
	<?php woc_display_category_image(); ?>

	<!-- Archive Header -->
	<div id="archive-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB5"><?php _e('Services', 'contempo'); ?></h1>
			</div>
		</div>
	</div>
	<!-- //Archive Header -->

	<!-- Main Content Container -->
	<div class="container archive marT60 padB60">

		<!-- Posts Loop -->
		<div class="col span_12 first">

			<!-- Archive Inner -->
			<div class="archive-inner">

				<?php get_template_part( 'loop','services'); ?>

			</div>
			<!-- //Archive Inner -->

		</div>
		<!-- //Posts Loop -->
		
		<!-- Right Sidebar -->
		<?php get_sidebar();
		
		// Clear
		echo '<div class="clear"></div>';
	        
	echo '</div>';
	//Main Content Container

get_footer(); ?>