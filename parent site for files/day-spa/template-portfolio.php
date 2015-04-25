<?php
/**
 * Template Name: Portfolio
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

wp_reset_postdata();

	// Include archive.php template
	get_template_part('archive-portfolio');

get_footer(); ?>