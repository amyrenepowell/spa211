<?php
/**
 * Sidebar Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */
 
global $ct_options;

?>

<div id="sidebar" class="col span_3">
	<div id="sidebar-inner">

		<?php

			if (is_page()) {
	            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Page') ) :else: endif;
	        } elseif(is_single()) {
	            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Single') ) :else: endif;
	        } elseif(is_archive() || is_search() || is_home()) {
	            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Blog') ) :else: endif;
	        }

        ?>

			<div class="clear"></div>
	</div>
</div>