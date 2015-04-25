<?php
/** 
 * Services Posts Block
 * List posts by services posts
 * Orderby latest
 * @todo - allow featured images, layout options, post formats(currently post tags offer similar functionality)
*/
if(!class_exists('AQ_Services_Block')) {
	class AQ_Services_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Services',
				'size' => 'span12',
				'categories' => array(),
				'tags' => array(),
				'postnum' => 3,
				'layout' => array(),
			);
			
			parent::__construct('aq_services_block', $block_options);
		}
		
		function form($instance) {
		
			extract($instance);
			
			$post_categories = ($temp = get_terms('category')) ? $temp : array();
			$categories_options = array();
			foreach($post_categories as $cat) {
				$categories_options[$cat->term_id] = $cat->name;
			}
			
			$post_tags = ($temp = get_terms('post_tag')) ? $temp : array();
			$tags_options = array();
			foreach($post_tags as $tag) {
				$tags_options[$tag->term_id] = $tag->name;
			}
			
			$yes_no = array('Yes', 'No');
			
			$page_options = array(0 => "Select a page:");
			$pages_obj = get_pages('sort_column=post_parent,menu_order');    
			foreach ($pages_obj as $page_obj) {
				$page_options[$page_obj->ID] = $page_obj->post_title; 
			}
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('categories') ?>">
				Posts Categories (leave empty to display all)<br/>
				<?php echo aq_field_multiselect('categories', $block_id, $categories_options, $categories); ?>
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('types') ?>">
				Posts Tags (leave empty to display all)<br/>
				<?php echo aq_field_multiselect('tags', $block_id, $tags_options, $tags); ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('postnum') ?>">
				Maximum number of posts to display<br/>
				<?php echo aq_field_input('postnum', $block_id, $postnum, 'min', 'number') ?> &nbsp; posts
				</label>
			</p>
			<?php
			
		}
		
		function block($instance) {
			extract($instance);

			echo '<div class="aq-services-block col span_12 first" id="' . strtolower(strip_tags($titlenospace)) . '">';

				$titlenospace = str_replace(' ', '', $title);
			
				if($title) echo '<h3 class="aq-block-title" id="'.strtolower(strip_tags($titlenospace)).'">'.strip_tags($title).'</h3>';
			
				echo '<ul>';
						$args = array(
							'post_type' => 'services',
							'posts_per_page' => $postnum,
							'category__in' => $categories,
							'tag__in' => $tags
						);
						$query = new WP_Query($args);
						
						$i = 0; 
						$d = 1;
					
						while ( $query->have_posts() ) : $query->the_post();
						
						global $post;
						global $ct_options;

						$price_one = get_post_meta($post->ID, '_ct_price_one', true);
						$time_one = get_post_meta($post->ID, '_ct_time_one', true);
						$price_two = get_post_meta($post->ID, '_ct_price_two', true);
						$time_two = get_post_meta($post->ID, '_ct_time_two', true);
						$price_three = get_post_meta($post->ID, '_ct_price_three', true);
						$time_three = get_post_meta($post->ID, '_ct_time_three', true);
						?>
							
							<li class="service col span_4 <?php if ($i % 3 == 0) { echo 'first'; } ?>">
						    	<div class="service-inner">

						    	<?php if(has_post_thumbnail()) {
						    		echo'<figure class="marB20">';
							    		the_post_thumbnail();
							    	echo '</figure>';
						    	} ?>

									<h4><?php the_title(); ?></h4>
									<?php the_content(); ?>

									<?php
									echo '<ul class="pricing">';
										if(!empty($price_one)) {
											echo '<li>';
												ct_currency();
												echo $price_one;
												if(!empty($time_one)) {
													echo '<span>' . $time_one . '</span>';
												}
											echo '</li>';
										}
										if(!empty($price_two)) {
											echo '<li>';
												ct_currency();
												echo $price_two;
												if(!empty($time_two)) {
													echo '<span>' . $time_two . '</span>';
												}
											echo '</li>';
										}
										if(!empty($price_three)) {
											echo '<li>';
												ct_currency();
												echo $price_three;
												if(!empty($time_three)) {
													echo '<span>' . $time_three . '</span>';
												}
											echo '</li>';
										}
									echo '</ul>';
									
										if($ct_options['ct_book_now'] != 'No') {
											echo '<p>';
												echo '<a class="book-now btn" href="#" data-service="';
													the_title();
												echo '">' . __('Book Now', 'contempo') . '</a>';
											echo '</p>';
										}
									?>

								</div>
						    </li>

						    <?php if($d % 3 == 0) { echo '<div class="clear"></div>';}					
						 
						$i++; $d++; endwhile; wp_reset_postdata(); ?>

					</ul>

				</div>
		<?php }
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
	}
}