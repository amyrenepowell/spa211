<?php
/**
 * Loop Testimonials
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
			'post_type' => 'testimonial',
			'posts_per_page' => 10000
		);
		$query = new WP_Query($args);

	while ( $query->have_posts() ) : $query->the_post();
		$name = get_post_meta( get_the_id(), '_ct_person_title', true );
		$business = get_post_meta( get_the_id(), '_ct_business', true );
		$url = get_post_meta( get_the_id(), '_ct_site_url', true );

	    $url  = ( !empty( $url ) ) ? '<a href="' . $url . '">' . $business . '</a>' : $business;

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
				</div>

				<?php the_content(); ?>

				<?php
				echo '<ul class="pricing">';
					if(!empty($name)) {
						echo '<li>';
							echo $name;
						echo '</li>';
					}
					if(!empty($url)) {
						echo '<li>';
							echo $url;
						echo '</li>';
					}
				echo '</ul>';
				
				?>

			</div>
	    </li>

	    <?php if($d % 3 == 0) { echo '<div class="clear"><div>';} ?>

	<?php $i++; $d++; endwhile; ?>

</ul>

<?php } else { ?>

    <p class="nomatches left clear"><?php _e( 'Apologies, but no results were found for the requested archive.<br />Perhaps searching will help find a related post.', 'contempo' ); ?></p>

<?php } wp_reset_postdata(); ?>
