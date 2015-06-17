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
			'post_type' => 'powell-service',
			'posts_per_page' => 10000
		);
		$query = new WP_Query($args);

	while ( $query->have_posts() ) : $query->the_post();
		$image = get_post_meta( get_the_id(), 'image', true );
		$description = get_post_meta( get_the_id(), 'description', true );
		$link = get_post_meta( get_the_id(), 'link', true );
		$size = 'large';

	?>
		
	    <li class="service col span_4 <?php if ($i % 3 == 0) { echo 'first'; } ?>">
	    	<a href="<?php echo $link ?>">
	    	<div class="service-inner">

	    	<?= wp_get_attachment_image( $image, $size ); ?>
		  

	    		<div class="service-title">
					<h4><?php the_title(); ?></h4>
				</div>


			</div>
			</a>
	    </li>


	    <?php if($d % 3 == 0) { echo '<div class="clear"><div>';} ?>

	<?php $i++; $d++; endwhile; ?>

</ul>

<?php } else { ?>

    <p class="nomatches left clear"><?php _e( 'Apologies, but no results were found for the requested archive.<br />Perhaps searching will help find a related post.', 'contempo' ); ?></p>

<?php } wp_reset_postdata(); ?>
