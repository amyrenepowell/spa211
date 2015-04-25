<?php
/**
 * Theme Functions
 *
 * @package WP Day Spa
 * @subpackage Admin
 */

	/*-----------------------------------------------------------------------------------*/
	/* Body IDs */
	/*-----------------------------------------------------------------------------------*/

	function woc_body_id() {

		if (is_home()) {
			echo ' id="home"';
		} elseif (is_single()) {
			echo ' id="single"';
		} elseif (is_page()) {
			echo ' id="page"';
		} elseif (is_search()) {
			echo ' id="search"';
		} elseif (is_archive()) {
			echo ' id="archive"';
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Add WordPress Menu Support */
	/*-----------------------------------------------------------------------------------*/

	if (function_exists('register_nav_menu')) {
		register_nav_menus( array( 'primary_left' => __( 'Primary Left Menu', 'contempo' ) ) );
		register_nav_menus( array( 'primary_right' => __( 'Primary Right Menu', 'contempo' ) ) );
	}

	function ct_nav_left() { ?>
		<nav class="left">
	    	<?php wp_nav_menu( array( 'container_id' => 'nav-left', 'menu_class' => 'cbp-tm-menu', 'menu_id' => 'cbp-tm-menu', 'theme_location' => 'primary_left', 'fallback_cb' => false) ); ?>
	    </nav>
	<?php }

	function ct_nav_right() { ?>
		<nav class="right">
	    	<?php wp_nav_menu( array( 'container_id' => 'nav-right', 'menu_class' => 'cbp-tm-menu', 'menu_id' => 'cbp-tm-menu', 'theme_location' => 'primary_right', 'fallback_cb' => false) ); ?>
	    </nav>
	<?php }

	function ct_mobile_header() { ?>
		        
	    <div class="mobile-nav col span_10">
	        <div class="right">
		        <?php ct_nav_left(); ?>
	            <?php ct_nav_right(); ?>
	        </div>
	    </div>

	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Define content width */
	/*-----------------------------------------------------------------------------------*/

	if ( ! isset( $content_width ) ) $content_width = 1100;

	/*-----------------------------------------------------------------------------------*/
	/* Add Post Thumbnail Support */
	/*-----------------------------------------------------------------------------------*/

	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'testimonials', 'services', 'staff', 'product', 'portfolio' ) );

	/*-----------------------------------------------------------------------------------*/
	/* Add auto feed links */
	/*-----------------------------------------------------------------------------------*/

	add_theme_support( 'automatic-feed-links' );

	/*-----------------------------------------------------------------------------------*/
	/* Register Scripts and CSS */
	/*-----------------------------------------------------------------------------------*/
	function woc_register_cssjs() {

		//Register Scripts
        wp_register_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 'jquery', '1.0', false);
		wp_register_script('customSelect', get_template_directory_uri() . '/js/jquery.customSelect.min.js', 'jquery', '1.0', false);
		wp_register_script('wocSelect', get_template_directory_uri() . '/js/woc.select.js', 'jquery', '1.0', false);
		wp_register_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', 'jquery', '1.0', true);
		wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery', '1.0', true);
		wp_register_script('retina', get_template_directory_uri() . '/js/retina.js', 'jquery', '1.0', true);
		wp_register_script('mobileMenu', get_template_directory_uri() . '/js/woc.mobile.menu.js', 'jquery', '1.0', true);
		wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.0', true);
		wp_register_script('touchEffects', get_template_directory_uri() . '/js/toucheffects.js', 'jquery', '1.0', true);
		wp_register_script('modernizer', get_template_directory_uri() . '/js/modernizr.custom.js', 'jquery', '1.0', true);
		wp_register_script('menu', get_template_directory_uri() . '/js/woc.tooltipmenu.min.js', 'jquery', '1.0', true);
		wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '1.1', true);
		wp_register_script('isotope_sloppy_masonry', get_template_directory_uri() . '/js/jquery.isotope.sloppy-masonry.min.js', 'jquery', '1.0', true);
        wp_register_script('shiv', get_template_directory_uri().'/js/html5.js', 'jquery', '1.0', true);
		wp_register_script('base', get_template_directory_uri() . '/js/base.js', 'jquery', '1.0', true);
		wp_register_script('woc_woocommerce', get_template_directory_uri() . '/js/woc.woocommerce.js', 'jquery', '1.0', true);
		wp_register_script('gmaps', 'http://maps.google.com/maps/api/js?sensor=false', '', '1.0', false);
		wp_register_script('validationEngine', get_template_directory_uri() . '/js/jquery.validationEngine.js', 'jquery', '1.0', true);
		wp_register_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.lite.js', 'jquery', '1.0', true);

		// Register Styles
		wp_register_style('base', get_template_directory_uri() . '/css/base.css', '', '', 'screen, projection');
		wp_register_style('framework', get_template_directory_uri() . '/css/responsive-gs-12col.css', '', '', 'screen, projection');
		wp_register_style('ie', get_template_directory_uri() . '/css/ie.css', '', '', 'screen, projection');
		wp_register_style('layout', get_template_directory_uri() . '/css/layout.css', '', '', 'screen, projection');
		wp_register_style('dropdowns', get_template_directory_uri() . '/css/woc-dropdowns.css', '', '', 'screen, projection');
		wp_register_style('comments', get_template_directory_uri() . '/css/comments.css', '', '', 'screen, projection');
		wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', '', '', 'screen, projection');
		wp_register_style('flexsliderNav', get_template_directory_uri() . '/css/flexslider-nav.css', '', '', 'screen, projection');
		wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', '', '', 'screen, projection');
		wp_register_style('animate', get_template_directory_uri() . '/css/animate.min.css', '', '', 'screen, projection');
		wp_register_style('isotope', get_template_directory_uri() . '/css/isotope.css', '', '', 'screen, projection');
		wp_register_style('portfolio', get_template_directory_uri() . '/css/woc-portfolio.css', '', '', 'screen, projection');
		wp_register_style('woocommerce', get_template_directory_uri() . '/css/woc-woocommerce.css', '', '', 'screen, projection');
		wp_register_style('modal', get_template_directory_uri() . '/css/ct-modal-overlay.css', '', '', 'screen, projection');
		wp_register_style('validationEngine', get_template_directory_uri() . '/css/validationEngine.jquery.css', '', '', 'screen, projection');
		wp_register_style('pageBuilder', get_template_directory_uri() . '/css/page-builder-blocks.css', '', '', 'screen, projection');

	}
	add_action('wp_enqueue_scripts', 'woc_register_cssjs');

	function woc_init_scripts() {

		// Enqueue Styles
		wp_enqueue_style('base');
		wp_enqueue_style('framework');
		wp_enqueue_style('ie');
		wp_enqueue_style('layout');
		wp_enqueue_style('dropdowns');
		wp_enqueue_style('comments');
		wp_enqueue_style('flexslider');
		wp_enqueue_style('flexsliderNav');
		wp_enqueue_style('fontawesome');
		wp_enqueue_style('animate');
		wp_enqueue_style('isotope');
		wp_enqueue_style('portfolio');
		wp_enqueue_style('pageBuilder');
		wp_enqueue_style('validationEngine');
		wp_enqueue_style('modal');

		// Enqueue Scripts
        wp_enqueue_script('imagesloaded');
		wp_enqueue_script('underscore');
		wp_enqueue_script('waypoints');
		wp_enqueue_script('flexslider');
		wp_enqueue_script('retina');
		wp_enqueue_script('mobileMenu');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('modernizer');
		wp_enqueue_script('touchEffects');
		wp_enqueue_script('menu');
		wp_enqueue_script('isotope');
        wp_enqueue_script('isotope_sloppy_masonry');
		wp_enqueue_script('gmaps');
		wp_enqueue_script('customSelect');
		wp_enqueue_script('wocSelect');
		wp_enqueue_script('shiv');
		wp_enqueue_script('validationEngine');
		wp_enqueue_script('cycle');
		wp_enqueue_script('base');

		if(is_page_template('template-contact.php')) {
			
		}

		if (is_singular()) {
			wp_enqueue_script( "comment-reply" );
		}

		//script globals
		$woc_script_global = array(
             'site_url' => site_url(),
             'template_url' => get_template_directory_uri(),
             'ajax_url' => admin_url( 'admin-ajax.php', 'relative' ));
    	wp_localize_script('base', 'woc_global', $woc_script_global);

		if (is_plugin_active('woocommerce/woocommerce.php')) {
			wp_enqueue_style('woocommerce');
			wp_enqueue_script('woc_woocommerce');
		}

	}
	add_action('wp_enqueue_scripts', 'woc_init_scripts');

	/*-----------------------------------------------------------------------------------*/
	/* Enqueue main stylesheet
	/*-----------------------------------------------------------------------------------*/

	function ct_theme_style() {
	    wp_enqueue_style( 'ct-theme-style', get_bloginfo( 'stylesheet_url' ), array(), '1.0' );
	}
	add_action( 'wp_enqueue_scripts', 'ct_theme_style' );

	/**
	 * Used by hook: 'customize_preview_init'
	 * 
	 * @see add_action('customize_preview_init',$func)
	 */
	function woc_init_theme_customizer()
	{
		wp_enqueue_script( 
			  'woc-themecustomizer',
			  get_template_directory_uri().'/js/theme-customizer.js',
			  array( 'jquery','customize-preview' ),
			  '',
			  true
		);
	}
	add_action( 'customize_preview_init', 'woc_init_theme_customizer' );

	/*-----------------------------------------------------------------------------------*/
	/* WOC Head */
	/*-----------------------------------------------------------------------------------*/

	function woc_wp_head() {

		global $ct_options; ?>

		<script>
	        jQuery(window).load(function() {

	            // Slider
	            jQuery('.flexslider').flexslider({
	                animation: "fade",
	                slideDirection: "horizontal",
	                slideshow: true,
	                slideshowSpeed: 7000,
	                animationDuration: 600,
	                controlNav: false,
	                directionNav: true,
	                keyboardNav: true,
	                randomize: false,
	                pauseOnAction: true,
	                pauseOnHover: false,
	                animationLoop: true
	            });

	        });
	    </script>

	    <?php if(is_page_template('template-contact.php')) { ?>
			<script>
				jQuery(document).ready(function($) {
					$("#contactform").validationEngine({
						ajaxSubmit: true,
						ajaxSubmitFile: "<?php echo get_template_directory_uri(); ?>/includes/ajax-submit-contact.php",
						ajaxSubmitMessage: "<?php $contact_success = str_replace(array("\r\n", "\r", "\n"), " ", $ct_options['ct_contact_success']); echo $contact_success; ?>",
						success :  false,
						failure : function() {}
					});
				});
			</script>
		<?php } ?>

	    <?php
			/* Inject Custom Google Fonts */
			$ct_heading_font = isset( $instance['ct_heading_font'] ) ? esc_attr( $instance['ct_heading_font'] ) : '';
			$ct_body_font = isset( $instance['ct_body_font'] ) ? esc_attr( $instance['ct_body_font'] ) : '';
			
			$ct_heading_font = str_replace(' ','+',$ct_options['ct_heading_font']);
			$ct_body_font = str_replace(' ','+',$ct_options['ct_body_font']);
		?>

		<link href='http://fonts.googleapis.com/css?family=<?php echo $ct_heading_font; ?>:300,400,700,800' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=<?php echo $ct_body_font; ?>:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

	    <style type="text/css">
		    h1, h2, h3, h4, h5, h6 { font-family: '<?php echo $ct_options['ct_heading_font']; ?>' !important;}
			body, .slider-wrap { font-family: '<?php echo $ct_options['ct_body_font']; ?>' !important;}
		</style>

		<?php
		/* Inject Custom Stylesheet */
		if($ct_options['ct_use_styles'] == "Yes") {
			include(TEMPLATEPATH . '/includes/custom-stylesheet.php');
	    } ?>

	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Currency */
	/*-----------------------------------------------------------------------------------*/

	function ct_currency() {
		global $ct_options;
		if($ct_options['ct_currency']) {
			echo $ct_options['ct_currency'];
		} else {
			echo "$";
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Contact Us Map */
	/*-----------------------------------------------------------------------------------*/

	function woc_contact_us_map() {
		global $ct_options;
		?>
		<script>
        function setMapAddress(address) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { address : address }, function( results, status ) {
                if( status == google.maps.GeocoderStatus.OK ) {
                    var location = results[0].geometry.location;
                    var options = {
                        zoom: 15,
                        center: location,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        streetViewControl: true,
						scrollwheel: false,
						draggable: false,
						styles: [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]
                    };
                    var mymap = new google.maps.Map( document.getElementById( 'map' ), options );
                    var marker = new google.maps.Marker({
                    	map: mymap,
						flat: true,
						icon: '<?php echo get_template_directory_uri(); ?>/images/map-pin.png',
						position: results[0].geometry.location
                	});
            	}
        	});
        }
        setMapAddress( "<?php echo $ct_options['ct_contact_map_location']; ?>" );
        </script>
        <div id="location">
            <div id="map"></div>
        </div>
	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Homepage Slider */
	/*-----------------------------------------------------------------------------------*/

	function ct_slider() {
		global $ct_options;
		$slides = $ct_options['ct_flex_slider'];
		if($slides > 1) { ?>
	        <div id="slider" class="flexslider">
	            <ul class="slides">
	    
	                <?php 
	                    foreach ($slides as $slide => $value) {
	                        if (!empty ($value['url'])) {
	                        $imgURL = $value['url'];
	                ?>
	                <li>
	    
	                    <?php if (!empty ($value['link'])) { ?>
	                    <a href="<?php echo $value['link']; ?>">
	                            <img src="<?php echo aq_resize($imgURL,960); ?>" />
	                    </a>
	                    <?php } else { ?>
	                            <img src="<?php echo aq_resize($imgURL,960); ?>" />
	                    <?php } ?>
	    
	                    <?php if (!empty ($value['title']) || !empty ($value['description'])) { ?>
	                        <div class="flex-caption">
	                        <?php if (!empty ($value['title'])) { ?>
	                            <?php if (!empty ($value['link'])) { ?>
	                                <h1><a href="<?php echo $value['link']; ?>"><?php echo $value['title']; ?></a></h1>
	                                <p><?php echo $value['description']; ?></p>
	                            <?php } else { ?>
	                                <h1><?php echo $value['title']; ?></h1>
	                                <p><?php echo $value['description']; ?></p>
	                            <?php } ?>
	                        <?php } ?>
	                        </div>
	                    <?php } ?>
	                </li>
	    
	                <?php } else {
	                        if (!empty ($value['embed'])) {
	                            echo '<li class="video">';
	                            echo stripslashes($value['embed']);
	                            echo '</li>';
	                        }
	                    }
	                } ?>
	            </ul>
	        </div>
	            <div class="clear"></div>

		<?php }
	}

	/*-----------------------------------------------------------------------------------*/
	/* Ajax Actions */
	/*-----------------------------------------------------------------------------------*/

	 function woc_ajax_submit_contact() {

	 	global $ct_options;

		$email=$_POST['email'];
		$name=$_POST['name'];
		$message=$_POST['message'];

		$guests=$_POST['guests'];
		$datetime=$_POST['datetime'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];

		$service=$_POST['service'];
		
		// Subject & Email from admin options
		$subject = $ct_options['ct_reservation_subject'];
		$toemail = $ct_options['ct_reservation_email'];

		$headers[] = "From: $name <$email>";
		$headers[] = "Reply-To: $email";

		$msg = $name . "\r\n" . "Number of guests:" . $guests . "\r\n" . "Date & Time:" . $datetime . "\r\n" . "Service:" . $service . "\r\n" . $phone . "\r\n" . $message;

		$success = wp_mail( $toemail, $subject, $msg, $headers); 

		$response = array('success'=>$success);

		if($success) {
			$response['success_msg'] = $ct_options['ct_reservation_success'];
		} else {
			$response['error_msg'] = __('There was an error sending your message.', 'contempo');
		}

		wp_send_json($response);
    }
    add_action( 'wp_ajax_nopriv_submit-contact', 'woc_ajax_submit_contact' );
    add_action( 'wp_ajax_submit-contact', 'woc_ajax_submit_contact' ); 

	/*-----------------------------------------------------------------------------------*/
	/* Archive & Search Header */
	/*-----------------------------------------------------------------------------------*/

	function woc_archive_header() {

		global $post;

		if ( is_category() ) :
			single_cat_title();

		elseif(is_search() ) :
			printf( __( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' );

		elseif ( is_tag() ) :
			single_tag_title();

		elseif ( is_author() ) :
			printf( __( 'Author: %s', '_s' ), '<span class="vcard">' . get_the_author() . '</span>' );

		elseif ( is_day() ) :
			printf( __( 'Day: %s', '_s' ), '<span>' . get_the_date() . '</span>' );

		elseif ( is_month() ) :
			printf( __( 'Month: %s', '_s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', '_s' ) ) . '</span>' );

		elseif ( is_year() ) :
			printf( __( 'Year: %s', '_s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', '_s' ) ) . '</span>' );

		else :
			_e('Archives', 'contempo');

		endif;

	}

	/*-----------------------------------------------------------------------------------*/
	/* Add Categories to Attachments */
	/*-----------------------------------------------------------------------------------*/

	function woc_add_categories_to_attachments() {
	      register_taxonomy_for_object_type( 'category', 'attachment' );  
	}  
	add_action( 'init' , 'woc_add_categories_to_attachments' ); 

	/*-----------------------------------------------------------------------------------*/
	/* Display Featured Category Image */
	/*-----------------------------------------------------------------------------------*/

	function woc_display_category_image() {
		
		$currentcat = get_queried_object();
		$currentcatname = $currentcat->slug;

		$args = array(
			'post_type' => 'attachment',
			'post_status'=>'inherit',
			'category_name' => $currentcatname,
		);
		$query = new WP_Query( $args );

		while ( $query->have_posts() ) : $query->the_post();

			$imgattr = array(
				'alt'   => trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
			);

			echo'<style type="text/css">';
			echo '#archive-header { background: url(';
				echo wp_get_attachment_url( $post->ID, 'large', $imgattr );
			echo ') no-repeat center center; background-size: cover;}';
			echo '</style>';

		endwhile;

		wp_reset_postdata();
	}

	/*-----------------------------------------------------------------------------------*/
	/* Post Social */
	/*-----------------------------------------------------------------------------------*/

	function woc_post_social() { ?>

		<div class="col span_12 first post-social">
			<h6><?php _e('Share This', 'contempo'); ?></h6>

			<ul>
		        <li class="facebook"><a href="javascript:void(0);" onclick="popup('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php _e('Check out this great article on', 'contempo'); ?> <?php bloginfo('name'); ?> &mdash; <?php the_title(); ?>', 'facebook',658,225);"><i class="fa fa-facebook"></i></a></li>
		        <li class="twitter"><a href="javascript:void(0);" onclick="popup('http://twitter.com/home/?status=<?php _e('Check out this great article on', 'contempo'); ?> <?php bloginfo('name'); ?> &mdash; <?php the_title(); ?> &mdash; <?php the_permalink(); ?>', 'twitter',500,260);"><i class="fa fa-twitter"></i></a></li>
		        <li class="linkedin"><a href="javascript:void(0);" onclick="popup('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php _e('Check out this great article on', 'contempo'); ?> <?php bloginfo('name'); ?> &mdash; <?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>', 'linkedin',560,400);"><i class="fa fa-linkedin"></i></a></li>
		        <li class="google"><a href="javascript:void(0);" onclick="popup('https://plusone.google.com/_/+1/confirm?hl=en&url=<?php the_permalink(); ?>', 'google',500,275);"><i class="fa fa-google-plus"></i></a></a></li>
		    </ul>
	    </div>
	    	<div class="clear"></div>

    <?php }

	/*-----------------------------------------------------------------------------------*/
	/* Author Info */
	/*-----------------------------------------------------------------------------------*/

	function woc_author_info() {

		$facebookurl = get_the_author_meta('facebookurl');
		$twitterhandle = get_the_author_meta('twitterhandle');
		$linkedinurl = get_the_author_meta('linkedinurl');
		$gplus = get_the_author_meta('gplus');

		?>

		<div id="authorinfo">
			<h5 class="marB30"><?php _e('About The Author', 'contempo'); ?></h5>
		    <div class="col span_3 first">
		        <a href="<?php the_author_meta('url'); ?>"><?php echo get_avatar( get_the_author_meta('email'), '160' ); ?></a>
		    </div>
		    <div class="col span_9">
			    <div class="author-inner">
			        <h5 class="the-author marB10"><a href="<?php the_author_meta('url'); ?>"><?php the_author(); ?></a></h5>
			        <p><?php the_author_meta('description'); ?></p>
			        <ul>
			            <?php if($facebookurl != '') { ?>
			                <li class="facebook"><a href="<?php echo $facebookurl; ?>"><i class="icon-facebook"></i></a></li>
			            <?php } ?>
			            <?php if($twitterhandle != '') { ?>
			                <li class="twitter"><a href="http://twitter.com/<?php echo $twitterhandle; ?>"><i class="icon-twitter"></i></a></li>
			            <?php } ?>
			            <?php if($linkedinurl != '') { ?>
			                <li class="linkedin"><a href="<?php echo $linkedinurl; ?>"><i class="icon-linkedin"></i></a></li>
			            <?php } ?>
			            <?php if($gplus != '') { ?>
			                <li class="google"><a href="<?php echo $gplus; ?>"><i class="icon-google-plus"></i></a></li>
			            <?php } ?>
			        </ul>
		        </div>
		    </div>
		        <div class="clear"></div>
		</div>

	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Related Posts */
	/*-----------------------------------------------------------------------------------*/

	function woc_related_posts() {
		global $post;
		$tags = wp_get_post_tags($post->ID);
		if ($tags) {
		  echo '<h5 class="related-title marT40">Related Posts</h5>';
		  echo '<ul class="related">';
		  $first_tag = $tags[0]->term_id;
		  $args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($post->ID),
			'showposts'=>3,
			'ignore_sticky_posts'=>1
		   );
		  $my_query = new WP_Query($args);
		  if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); ?>

				<li class="col span_4">
					<figure>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</figure>
	                <h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
	                <?php custom_length_excerpt(12); ?>
	            </li>

			  <?php
			endwhile; wp_reset_query();
		  }
		  echo '</ul>';
			  echo '<div class="clear"></div>';
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Custom Length Excerpt */
	/*-----------------------------------------------------------------------------------*/

	function custom_length_excerpt($word_count_limit) {
	    echo '<p>' . wp_trim_words(get_the_content(), $word_count_limit) . '</p>';
	}

	/*-----------------------------------------------------------------------------------*/
	/* Content Navigation */
	/*-----------------------------------------------------------------------------------*/

	function woc_content_nav() { ?>
	        <div class="clear"></div>
	    <nav class="content-nav">
	        <div class="nav-prev left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'contempo' ) ); ?></div>
	        <div class="nav-next right"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>', 'contempo' ) ); ?></div>
	    </nav>
	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Post Navigation */
	/*-----------------------------------------------------------------------------------*/

	function woc_post_nav() { ?>
	    <nav class="post-nav">
	        <div class="nav-prev left"><?php next_post_link('%link', '<i class="icon-chevron-left"></i> %title'); ?></div>
	        <div class="nav-next right"><?php previous_post_link('%link', '%title <i class="icon-chevron-right"></i>'); ?></div>
	            <div class="clear"></div>
	    </nav>
	        <div class="clear"></div>
	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Portfolio Single Navigation */
	/*-----------------------------------------------------------------------------------*/

	function woc_port_nav() { ?>
		<nav class="port-nav">
	        <ul>
	            <li class="nav-prev"><?php next_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></li>
	            <li class="view-grid"><a href="<?php echo get_post_type_archive_link('portfolio'); ?>"><i class="icon-th-large"></i></a></li>
	            <li class="nav-next"><?php previous_post_link('%link', '<i class="icon-chevron-right"></i>'); ?></li>
	        </ul>
	    </nav>
    <?php }

	/*-----------------------------------------------------------------------------------*/
	/* Pagination */
	/*-----------------------------------------------------------------------------------*/

	function woc_pagination($pages = '', $range = 2) {
	     $showitems = ($range * 2)+1;

	     global $paged;
	     if(empty($paged)) $paged = 1;

	     if($pages == '') {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages) {
	             $pages = 1;
	         }
	     }

	     if(1 != $pages) {
			 echo '<div class="clear"></div>';
	         echo "<div class='pagination'>";
	         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
	         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
	             }
	         }

	         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
	         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
			 echo "<div class='clear'></div>\n";
	         echo "</div>\n";
	     }
	}

	/**
	 * Returns the URL from the post.
	 *
	 * @uses get_the_link() to get the URL in the post meta (if it exists) or
	 * the first link found in the post content.
	 *
	 * Falls back to the post permalink if no URL is found in the post.
	 */
	function woc_get_link_url() {
		$has_url = get_the_post_format_url();

		return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	}

	/*-----------------------------------------------------------------------------------*/
	/* Related Portfolio */
	/*-----------------------------------------------------------------------------------*/

	function woc_related_portfolio() {

		$terms = wp_get_post_terms( get_the_ID(), 'portfolio_category');
		$related_query = $tax_query = NULL;

		$related_query = new WP_Query(
		array(
			'post_type' => 'portfolio',
			'posts_per_page' => '4',
			'exclude' => get_the_ID(),
			'no_found_rows' => true,
			)
		);

		if( $related_query->posts ) {

			echo '<section class="related-portfolio">';

				echo '<h4>';
				echo __('Related Projects', 'contempo');
				echo '</h4>';
				echo '<ul class="grid cs-style-3 marB40">';

				$wpex_count=0;
				while( $related_query->have_posts() ) : $related_query->the_post();
				$wpex_count++;
				if($wpex_count == 1) {
					echo '<li class="col span_3 first">';
				} else {
					echo '<li class="col span_3">';
				}
					woc_first_image_linked_portfolio();
		        echo '</li>';

				endwhile;
				wp_reset_postdata(); $related_query = NULL;

				echo '<div class="clear"></div>';
				echo '</ul>';

			echo '</section>';

	    }
	}

	/*-----------------------------------------------------------------------------------*/
	/* Add User Profile Image Field */
	/*-----------------------------------------------------------------------------------

	function ct_add_multipart() {
		echo 'enctype="multipart/form-data"';
	}
	add_action( 'user_edit_form_tag', 'ct_add_multipart' );

	add_action( 'show_user_profile', 'extra_user_profile_fields' );
	add_action( 'edit_user_profile', 'extra_user_profile_fields' );

	function extra_user_profile_fields( $user ) { ?>
	    <h3><?php _e('User Profile Image', 'contempo'); ?></h3>

	    <table class="form-table">
	        <tr>
	            <th><label for="woc_profile_img"><?php _e('Profile Image', 'contempo'); ?></label></th>
	            <td>
	                <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
	                <?php $profile_img = get_the_author_meta('woc_profile_url', $user->ID ); ?>
	                <img style="border: 1px solid #dfdfdf; margin: 0 0 5px 0; padding: 5px; background: #fff;" src="<?php echo $profile_img; ?>" height="100" /><br />
	                <input name="woc_profile_img" id="woc_profile_img" type="file" /><br />
	                <span class="description"><?php _e('Please upload a profile picture here.', 'contempo'); ?></span>
	            </td>
	        </tr>
        </table>

    <?php }

	add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
	add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

	function save_extra_user_profile_fields( $user_id ) {

		if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

		// Upload Profile Image
		if ( !empty($_FILES['woc_profile_img']['name']) ) {
			$filename = $_FILES['woc_profile_img'];
			$override['test_form'] = false;
			$override['action'] = 'wp_handle_upload';
			$uploaded = wp_handle_upload($filename,$override);
			update_user_meta( $user_id, "woc_profile_url" , $uploaded['url'] );

			if( !empty($uploaded['error']) ) {
					die( 'Could not upload image: ' . $uploaded['error'] );
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Add user profile social fields */
	/*-----------------------------------------------------------------------------------*/

	function woc_modify_contact_methods($profile_fields) {

		// Add new fields
		$profile_fields['twitterhandle'] = 'Twitter Username';
		$profile_fields['facebookurl'] = 'Facebook URL';
		$profile_fields['linkedinurl'] = 'LinkedIn URL';
		$profile_fields['gplus'] = 'Google+ URL';

		return $profile_fields;
	}
	add_filter('user_contactmethods', 'woc_modify_contact_methods');

	/*-----------------------------------------------------------------------------------*/
	/* Allow Shortcodes to be used in widgets */
	/*-----------------------------------------------------------------------------------*/

	add_filter('widget_text', 'do_shortcode');

	/*-----------------------------------------------------------------------------------*/
	/* Get all of the images attached to the current post */
	/*-----------------------------------------------------------------------------------*/

	function woc_get_images($size = 'full') {
		global $post;
		$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
		$results = array();
		if ($photos) {
			foreach ($photos as $photo) {
				// get the correct image html for the selected size
				$results[] = wp_get_attachment_url($photo->ID);
			}
		}
		return $results;
	}

	/*-----------------------------------------------------------------------------------*/
	/* Get the first image attached to the current post */
	/*-----------------------------------------------------------------------------------*/

	function woc_get_post_image() {
		global $post;
		$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID'));
		if ($photos) {
			$photo = array_shift($photos);
			return wp_get_attachment_url($photo->ID);
		}
		return false;
	}

	/*-----------------------------------------------------------------------------------*/
	/* Display all images attached to post - stacked */
	/*-----------------------------------------------------------------------------------*/

	function woc_stacked_images() {
		$photos = woc_get_images('full');
		if ($photos) {
			foreach ($photos as $photo) { ?>
	            <img class="portfolio-image marB30" data-src="<?php echo aq_resize($photo,1100); ?>" data-width="1100" data-height="600" class="fs-image" />
			<?php }
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Display all images attached to post - slider */
	/*-----------------------------------------------------------------------------------*/

	function woc_slider_images() {
		$photos = woc_get_images('full');
		if ($photos) {
			foreach ($photos as $photo) { ?>
				<li data-thumb="<?php echo aq_resize($photo,960); ?>">
	                <img src="<?php echo aq_resize($photo,960); ?>" title="<?php the_title(); ?>" />
				</li>
			<?php }
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Display featured image large */
	/*-----------------------------------------------------------------------------------*/

	function woc_first_image_lrg() {
		the_post_thumbnail(array(600,250));
	}

	/*-----------------------------------------------------------------------------------*/
	/* Display featured image thumb */
	/*-----------------------------------------------------------------------------------*/

	function woc_first_image_tn() {
		the_post_thumbnail(array(120,120));
	}

	/*-----------------------------------------------------------------------------------*/
	/* Display first image linked portfolio */
	/*-----------------------------------------------------------------------------------*/

	function woc_first_image_linked_portfolio() {
		$photo = woc_get_post_image();
		global $post; ?>
	    <figure class="effect-lily">
			<?php the_post_thumbnail('large'); ?>
			<figcaption>
                <h3 class="marB0"><?php the_title(); ?></h3>
                <?php if(get_post_meta($post->ID, "_ct_short_desc", true) != '') { ?>
	                <p class="marB0"><?php echo get_post_meta($post->ID, "_ct_short_desc", true); ?></p>
                <?php } ?>
                <a href="<?php the_permalink(); ?>"><?php _e('View', 'contempo'); ?></a>
	        </figcaption>
	    </figure>
	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Tags Filtering for Portfolio */
	/*-----------------------------------------------------------------------------------*/

	function woc_tags_filtering() { ?>
	<ul id="tags-filter">
	    <li><a id="all" class="selected" href="#" data-filter="*"><?php _e('All','contempo'); ?></a></li>
	    <?php
		$terms = get_terms('portfolio_tags');
	    $count = count($terms);
		if ( $count > 0 ){
			foreach ( $terms as $term ) {
				echo "<li><a href='#' data-filter='.$term->slug'>" . ucfirst($term->name) . "</a></li>";
	         }
	     } ?>
	</ul>
	<?php }

	/*-----------------------------------------------------------------------------------*/
	/* Show the first term name only slug */
	/*-----------------------------------------------------------------------------------*/

	function woc_first_term() {
		global $post;
		$terms = get_the_terms( $post->id, 'portfolio_tags' );
		$count = 0;
		if ($terms) {
			foreach($terms as $term) {
				$count++;
				if (1 == $count) {
					echo $term->slug;
                    break;
				}
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Show the first term name only */
	/*-----------------------------------------------------------------------------------*/

	function woc_first_term_name() {
		global $post;
		$terms = get_the_terms( $post->id, 'portfolio_tags' );
		$count = 0;
		if ($terms) {
			foreach($terms as $term) {
				$count++;
				if (1 == $count) {
					echo ucfirst($term->name);
                    break;
				}
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* AJAX Actions */
	/*-----------------------------------------------------------------------------------*/

	function ajax_fetch_cart() {
		global $woocommerce;
        $response = array();
        $response['shop_url'] = get_permalink(woocommerce_get_page_id('shop'));
		$response['cart_url'] = $woocommerce->cart->get_cart_url();
    	$response['cart_contents_count'] = $woocommerce->cart->cart_contents_count;
        $response['subtotal'] = $woocommerce->cart->get_cart_subtotal();
    	$response['cart_contents'] = array();
    	if($woocommerce->cart->cart_contents_count > 0) {
            foreach ($woocommerce->cart->cart_contents as $key => $value) {
                $product = $woocommerce->product_factory->get_product($value['product_id']);
                $res_product = array();
                $res_product['title'] = $product->get_title();
                $res_product['price'] = $product->get_price_html();
                $res_product['image'] = $product->get_image(array(54,54));
                $res_product['quantity'] = $value['quantity'];
                $res_product['id'] = $value['product_id'];
                $res_product['cart_item_key'] = $key;
                $response['cart_contents'][] = $res_product;
            }
  	  }
		wp_send_json($response);
	}
	add_action( 'wp_ajax_nopriv_fetch-cart', 'ajax_fetch_cart' );
	add_action( 'wp_ajax_fetch-cart', 'ajax_fetch_cart' );


    function ajax_remove_from_cart() {
        global $woocommerce;
        $response = array();

        $cart_item_key = $_POST['cart_item_key'];
        $woocommerce->cart->set_quantity($cart_item_key, 0);

        $response['cart_contents_count'] = $woocommerce->cart->cart_contents_count;
        $response['subtotal'] = $woocommerce->cart->get_cart_subtotal();
        wp_send_json($response);
    }
    add_action( 'wp_ajax_nopriv_remove-from-cart', 'ajax_remove_from_cart' );
    add_action( 'wp_ajax_remove-from-cart', 'ajax_remove_from_cart' );


    function ajax_submit_contact() {
		$email=$_POST['email'];
		$name=$_POST['name'];
		$message=$_POST['message'];
		
		//TODO fetch Subject and To Email from options
		$subject = 'Test Subject';
		$toemail = 'ryan@therg.net';


		$headers[] = "From: $name <$email>";
		$headers[] = "Reply-To: $email";

		$success = wp_mail( $toemail, $subject, $message, $headers); 

		$response = array('success'=>$success);

		if($success) {
			$response['success_msg'] = __("$name, Thank you for contacting us.", 'woc');
		} else {
			$response['error_msg'] = __('There was an error sending your message.', 'contempo');
		}

		wp_send_json($response);
    }
    add_action( 'wp_ajax_nopriv_submit-contact', 'ajax_submit_contact' );
    add_action( 'wp_ajax_submit-contact', 'ajax_submit_contact' ); 

?>
