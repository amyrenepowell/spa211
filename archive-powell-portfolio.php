<?php
/**
 * The main template file. Includes the loop.
 *
 *
 * @package Customizr
 * @since Customizr 1.0
 */
?>




<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo apply_filters( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>

    <div class="container" role="main">

        <header class="entry-header">
          <h1 class="entry-title ">My Work</h1>
          <hr class="featurette-divider __before_content">
      </header>

<!-- BEGIN LOOP -->
<?php

the_post();

// Get 'team' posts
$portfolio = get_posts( array(
    'post_type' => 'powell-service',
    'posts_per_page' => 100000, // Unlimited posts
    'orderby' => 'modified', // Order by last updated
) );



if ( $portfolio ):
?>
<div>
<section>

<ul class="list">
    
    <?php 
    foreach ( $portfolio as $post ): 
    setup_postdata($post);

    $image = get_field('image');
    $link = get_field('link_to_work');
    $file = get_field('upload_file');
    
    
    ?>
<li class="list__item">

<figure>

<?php if ($link) { ?>
    <a href="<?php echo $link; ?>" target="_blank"><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>"/></a>
<?php } elseif ($file) { ?>
    <a href="<?php echo $file; ?>" target="_blank" ><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>"/></a>
<?php } else { ?>
    <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>"/>
<?php } ?>
    
    
    <figcaption><h3>

<?php if ($link) { ?>
    <a href="<?php echo $link; ?>" target="_blank"><?php the_title(); ?></a>
<?php } elseif ($file) { ?>
    <a href="<?php echo $file; ?>" target="_blank" ><?php the_title(); ?></a>
<?php } else { ?>
    <?php the_title(); ?>
<?php } ?>

    </h3>

        <p><?php echo implode('| ', get_field('category')); ?></p></figcaption>
</figure>



</li>
<?php endforeach; ?>
</ul>

</section><!-- // grid-wrap -->
</div><!-- // grid-gallery -->
<?php endif; ?>
<!-- END LOOP -->

    
        
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<script>
;( function( $, window, document, undefined )
{
    'use strict';
 
    var s = document.body || document.documentElement, s = s.style;
    if( s.webkitFlexWrap == '' || s.msFlexWrap == '' || s.flexWrap == '' ) return true;
 
    var $list       = $( '.list' ),
        $items      = $list.find( '.list__item' ),
        setHeights  = function()
        {
            $items.css( 'height', 'auto' );
 
            var perRow = Math.floor( $list.width() / $items.width() );
            if( perRow == null || perRow < 2 ) return true;
 
            for( var i = 0, j = $items.length; i < j; i += perRow )
            {
                var maxHeight   = 0,
                    $row        = $items.slice( i, i + perRow );
 
                $row.each( function()
                {
                    var itemHeight = parseInt( $( this ).outerHeight() );
                    if ( itemHeight > maxHeight ) maxHeight = itemHeight;
                });
                $row.css( 'height', maxHeight );
            }
        };
 
    setHeights();
    $( window ).on( 'resize', setHeights );
    $list.find( 'img' ).on( 'load', setHeights );
 
})( jQuery, window, document );
</script>


<?php do_action( '__after_main_wrapper' );##hook of the footer with get_footer ?>