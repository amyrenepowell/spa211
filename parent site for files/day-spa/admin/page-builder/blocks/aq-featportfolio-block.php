<?php
/** A simple text block **/

if(!class_exists('AQ_Featportfolio_Block')) {
	class AQ_Featportfolio_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Featured Portfolio',
				'size' => 'span12',
				'resizable' => 0,
			);
			
			//create the block
			parent::__construct('aq_featportfolio_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				'filter' => array()
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$args=array(
			    'post_type' => 'portfolio',
			    'posts_per_page' => -1,
			    'orderby' => 'menu_order',
			    'order' => 'ASC',
			);
			
			$portfolios = get_posts($args);
			$filter_options = array();
			foreach($portfolios as $portfolio) {
				$filter_options[$portfolio->ID] = $portfolio->post_title;
			}
			?>
			<p>Note: You should only use this block on a full-width template</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('filter') ?>">
					Choose which portfolio items to show<br/>
					<?php echo aq_field_multiselect('filter', $block_id, $filter_options, $filter); ?>
				</label>
			</p>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			wp_enqueue_script('caroufredsel');
			
			?>
			<div class="aq-block-featportfolio-wrapper">
				
				<div class="carousel-nav">
					<a href="#" class="prev">&larr;</a>
					<a href="#" class="next">&rarr;</a>
				</div>
				
				<h3 class="aq-block-featportfolio-title"><?php echo ( $title ? $title : __('Featured Portfolio', 'framework') )?></h3>
				
				<ul id="aq-block-featportfolio_<?php echo rand(1,100) ?>" class="items items-4-col aq-block-featportfolio cf">
					
				    <?php
					
			        $count = 1;
			        
				    $args=array(
					    'post_type' => 'portfolio',
				        'posts_per_page' => -1,
				        'post__in' => $filter,
				        'orderby' => 'menu_order',
				        'order' => 'ASC',
				    );
				    query_posts($args);
					
					$size = aq_get_items_column_size('items-4-col'); //get columns size
			
					if (have_posts()) : while (have_posts()) : the_post();
						global $post;
						$custom_thumbnail = get_post_meta(get_the_ID(), 'aq_custom_thumbnail', TRUE);
						
						if ($custom_thumbnail) {
							
							$image = aq_resize( $custom_thumbnail, $size['img_width'], $size['img_height'], true );
							
						} elseif (has_post_thumbnail()) {
						
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url($thumb);
							$image = aq_resize( $img_url, $size['img_width'], $size['img_height'], true );
							
						}
						
						$terms = ( $terms = get_the_terms( get_the_ID(), 'type', TRUE ) ) ? $terms : array();
						
						$term_slugs = array();
						$term_names = array();
						foreach ($terms as $term) {
							if(!empty($types)) {
								if(in_array($term->term_id, $types)) {
									$term_slugs[] = strtolower(preg_replace('/\s+/', '-', $term->slug));
									$term_names[] = $term->name;
								}
							} else {
								$term_slugs[] = strtolower(preg_replace('/\s+/', '-', $term->slug));
								$term_names[] = $term->name;
							}
						}
						
						$term_slugs = implode(' ', $term_slugs);
						$term_names = implode(', ', $term_names);
			            ?>
						
			            <li id="post-<?php the_ID(); ?>" <?php post_class('item ' .$term_slugs); ?>>
			                	
			                <div class="inner">
			                	<div class="post-thumb">
								<?php if ( has_post_thumbnail() || $custom_thumbnail ) { ?>
									<a href="<?php the_permalink() ?>">
										<img src="<?php echo $image; ?>"/>
									</a>
			                    <?php } ?>
			                    </div>
			                    
			                    <div class="the-title">
			                        <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h2>
			                    </div>
			                    <div class="types">
			                        <?php echo $term_names ?>
			                    </div> 
							</div>
								
						</li><!--.item -->
							
			        <?php $count++; endwhile; endif; wp_reset_query(); ?>
						
				</ul><!--.portfolio-items-->
			    
			</div>
			<?php
		}
		
		function update($new_instance, $old_instance) {
			$new_instance['title'] = htmlspecialchars(stripslashes($new_instance['title']));
			return $new_instance;
		}
		
	}
}