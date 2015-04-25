<?php
/**
 * Register Custom Taxonomies
 *
 * @package WP Day Spa
 * @subpackage Admin
 */

if ( ! function_exists( 'ct_service_types' ) ) {

	// Register Custom Taxonomy
	function ct_service_types() {
	 
		// Services
		$serviceslabels = array(
			'name' => _x( 'Service Type', 'taxonomy general name', 'contempo' ),
			'singular_name' => _x( 'Service Type', 'taxonomy singular name', 'contempo' ),
			'search_items' =>  __( 'Search Service Types', 'contempo' ),
			'popular_items' => __( 'Popular Service Types', 'contempo' ),
			'all_items' => __( 'All Service Types', 'contempo' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Service Type', 'contempo' ),
			'update_item' => __( 'Update Service Types', 'contempo' ),
			'add_new_item' => __( 'Add New Service Type', 'contempo' ),
			'new_item_name' => __( 'New Service Type Name', 'contempo' ),
			'separate_items_with_commas' => __( 'Separate Service Types with commas', 'contempo' ),
			'add_or_remove_items' => __( 'Add or remove Service Types', 'contempo' ),
			'choose_from_most_used' => __( 'Choose from the most used Service Types', 'contempo' )
		);
		$rewrite = array(
			'slug'                       => 'service-type',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $serviceslabels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'service_type', array( 'service_type' ), $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'ct_service_types', 0 );

}

function services() {
	global $post;
	global $wp_query;
	$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'service_type', '', ', ', '' ) );
	echo $terms_as_text;
}

?>