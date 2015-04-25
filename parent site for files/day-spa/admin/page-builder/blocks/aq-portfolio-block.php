<?php
/** Features Block 
 * A simple block that output the "features" HTML */
if(!class_exists('AQ_Portfolio_Block')) {
	class AQ_Portfolio_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Portfolio',
				'size' => 'span12'
			);
			
			parent::__construct('aq_portfolio_block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'portnum' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="portnum">
				<label for="<?php echo $this->get_field_id('portnum') ?>">
					<?php _e('Number of items', 'contempo'); ?>
					<?php echo aq_field_input('portnum', $block_id, $portnum) ?>
				</label>
			</p>
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			if(!is_front_page()) {
				ct_tags_nav();
			}
        
			echo '<div class="ct-port-container">';
					echo '<ul class="megafolio-container">';
 
						$args = array(
								'post_type'			=> 'portfolio',
								'posts_per_page'	=> $portnum
							);
						$query = new WP_Query($args);

					while ( $query->have_posts() ) : $query->the_post(); $feat_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') ); ?>
						
						<li class="mega-entry cat-all <?php ct_first_term(); ?>" id="<?php the_ID(); ?>" data-src="<?php echo $feat_url; ?>" data-width="800" data-height="436">
                            <div class="mega-hover">
                            
                                <div class="mega-hovertitle"><?php the_title(); ?>
                                <div class="mega-hoversubtitle"><?php the_author(); ?></div>
                                </div>
                                
                                <a class="port-link" href="<?php the_permalink(); ?>"><i class="icon-link mega-hoverlink"></i></a>
                                
                                <a class="port-fancy fancybox" rel="group" href="<?php echo $feat_url; ?>">
                                    <i class="icon-search mega-hoverview"></i>
                                </a>
                            
                            </div>
                        </li>     
						
					<?php endwhile;
                    
			echo 		'<div class="clear"></div>';
			echo '</div>';
			
		}
		
	}
}

