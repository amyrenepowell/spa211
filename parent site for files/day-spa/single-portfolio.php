<?php
/**
 * Single Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

$skills = get_post_meta( $post->ID, '_ct_skills', true );
$client = get_post_meta( $post->ID, '_ct_client', true );
$site = get_post_meta( $post->ID, '_ct_site', true );

get_header();

	// Custom Post Header Background Image
    if(get_post_meta($post->ID, '_ct_port_post_header_bg_image', true) != '') {
		echo'<style type="text/css">';
		echo '#single-header { background: url(';
		echo get_post_meta($post->ID, '_ct_port_post_header_bg_image', true);
		echo ') no-repeat center center; background-size: cover;}';
		echo '</style>';
	} elseif(get_post_meta($post->ID, '_ct_port_post_header_bg_color', true) != '') {
        echo'<style type="text/css">';
        echo '.dark-overlay { background: none;} ';
        echo '#single-header { background-color:';
        echo get_post_meta($post->ID, '_ct_port_post_header_bg_color', true);
        echo '}';
        echo '</style>';
    } ?>

	<!-- Single Header -->
	<div id="single-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB0"><?php the_title(); ?></h1>
				<?php if(get_post_meta($post->ID, '_ct_short_desc', true) != '') { ?>
					<h2 class="marT0 marB0"><?php echo get_post_meta($post->ID, "_woc_short_desc", true); ?></h2>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- //Single Header -->

	<?php

	// Container
	echo '<div class="container padB60">';

		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article class="col span_9">

                <div class="portfolio-inner">

                    <?php if(get_post_meta($post->ID, "_woc_video", true)) {
                            echo '<div class="video marB30">';
                            echo stripslashes(get_post_meta($post->ID, "_woc_video", true));
                            echo '</div>'; 
                        } else {
                            $attachments = get_children(
                                array(
                                    'post_type' => 'attachment',
                                    'post_mime_type' => 'image',
                                    'post_parent' => $post->ID
                                ));
                            if(count($attachments) > 1) {
                                echo '<div class="flexslider">';
                                echo    '<ul class="slides">';
                                            woc_slider_images();
                                echo    '</ul>';
                                echo '</div>';
                            } elseif(has_post_thumbnail()) {
                                echo '<figure class="marB40">';
                                        the_post_thumbnail(1100,800);  
                                echo '</figure>';
                            }
                        } ?>

        		    <?php the_content(); ?>

                </div>

            </article>

            <div class="col span_3">

                <?php woc_port_nav(); ?>

                <ul id="portfolio-info" class="col span_12 first">
                    <?php if($skills != '') { ?>
                        <li><strong><?php _e('Skills:', 'contempo'); ?></strong><br /><?php echo $skills; ?></li>
                    <?php } ?>
                    <?php if($client != '') { ?>
                        <li><strong><?php _e('Client:', 'contempo'); ?></strong><br /><?php echo $client; ?></li>
                    <?php } ?>
                    <li><strong><?php _e('Date:', 'contempo'); ?></strong><br /><?php the_date(); ?></li>
                    <?php if($site != '') { ?>
                        <li><strong><?php _e('Project URL:', 'contempo'); ?></strong><br /><a href="<?php echo $site; ?>"><?php echo $site; ?></a></li>
                    <?php } ?>
                </ul>

                <?php woc_post_social(); ?>

            </div>
            
            <?php endwhile; endif; ?>
            
                <div class="clear"></div>
                
           <?php woc_related_portfolio(); ?>

        </article>

	<?php echo '</div>';
	// End Container

get_footer(); ?>