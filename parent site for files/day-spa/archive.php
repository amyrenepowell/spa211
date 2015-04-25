<?php
/**
 * Archive Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

global $ct_options;

get_header(); ?>

	<!-- Archive Header Image -->
	<?php echo woc_display_category_image(); ?>

	<!-- Archive Header -->
	<div id="archive-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB5"><?php woc_archive_header(); ?></h1>
			</div>
		</div>
	</div>
	<!-- //Archive Header -->

	<!-- Main Content Container -->
	<div class="container archive marT60 padB60">

		<!-- Posts Loop -->
		<div class="col span_9">

			<!-- Archive Inner -->
			<div class="archive-inner">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
				<?php woc_pagination(); ?>
			
			<?php else : ?>
			
				<?php get_template_part( 'content', 'none' ); ?>
			
			<?php endif; ?>

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