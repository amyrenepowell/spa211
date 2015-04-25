<?php
/**
 * Template Name: Staff
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

	while ( have_posts() ) : the_post();

		// Custom Page Header Background Image
		if(get_post_meta($post->ID, '_ct_page_header_bg_image', true) != '') {
			echo'<style type="text/css">';
			echo '#single-header { background: url(';
			echo get_post_meta($post->ID, '_ct_page_header_bg_image', true);
			echo ') no-repeat center center;}';
			echo '</style>';
		} ?>

		<!-- Archive Header -->
		<div id="single-header">
			<div class="dark-overlay">
				<div class="container">
					<h1 class="marT0 marB5"><?php the_title(); ?></h1>
					<?php if(get_post_meta($post->ID, '_ct_page_sub_title', true) != '') { ?>
						<h2 class="marT0 marB0"><?php echo stripslashes(get_post_meta($post->ID, "_ct_page_sub_title", true)); ?></h2>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- //Archive Header -->

	<?php endwhile; wp_reset_postdata(); ?>

	<!-- Main Content Container -->
	<div class="container archive marT60 padB60">

		<!-- Posts Loop -->
		<div class="col span_12 first">

			<!-- Archive Inner -->
			<div class="archive-inner">

				<?php get_template_part( 'loop','staff'); ?>

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