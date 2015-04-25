<?php
/**
 * Loop Services
 *
 * @package WP Day Spa
 * @subpackage Template
 */

global $ct_options;

?>
<ul>

	<?php
	$i = 0; 
	$d = 1;
	if (have_posts()) {

		$args = array(
			'post_type' => 'services',
			'posts_per_page' => -1
		);
		$query = new WP_Query($args);

	while ( $query->have_posts() ) : $query->the_post();

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
				if($ct_options['ct_book_now'] == 'Yes') {
					echo '<p>';
						echo '<a class="book-now btn" href="#" data-service="';
							the_title();
						echo '">' . __('Book Now', 'contempo') . '</a>';
					echo '</p>';
				}
				?>

			</div>
	    </li>

	    <?php if($d % 3 == 0) { echo '<div class="clear"><div>';} ?>

	<?php $i++; $d++; endwhile; ?>

</ul>

<?php } else { ?>

    <p class="nomatches left clear"><?php _e( 'Apologies, but no results were found for the requested archive.<br />Perhaps searching will help find a related post.', 'contempo' ); ?></p>

<?php } wp_reset_postdata(); ?>
