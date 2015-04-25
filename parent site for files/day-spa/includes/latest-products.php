<?php
/**
 * Latest Products
 *
 * @package WP Day Spa
 * @subpackage Include
 */
 
global $ct_options;
 
$latest_prod_num = isset( $ct_options['ct_home_latest_product_num'] ) ? esc_attr( $ct_options['ct_home_latest_product_num'] ) : '';  
$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );

?>

<h3 class="center"><?php _e('Latest Products', 'contempo'); ?></h3>

<ul class="products">
    <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $latest_prod_num
        );
        query_posts($args);

        global $woocommerce;

        $size = 'shop_catalog';
        $add_to_cart_url = '?add-to-cart='.$post->ID;
        
        $count = 0; if ( have_posts() ) : while ( have_posts() ) : the_post(); global $product; ?>
            
        <li class="product type-product col span_3 <?php if($count % 4 == 0) { echo 'first'; } ?>">

	            <figure class="product-image">
	                <?php the_post_thumbnail($size); ?>
	                <div class="info">
	                <div class="info-wrapper">
	                	<a class="details-btn" href="<?php the_permalink(); ?>"><?php _e('Details', 'contempo'); ?></a>
	                	<a class="details-btn" href="<?php $add_to_cart_url; ?>"><?php _e('+ Cart', 'contempo'); ?></a>
	                </div>
	                </div>
	            </figure>
                <h3><?php the_title(); ?></h3>
                <p class="price marB0"><?php echo $product->get_price_html(); ?></p>
	
        </li>
        
        <?php
		
		$count++;
		
		if($count % 4 == 0) {
			echo '<li class="clear"></li>';
		}
		
		endwhile; endif; wp_reset_query(); ?>
</ul>
    <div class="clear"></div>