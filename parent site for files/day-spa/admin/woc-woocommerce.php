<?php
/**
 * WooCommerce Functions
 *
 * @package WP WP Day Spa
 * @subpackage Admin
 */

/*-----------------------------------------------------------------------------------*/
/* Add WooCommerce Support */
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'woocommerce' );

/*-----------------------------------------------------------------------------------*/
/* Change Image Sizes */
/*-----------------------------------------------------------------------------------*/

global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'plugins.php' ) add_action( 'init', 'woc_woocommerce_image_dimensions', 1 );

function woc_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '800',	// px
		'height'	=> '800',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '800',	// px
		'height'	=> '800',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '120',	// px
		'crop'		=> 0 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

/*-----------------------------------------------------------------------------------*/
/* Remove related products */
/*-----------------------------------------------------------------------------------*/

function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 

/*-----------------------------------------------------------------------------------*/
/* Remove Default CSS */
/*-----------------------------------------------------------------------------------*/

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/*-----------------------------------------------------------------------------------*/
/* Items Per Row */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3;
	}
}
add_filter('loop_shop_columns', 'loop_columns');

/*-----------------------------------------------------------------------------------*/
/* Products Per Page */
/*-----------------------------------------------------------------------------------*/

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );

/*-----------------------------------------------------------------------------------*/
/* Make price widget draggable on touch devices */
/*-----------------------------------------------------------------------------------*/

function load_touch_punch_js() {
	global $version;

	wp_enqueue_script( 'jquery-ui-widget' );
	wp_enqueue_script( 'jquery-ui-mouse' );
	wp_enqueue_script( 'jquery-ui-slider' );
	wp_register_script( 'woo-jquery-touch-punch', get_stylesheet_directory_uri() . "/js/jquery.ui.touch-punch.min.js", array('jquery'), $version, true );
	wp_enqueue_script( 'woo-jquery-touch-punch' );
}
add_action( 'wp_enqueue_scripts', 'load_touch_punch_js' , 35 );

/*-----------------------------------------------------------------------------------*/
/* Add Custom Overlay to Product */
/*-----------------------------------------------------------------------------------*/

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

 if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	}
 }


/**
 * WooCommerce Product Thumbnail
 **/
 if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;

        $add_to_cart_url = '?add-to-cart='.$post->ID;
        $post_url = get_permalink($post->ID);

		if ( ! $placeholder_width )
			$placeholder_width = wc_get_image_size( 'shop_catalog_image_width' );
		if ( ! $placeholder_height )
			$placeholder_height = wc_get_image_size( 'shop_catalog_image_height' );

			$output = '<figure class="product-image">';

			if ( has_post_thumbnail() ) {
				$output .= get_the_post_thumbnail( $post->ID, $size );
			} else {
				$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';
			}
			$output .= '<div class="info">';
			$output .= '<div class="info-wrapper">';
            $output .= '<a class="details-btn" href="';
            $output .= $post_url;
            $output .= '">';
            $output .= __('Details', 'contempo');
            $output .= '</a>';
            $output .= '<a class="add-to-cart" href="';
            $output .= $add_to_cart_url;
            $output .= '">';
            $output .= __('+ Cart', 'contempo');
            $output .= '</a>';
		    $output .= '</div>';
		    $output .= '</div>';
			$output .= '</figure>';

			return $output;
	}
 }

?>
