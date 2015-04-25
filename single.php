<?php
/**
 * Single Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

	// Custom Post Header Background Image
	if(get_post_meta($post->ID, '_ct_post_header_bg', true) == 'Yes') {
		echo'<style type="text/css">';
		echo '#single-header { background: url(';
		echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo ') no-repeat center center; background-size: cover;}';
		echo '</style>';
	} elseif(get_post_meta($post->ID, '_ct_post_header_bg_color', true) != '') {
        echo'<style type="text/css">';
        echo '.dark-overlay { background: none;} ';
        echo '#single-header { background-color:';
        echo get_post_meta($post->ID, '_ct_post_header_bg_color', true);
        echo '}';
        echo '</style>';
    } ?>

	<!-- Single Header -->
	<div id="single-header">
		<div class="dark-overlay">
			<div class="container">
				<figure class="author-avatar">
			        <a href="<?php the_author_meta('url'); ?>"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></a>
		        </figure>
				<h1 class="marT0 marB0"><?php the_title(); ?></h1>
				<?php if(get_post_meta($post->ID, '_ct_sub_title', true) != '') { ?>
					<h2 class="marT0 marB0"><?php echo stripslashes(get_post_meta($post->ID, "_ct_sub_title", true)); ?></h2>
				<?php } ?>
				<p class="marB0">
					<span class="meta">
						<?php _e('By', 'contempo'); ?> <?php the_author_posts_link(); ?> <?php _e('in', 'contempo'); ?> <?php $cat = get_the_category(); $cat = $cat[0]; ?><a href="<?php echo home_url(); ?>/?cat=<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></a> <?php _e('with', 'contempo'); ?> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a>
					</span>
				</p>
			</div>
		</div>
	</div>
	<!-- //Single Header -->

	<?php

	// Container
	echo '<div class="container padB60">';

		// Content
		echo '<div class="content col span_8">';

			if ( have_posts() ) : while ( have_posts() ) : the_post();
	            
	            // Post Content
				get_template_part( 'content');
				// End Post Content

				// Post Social
		        woc_post_social();
	            
	        endwhile; endif;

	        	// Link Pages
		        wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'contempo' ) . '</span>', 'after' => '</div>' ) );

		        // Author Info
		        woc_author_info();

		        // Related Posts
				woc_related_posts();
				// End Related Posts

				woc_post_nav();

				// Comments
		        if ( comments_open() || '0' != get_comments_number() ) :

		        	// If comments are open or we have at least one comment, load up the comment template
					comments_template();
				
				endif;
				// End Comments

			echo '</article>';
			// End Single Inner

		echo '</div>';
		// End Content

		// Sidebar
		get_template_part('sidebar');
		// End Sidebar

			echo '<div class="clear"></div>';

	echo '</div>';
	// End Container

get_footer(); ?>