<?php
/**
 * Header Template
 *
 * @package WP Day Spa
 * @subpackage Template
 */

// Load Theme Options
global $ct_options;
global $woocommerce;

// Set Header Variables
$cttopbar = isset( $ct_options['ct_header_topbar'] ) ? esc_attr( $ct_options['ct_header_topbar'] ) : ''; 
$facebook = isset( $ct_options['ct_fb_url'] ) ? esc_attr( $ct_options['ct_fb_url'] ) : '';    
$twitter = isset( $ct_options['ct_twitter_url'] ) ? esc_attr( $ct_options['ct_twitter_url'] ) : '';  
$linkedin = isset( $ct_options['ct_linkedin_url'] ) ? esc_attr( $ct_options['ct_linkedin_url'] ) : '';  
$googleplus = isset( $ct_options['ct_googleplus_url'] ) ? esc_attr( $ct_options['ct_googleplus_url'] ) : '';  
$dribbble = isset( $ct_options['ct_dribbble_url'] ) ? esc_attr( $ct_options['ct_dribbble_url'] ) : ''; 
$pinterest = isset( $ct_options['ct_pinterest_url'] ) ? esc_attr( $ct_options['ct_pinterest_url'] ) : '';  
$instagram = isset( $ct_options['ct_instagram_url'] ) ? esc_attr( $ct_options['ct_instagram_url'] ) : ''; 
$github = isset( $ct_options['ct_github_url'] ) ? esc_attr( $ct_options['ct_github_url'] ) : '';  
$contact = isset( $ct_options['ct_contact_url'] ) ? esc_attr( $ct_options['ct_contact_url'] ) : ''; 
$phone = isset( $ct_options['ct_contact_phone_header'] ) ? esc_attr( $ct_options['ct_contact_phone_header'] ) : '';

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php if (is_plugin_active('woocommerce/woocommerce.php')) {
        get_template_part('/includes/js-tmpl-woocart');
    } ?>

    <?php wp_head(); ?>
</head>

<body<?php woc_body_id('top'); ?> <?php body_class(); ?>>

<!-- Wrapper -->
<div id="wrapper">

	<div id="masthead-anchor"></div>

    <?php get_template_part('includes/booking-modal'); ?>

    <?php if($cttopbar == "Yes") { ?>
    <!-- Top Bar -->
    <style type="text/css">#masthead { top: 37px;} </style>
    <div id="topbar-wrap">
        <div class="container">
            <p class="marB0 left"><?php bloginfo('description'); ?></p>
            <div class="right">
                <ul class="social left">
                    <?php if($facebook != '') { ?>
                        <li class="facebook"><a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if($twitter != '') { ?>
                        <li class="twitter"><a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if($linkedin != '') { ?>
                        <li class="linkedin"><a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if($googleplus != '') { ?>
                        <li class="google"><a href="<?php echo $googleplus; ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                    <?php if($dribbble != '') { ?>
                        <li class="dribbble"><a href="<?php echo $dribbble; ?>"><i class="fa fa-dribbble"></i></a></li>
                    <?php } ?>
                    <?php if($pinterest != '') { ?>
                        <li class="pinterest"><a href="<?php echo $pinterest; ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
                    <?php if($instagram != '') { ?>
                        <li class="instagram"><a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                    <?php if($github != '') { ?>
                        <li class="github"><a href="<?php echo $github; ?>"><i class="fa fa-github"></i></a></li>
                    <?php } ?>
                    <?php if($contact != '') { ?>
                        <li class="contact"><a href="<?php echo $contact; ?>"><i class="fa fa-envelope"></i></a></li>
                    <?php } ?>
                </ul>
                <div class="contact-phone right">
                    <?php echo $phone; ?>
                </div>
            </div>
                <div class="clear"></div>
        </div>
    </div>
    <!-- //Top Bar -->
    <?php } ?>

	<!-- Masthead -->
	<header id="masthead" class="row">
		<div class="container">

            <div class="col span_5">
                <?php ct_nav_left(); ?>
            </div>
			<div class="col span_2">

                <?php if($ct_options['ct_logo']) { ?>
                    <a href="<?php echo home_url(); ?>"><img class="site-logo" src="<?php echo $ct_options['ct_logo']; ?>" alt="<?php bloginfo('name'); ?>" /></a>
                <?php } else { ?>
                    <a href="<?php echo home_url(); ?>"><img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/images/day-spa-logo.png" alt="WP Day Spa, a WordPress theme by Contempo" /></a>
                <?php } ?>

                <span class="sticky-logo"><img src="/wp-content/themes/spa211/images/spa211-stickylogo.png" /></span>
				
			</div>
			<div class="col span_5">
                <div class="col span_11">
    				<?php ct_nav_right(); ?>
                </div>
                <ul class="right-nav col span_1">
                    <?php /* <li class="search"><a href="#" id="activate-search"><i class="fa fa-search"></i></a></li> */ ?>
                    <?php
                    if (is_plugin_active('woocommerce/woocommerce.php')) {
                        global $woocommerce;
                        $cart_url = $woocommerce->cart->get_cart_url();
                    ?>
                    <li class="cart" id="activate-cart-drop"><i id="cart-loader" class="fa fa-refresh fa-spin"></i><a id="cart-anchor" href="<?php echo $cart_url; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                    <?php } ?>
                </ul>
                    <div class="clear"></div>
			</div>

            <div class="mobile-nav col span_12 first"></div>

                <div class="clear"></div>

		</div>

        <?php /*
        <div id="search-bar">
            <div class="container">
                <i class="fa fa-search"></i>
                <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                    <input id="search-input" type="text" placeholder="Search" name="s" autocomplete="off" />
                    <input type="submit" value="Search">
                </form>
                <a id="search-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        */?>
	</header>
	<!-- //Masthead -->
