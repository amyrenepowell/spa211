<?php
/**
 * Template Name: Site Map
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

wp_reset_postdata();

if ( have_posts() ) : while ( have_posts() ) : the_post();

	// Custom Page Header Background Image
	if(get_post_meta($post->ID, '_ct_page_header_bg_image', true) != '') {
		echo'<style type="text/css">';
		echo '#single-header { background: url(';
		echo get_post_meta($post->ID, '_ct_page_header_bg_image', true);
		echo ') no-repeat center center;}';
		echo '</style>';
	} ?>

	<!-- Single Header -->
	<div id="single-header">
		<div class="dark-overlay">
			<div class="container">
				<h1 class="marT0 marB0"><?php the_title(); ?></h1>
				<?php if(get_post_meta($post->ID, '_ct_page_sub_title', true) != '') { ?>
					<h2 class="marT0 marB0"><?php echo stripslashes(get_post_meta($post->ID, "_woc_page_sub_title", true)); ?></h2>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- //Single Header -->

	<!-- Container -->
	<div class="container marT60 padB60">

		<!-- Page Content -->
		<div class="content col span_12">
			<?php the_content(); ?>
		</div>

	<?php endwhile; endif; wp_reset_postdata(); ?>

		<!-- //Page Content -->
			<section class="marT60">
                <div class="singlecol left">
                    <h5 class="marB10"><?php _e('Last Twenty Posts', 'contempo'); ?></h5>
                    <ul>
                    <?php		
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 20
                        );
                        $query = new WP_Query($args);
                    
                    while ( $query->have_posts() ) { $query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php } wp_reset_query(); ?>
                    </ul>                        
                </div>
                
                <div class="singlecol left">
                    <h5 class="marB10"><?php _e('Pages', 'contempo'); ?></h5>
                    <ul>
                        <?php wp_list_pages( 'depth=0&sort_column=menu_order&title_li=' ); ?>		
                    </ul>
                </div>
                
                <div class="singlecol left">
                    <h5 class="marB10"><?php _e('Categories', 'contempo'); ?></h5>
                    <ul>
                        <?php wp_list_categories( 'title_li=&hierarchical=0&show_count=1') ?>	
                    </ul>
                </div>
                
                <div class="singlecol left last">
                    <h5 class="marB10"><?php _e('Posts per category', 'contempo'); ?></h5>
                    <?php
                        $cats = get_categories();
                        foreach ( $cats as $cat ) {
                
                        query_posts( 'cat=' . $cat->cat_ID );
                    ?>
                    <h6 class="marB10"><strong><?php echo $cat->cat_name; ?></strong></h6>
                    <ul>	
                        <?php while ( have_posts() ) { the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } wp_reset_query(); ?>
                </div> 
            </section>
            
                <div class="clear"></div>
	</div>
	<!-- //Container -->

<?php get_footer(); ?>