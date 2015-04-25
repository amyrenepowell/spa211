<?php
/**
 * Portfolio Archive Template
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
		    <?php get_template_part('loop','portfolio'); ?>
			    <div class="clear"></div>
		</div>
	</div>

<?php get_footer(); ?>