<?php
/**
 * 404
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header(); ?>

	<!-- TODO: add option for custom bg and default western bg -->
	<style type="text/css">
	#single-header { background: url('http://localhost/wordpress/wp-content/uploads/2014/06/cartoon-desert-wallpaper.jpg') no-repeat center bottom;}';
	</style>

	<!-- Single Header -->
	<div id="single-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB0">404</h1>
					<h2 class="marT0 marB0"><?php _e('Whoa there, partner. Looks like you\'ve gotten lost.', 'contempo'); ?></h2>
			</div>
		</div>
	</div>
	<!-- //Single Header -->

<?php get_footer(); ?>