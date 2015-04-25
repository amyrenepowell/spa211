<?php
/**
 * Functions
 *
 * @package WP Prohibtion
 * @subpackage Admin
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Left Sidebar Blog',
		'description' => 'Widgets in this area will be shown in the left sidebar area of archives.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Right Sidebar Blog',
		'description' => 'Widgets in this area will be shown in the right sidebar area of archives.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Left Sidebar Single',
		'description' => 'Widgets in this area will be shown in the left sidebar area of single posts.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Right Sidebar Single',
		'description' => 'Widgets in this area will be shown in the right sidebar area of single posts.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Left Sidebar Page',
        'description' => 'Widgets in this area will be shown in the left sidebar area of pages.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Right Sidebar Contact Page',
        'description' => 'Widgets in this area will be shown in the right sidebar area of the contact page template.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Right Sidebar Page',
        'description' => 'Widgets in this area will be shown in the right sidebar area of pages.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

if(is_plugin_active('woocommerce/woocommerce.php')) {
    if ( function_exists('register_sidebar') )
        register_sidebar(array(
            'name' => 'WooCommerce Right Sidebar',
            'description' => 'Widgets in this area will be shown in the right sidebar area of WooCommerce pages.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s left">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
    ));
}

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer',
		'description' => 'Widgets in this area will be shown in the footer.',
        'before_widget' => '<aside id="%1$s" class="widget col span_4 %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
));

/*-----------------------------------------------------------------------------------*/
/* Localization Support
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain( 'contempo', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);

/*-----------------------------------------------------------------------------------*/
/* Framework Functions
/*-----------------------------------------------------------------------------------*/

// Define some constant paths
define('INC_PATH', get_template_directory() . '/includes/');

// Load Framework
require_once ('admin/index.php');

// Fonts
require_once (ADMIN_PATH . 'ct-fonts.php');

// Child Theme Creator
require_once (ADMIN_PATH . 'ct-child-theme/ct-child-theme.php');

// Plugin Activation
require_once (ADMIN_PATH . 'plugins/register.php');

// Custom Taxonomies
require_once (ADMIN_PATH . 'ct-custom-taxonomies.php');

// Aqua Resizer
require_once (ADMIN_PATH . 'aq-resizer/aq_resizer.php');

// Page Builder
require_once (ADMIN_PATH . 'page-builder/page-builder.php');
require_once (ADMIN_PATH . 'page-builder/page-builder-block-functions.php');

// Custom Metaboxes
require_once(ADMIN_PATH . 'metabox/metaboxes.php');

// CT Social Widget
require_once (ADMIN_PATH . 'ct-social/ct-social.php');

// Theme Functions
require_once (ADMIN_PATH . 'theme-functions.php');

// Widgets
require_once (INC_PATH . 'widgets.php');

// WooCommerce Functions
if(is_plugin_active('woocommerce/woocommerce.php')) {
    require_once (ADMIN_PATH . 'woc-woocommerce.php');
}

add_action('wp_head', 'woc_wp_head');

?>