<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WP Day Spa
 * @subpackage Template
 */

$post_lead = get_post_meta($post->ID, "_woc_post_lead", true);
$post_social = get_post_meta($post->ID, "_woc_post_social", true);

$attachments = get_children(
	array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID
	)
);

if(is_single()) {

		// Single Inner
		echo '<article class="single-inner">';
			
			// Post Content
			echo '<div class="inner-content">';

				the_content();
			
			echo '</div>';
			// End Post Content

} else {

        get_template_part('layouts/blog-large');

}

//wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'contempo' ) . '</span>', 'after' => '</div>' ) ); ?>    