<?php
/**
 * Blog Large Lead for Archive & Search
 *
 * @package WP Day Spa
 * @subpackage Template
 */

$post_lead = get_post_meta($post->ID, "_woc_post_lead", true);
$post_social = get_post_meta($post->ID, "_woc_post_social", true);

$attachments = get_children(
	array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID
	)
);

?>
        
<!-- Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('post row'); ?>>
	<!-- Post Header -->
	<header class="marB20">
    	<figure class="author-avatar left">
	        <a href="<?php the_author_meta('url'); ?>"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></a>
        </figure>
        <div class="left entry-title">
            <h2 class="marT0 marB5"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <p class="marB0">
				<span class="meta">
					<?php _e('By', 'contempo'); ?> <?php the_author_posts_link(); ?> <?php _e('in', 'contempo'); ?> <?php $cat = get_the_category(); $cat = $cat[0]; ?><a href="<?php echo home_url(); ?>/?cat=<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></a> <?php _e('with', 'contempo'); ?> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a>
				</span>
			</p>
		</div>
			<div class="clear"></div>
    </header>
    <!-- //Post Header -->

    <?php
	// Post Lead Slider or Featured Image
	echo '<div class="post-thumb col span_12 first">';
		if(count($attachments) > 1) {
			echo '<div class="flexslider">';
			echo	'<ul class="slides">';
						woc_slider_images();
			echo	'</ul>';
			echo '</div>';
		} elseif(has_post_thumbnail()) {
			echo '<figure>';
			echo '<a class="thumb" href="';
				the_permalink();
			echo '">';
				the_post_thumbnail(620,200);  
			echo '</a>';
			echo '</figure>';
		}
	echo '</div>';
	// End Post Lead Slider or Featured Image
	?>

    <!-- Post Excerpt -->
    <div class="excerpt marT20 col span_12 first">
        <?php custom_length_excerpt('55'); ?>
    </div>
    <!-- //Post Excerpt -->

	    <div class="clear"></div>

    <!-- Read More -->
    <p class="marT40 marB0">
    	<a class="btn" href="<?php the_permalink() ?>"><?php _e('Read More', 'contempo'); ?></a>
	</p>
	<!-- //Read More -->

</article>
<!-- //Article -->    