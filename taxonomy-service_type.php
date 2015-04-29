<?php
/**
 * Services Archive Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header(); ?>

	<!-- Archive Header Image -->
	<?php woc_display_category_image(); ?>

	<!-- Archive Header -->
	<div id="archive-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB5"><?php printf( __( '%s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>
			</div>
		</div>
	</div>
	<!-- //Archive Header -->

	<!-- Main Content Container -->
	<div class="container archive marT60 padB60">

		<!-- Posts Loop -->
		<div class="col span_12 first">

			<!-- Archive Inner -->
			<div class="archive-inner">

				<?php if ( have_posts() ) : ?>
			

			<?php /* The loop */ ?>
			<ul>
			<?php

			$i = 0; 
			$d = 1;

			while ( have_posts() ) : the_post();

			$sub_head = get_post_meta( get_the_id(), 'translation', true );
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

	    		<div class="service-title">
					<h4><?php the_title(); ?></h4>
					<h5><?php echo the_field(translation); ?></h5>
					
				</div>

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

			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

				

			</div>
			<!-- //Archive Inner -->

		</div>
		<!-- //Posts Loop -->
		
		<!-- Right Sidebar -->
		<?php get_sidebar();
		
		// Clear
		echo '<div class="clear"></div>';
	        
	echo '</div>';
	//Main Content Container

get_footer(); ?>