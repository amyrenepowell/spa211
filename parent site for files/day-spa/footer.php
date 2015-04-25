<?php
/**
 * Footer Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

global $ct_options;

$trackingcode = isset( $ct_options['ct_tracking_code'] ) ? esc_attr( $ct_options['ct_tracking_code'] ) : ''; 

?>          <!-- Clear -->
            <div class="clear"></div>

        </div>
        <!-- //Wrapper -->

        <!-- Footer -->
        <?php
        echo '<footer class="row" id="footer-widgets">';
            echo '<div class="container">';
                echo '<div class="widget-wrap">';
        			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer') ) :else: endif;
                        echo '<div class="clear"></div>';
                echo '</div>';
            echo '</div>';
        echo '</footer>';
        ?>
        <!-- //Footer -->

        <?php if($ct_options['ct_tracking_code']) { ?>
	        <?php echo stripslashes($ct_options['ct_tracking_code']); ?>
	    <?php } ?>

	<?php wp_footer(); ?>
</body>
</html>