<?php
/**
 * Template Name: Left Sidebar
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

	// Custom Page Header Background Image
	if(get_post_meta($post->ID, '_ct_page_header_bg_image', true) != '') {
		echo'<style type="text/css">';
		echo '#single-header { background: url(';
		echo get_post_meta($post->ID, '_ct_page_header_bg_image', true);
		echo ') no-repeat center center;}';
		echo '</style>';
	} ?>

	<!-- Single Header -->
	<div id="single-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB0"><?php the_title(); ?></h1>
				<?php if(get_post_meta($post->ID, '_ct_page_sub_title', true) != '') { ?>
					<h2 class="marT0 marB0"><?php echo stripslashes(get_post_meta($post->ID, "_ct_page_sub_title", true)); ?></h2>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- //Single Header -->

	<!-- Container -->
	<div class="container marT60 padB60">

		<!-- Sidebar -->
		<?php
		echo '<div id="sidebar" class="col span_3 first">';
			echo '<div id="sidebar-inner">';
				if (function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar Page') ) :else: endif;
			echo '</div>';
		echo '</div>';
		?>
		<!-- //Sidebar -->

		<!-- Page Content -->
		<div class="content col span_9">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<!-- //Page Content -->

			<div class="clear"></div>
	</div>
	<!-- //Container -->

<?php get_footer(); ?>