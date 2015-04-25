<?php
/**
 * Loop Staff
 *
 * @package WP Day Spa
 * @subpackage Template
 */

?>
<ul>

	<?php
	$i = 1;
	if (have_posts()) {

		$args = array(
			'post_type' => 'staff',
			'posts_per_page' => -1
		);
		$query = new WP_Query($args);

	while ( $query->have_posts() ) : $query->the_post();

		$jobtitle = get_post_meta($post->ID, '_ct_job_title', true);

		$twitterhandle = get_post_meta($post->ID, '_ct_twitterhandle', true);
		$facebookurl = get_post_meta($post->ID, '_ct_facebookurl', true);
		$linkedinurl = get_post_meta($post->ID, '_ct_linkedinurl', true);
		$gplus = get_post_meta($post->ID, '_ct_gplus', true);

	?>

	    <li class="staff col span_4">
	    	<div class="staff-inner">

	    	<?php if(has_post_thumbnail()) {
	    		echo'<figure class="marB20">';
		    		the_post_thumbnail();
		    	echo '</figure>';
	    	} ?>

				<h4 class="marB0"><?php the_title(); ?></h4>
				<?php if(!empty($jobtitle)) { ?><h5 class="marT0"><?php echo $jobtitle; ?></h5><?php } ?>
				<?php the_content(); ?>

				<ul class="contact-social center">
					<?php if ($twitterhandle) { ?><li class="twitter"><a href="http://twitter.com/#!/<?php echo $twitterhandle; ?>" target="_blank"><i class="icon-twitter"></i></a></li><?php } ?>
					<?php if ($facebookurl) { ?><li class="facebook"><a href="<?php echo $facebookurl; ?>" target="_blank"><i class="icon-facebook"></i></a></li><?php } ?>
					<?php if ($linkedinurl) { ?><li class="facebook"><a href="<?php echo $linkedinurl; ?>" target="_blank"><i class="icon-linkedin"></i></a></li><?php } ?>
					<?php if ($gplus) { ?><li class="google"><a href="<?php echo $gplus; ?>" target="_blank"><i class="icon-google-plus"></i></a></li><?php } ?>
				</ul> 

			</div>
	    </li>

	    <?php if($i % 3 == 0) { echo '<div class="clear"><div>';} ?>

	<?php $i++; endwhile; ?>

</ul>

<?php } else { ?>

    <p class="nomatches left clear"><?php _e( 'Apologies, but no results were found for the requested archive.<br />Perhaps searching will help find a related post.', 'contempo' ); ?></p>

<?php } wp_reset_postdata(); ?>
