<?php
/**
 * Template Name: Home
 *
 * @package WP Day Spa
 * @subpackage Template
 */

$layout = $ct_options['ct_homepage_layout']['enabled'];
$rev_slider = $ct_options['ct_home_rev_slider_alias'];

get_header();

wp_reset_postdata();

?>

    <?php if ($layout) :

        foreach ($layout as $key=>$value) {
        
            switch($key) {

            // Slider
            case 'revslider' :
            
                putRevSlider($rev_slider);
                
            break;
                
            // Slider
            case 'slider' :
            
                ct_slider();
                
            break;

            // Call To Action
            case 'cta' :       

                echo '<section class="cta center">';
                    echo '<div class="container">';
                        echo stripslashes($ct_options['ct_cta']);
                    echo'</div>';
                echo'</section>';
        
            break;
            
            // Latest Products
            case 'latest_products' :
                
                echo '<section class="latest-products">';
                    echo '<div class="container">';
                        get_template_part('/includes/latest-products');
                    echo'</div>';
                echo'</section>';
                echo '<div class="clear"></div>';
                
            break;
            
             // Page Builder
            case 'builder' :       
             
                    echo '<section class="page-builder">';
                        echo '<div class="container">';
                             echo do_shortcode('[template id="' . $ct_options['ct_home_page_builder_slug'] . '"]');
                        echo'</div>';
                        echo'<div class="clear"></div>';
                    echo'</section>';
            
            break;
            
            // Widgets
            case 'widgets' :      
             
                     echo '<div class="home-widgets-wrap">';
                         echo '<div class="container"> '; 
                             if (function_exists('dynamic_sidebar') && dynamic_sidebar('Four Column Homepage') ) :else: endif;
                         echo '</div>';                    
                     echo '</div>';
            
            break;
            
            }
        
        } endif; 
    wp_reset_postdata(); ?>

<?php get_footer(); ?>