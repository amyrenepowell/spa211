<?php
/**
 * WooCommerce Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

wp_reset_postdata();

	// Custom Page Header Background Image
	if($ct_options['ct_woo_header_bg_image']) {
		echo'<style type="text/css">';
		echo '.woocommerce #single-header { background: url(';
			echo $ct_options['ct_woo_header_bg_image'];
		echo ') no-repeat center center;}';
		echo '</style>';
	} ?>

	<!-- Single Header -->
	<div id="single-header">
		<div class="dark-overlay">
			<div class="container">
			<?php if($ct_options['ct_woo_page_title'] || $ct_options['ct_woo_sub_title']) { ?>
				<h1 class="marT0 marB0"><?php _e($ct_options['ct_woo_page_title'], 'contempo'); ?></h1>
				<h2 class="marT0 marB0"><?php _e($ct_options['ct_woo_sub_title'], 'contempo'); ?></h2>
			<?php } else { ?>
				<h1 class="marT0 marB0"><?php _e('Our Shop', 'contempo'); ?></h1>
				<h2 class="marT0 marB0"><?php _e('A Collection of Awesome Products', 'contempo') ?></h2>
			<?php } ?>
			</div>
		</div>
	</div>
	<!-- //Single Header -->

	<!-- Container -->
	<div class="container woocommerce marT60 padB60">

		<!-- Page Content -->
		<div class="content col span_9">
			<?php woocommerce_content(); ?>
		</div>
		<!-- //Page Content -->

		<!-- Sidebar -->
		<div id="sidebar" class="col span_3">
			<div id="sidebar-inner">
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('WooCommerce Right Sidebar') ) :else: endif; ?>
				<div class="clear"></div>
			</div>
		</div>
		<!-- //Sidebar -->
			<div class="clear"></div>
	</div>
	<!-- //Container -->

<?php get_footer(); ?>