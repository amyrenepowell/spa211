<?php
// Include & setup custom metabox and fields
$prefix = '_ct_'; // start with an underscore to hide fields from custom fields list
add_filter( 'cmb_meta_boxes', 'ct_metaboxes' );

function ct_metaboxes( $meta_boxes ) {
	global $prefix;
	
	$meta_boxes[] = array(
		'id' => 'post_options_metabox',
		'title' => 'Post Options',
		'pages' => array('post','galleries'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(

			array(
				'name' => 'Post Lead',
				'desc' => 'Display Featured Image on Archive Pages?',
				'id' => $prefix . 'post_lead',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Title',
				'desc' => 'Display Post Title?.',
				'id' => $prefix . 'post_title',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Sub Title',
				'desc' => 'Enter the sub title here, if you\'d like to use one.',
				'id' => $prefix . 'sub_title',
				'type' => 'text'
			),
			array(
				'name' => 'Post Header Background Image',
				'desc' => 'Use Featured Image as Header Background?.',
				'id' => $prefix . 'post_header_bg',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
			    'name' => 'Post Header Background Color',
			    'desc' => 'If you don\'t have a featured post image, you can specify a custom bg color for your header here.)',
			    'id'   => $prefix . '_post_header_bg_color',
			    'type' => 'colorpicker',
			    'default'  => '',
			    'repeatable' => false,
			),
			array(
				'name' => 'Meta',
				'desc' => 'Display Post Meta?.',
				'id' => $prefix . 'post_meta',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Social',
				'desc' => 'Display Post Social?.',
				'id' => $prefix . 'post_social',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'port_meta_metabox',
		'title' => 'Portfolio Item Details',
		'pages' => array('portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Short Description',
				'desc' => 'A short single line description.',
				'id' => $prefix . 'short_desc',
				'type' => 'text'
			),
			array(
				'name' => 'Skills',
				'desc' => 'List the skills required here, ex: Art Direction, Design, Illustration.',
				'id' => $prefix . 'skills',
				'type' => 'text'
			),
			array(
				'name' => 'Client',
				'desc' => 'Enter the client name here.',
				'id' => $prefix . 'client',
				'type' => 'text'
			),
			array(
				'name' => 'Site',
				'desc' => 'Enter the site url here.',
				'id' => $prefix . 'site',
				'type' => 'text'
			),
			array(
				'name' => 'Post Header Background Image',
				'desc' => 'Add a background image for your post header.',
				'id' => $prefix . 'port_post_header_bg_image',
				'type' => 'file'
			),
			array(
			    'name' => 'Header Background Color',
			    'id'   => $prefix . 'port_post_header_bg_color',
			    'type' => 'colorpicker',
			    'default'  => '',
			    'repeatable' => false,
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'bg_metabox',
		'title' => 'Page Options',
		'pages' => array('home'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Full Width',
				'desc' => 'Choose if you\'d the page to span the full width of the browser.',
				'id' => $prefix . 'page_full_width',
				'type' => 'select',
				'options' => array(
					array('name' => 'No', 'value' => 'No'),
					array('name' => 'Yes', 'value' => 'Yes'),		
				)
			),
			array(
				'name' => 'Panel Padding',
				'desc' => 'Specify the padding here, example 60px 0 60px 0.',
				'id' => $prefix . 'page_panel_padding',
				'type' => 'text'
			),
			array(
				'name' => 'Display Page Title?',
				'desc' => 'Select whether or not you\'d like to display the page title?.',
				'id' => $prefix . 'page_title',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Title Alignment',
				'desc' => 'Choose the text alignment.',
				'id' => $prefix . 'page_title_align',
				'type' => 'select',
				'options' => array(
					array('name' => 'left', 'value' => 'left'),
					array('name' => 'right', 'value' => 'right'),
					array('name' => 'center', 'value' => 'center'),			
				)
			),
			array(
				'name' => 'Title Margin Bottom',
				'desc' => 'Specify the amount of bottom margin, example 10px.',
				'id' => $prefix . 'page_title_margin',
				'type' => 'text'
			),
			array(
				'name' => 'Heading Color',
				'desc' => 'Choose a heading color for your page/panel, example #efefef or #555. Or see this online <a href="http://www.colorpicker.com/">Color Picking Tool</a> or <a href="http://www.colourlovers.com/colors">Color Lovers</a>.',
				'id' => $prefix . 'heading_color',
				'type' => 'text'
			),
			array(
				'name' => 'Content Alignment',
				'desc' => 'Choose the text alignment.',
				'id' => $prefix . 'content_align',
				'type' => 'select',
				'options' => array(
					array('name' => 'left', 'value' => 'left'),
					array('name' => 'right', 'value' => 'right'),
					array('name' => 'center', 'value' => 'center'),			
				)
			),
			array(
				'name' => 'Content Color',
				'desc' => 'Choose a content color for your page/panel, example #efefef or #555. Or see this online <a href="http://www.colorpicker.com/">Color Picking Tool</a> or <a href="http://www.colourlovers.com/colors">Color Lovers</a>.',
				'id' => $prefix . 'content_color',
				'type' => 'text'
			),
			array(
				'name' => 'Background Color',
				'desc' => 'Add a background color for your page/panel, example #efefef or #555. Or see this online <a href="http://www.colorpicker.com/">Color Picking Tool</a> or <a href="http://www.colourlovers.com/colors">Color Lovers</a>.',
				'id' => $prefix . 'bg_color',
				'type' => 'text'
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Add a background image for your page/panel.',
				'id' => $prefix . 'bg_image',
				'type' => 'file'
			),
			array(
				'name' => 'Background Repeat',
				'desc' => 'Select your background repeat',
				'id' => $prefix . 'bg_repeat',
				'type' => 'select',
				'options' => array(
					array('name' => '', 'value' => ''),
					array('name' => 'no-repeat', 'value' => 'no-repeat'),
					array('name' => 'repeat-x', 'value' => 'repeat-x'),
					array('name' => 'repeat-y', 'value' => 'repeat-y'),	
					array('name' => 'repeat', 'value' => 'repeat')				
				)
			),
			array(
				'name' => 'Background Position',
				'desc' => 'Enter your background position, x% y% for documentation see <a href="http://www.w3schools.com/cssref/pr_background-position.asp">W3 Schools</a>',
				'id' => $prefix . 'bg_position',
				'type' => 'text'
			),
			array(
				'name' => 'Background Attachment',
				'desc' => 'Select your background attachment',
				'id' => $prefix . 'bg_attachement',
				'type' => 'select',
				'options' => array(
					array('name' => '', 'value' => ''),
					array('name' => 'scroll', 'value' => 'scroll'),
					array('name' => 'fixed', 'value' => 'fixed'),
					array('name' => 'inherit', 'value' => 'inherit')			
				)
			)
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'bg_metabox',
		'title' => 'Page Options',
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Display Page Title?',
				'desc' => 'Select whether or not you\'d like to display the page title?.',
				'id' => $prefix . 'inside_page_title',
				'type' => 'select',
				'options' => array(
					array('name' => 'Yes', 'value' => 'Yes'),
					array('name' => 'No', 'value' => 'No'),			
				)
			),
			array(
				'name' => 'Sub Title',
				'desc' => 'Enter the sub title here, if you\'d like to use one.',
				'id' => $prefix . 'page_sub_title',
				'type' => 'text'
			),
			array(
				'name' => 'Page Header Background Image',
				'desc' => 'Add a background image for your page header.',
				'id' => $prefix . 'page_header_bg_image',
				'type' => 'file'
			)
		)
	);

	$meta_boxes[] = array(
		'id' => 'bg_metabox',
		'title' => 'Pricing',
		'pages' => array('services'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Price One',
				'desc' => 'Enter the price here.',
				'id' => $prefix . 'price_one',
				'type' => 'text'
			),
			array(
				'name' => 'Time One',
				'desc' => 'Enter the time here.',
				'id' => $prefix . 'time_one',
				'type' => 'text'
			),
			array(
				'name' => 'Price Two',
				'desc' => 'Enter the price here.',
				'id' => $prefix . 'price_two',
				'type' => 'text'
			),
			array(
				'name' => 'Time Two',
				'desc' => 'Enter the time here.',
				'id' => $prefix . 'time_two',
				'type' => 'text'
			),
			array(
				'name' => 'Price Three',
				'desc' => 'Enter the price here.',
				'id' => $prefix . 'price_three',
				'type' => 'text'
			),
			array(
				'name' => 'Time Three',
				'desc' => 'Enter the time here.',
				'id' => $prefix . 'time_three',
				'type' => 'text'
			),
		)
	);

	$meta_boxes[] = array(
		'id' => 'bg_metabox',
		'title' => 'More Info',
		'pages' => array('staff'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Title',
				'desc' => 'Enter their job title handle here.',
				'id' => $prefix . 'job_title',
				'type' => 'text'
			),
			array(
				'name' => 'Twitter',
				'desc' => 'Enter their Twitter handle here.',
				'id' => $prefix . 'twitterhandle',
				'type' => 'text'
			),
			array(
				'name' => 'Facebook',
				'desc' => 'Enter their Facebook URL here.',
				'id' => $prefix . 'facebookurl',
				'type' => 'text'
			),
			array(
				'name' => 'LinkedIn',
				'desc' => 'Enter their Lin kedIn URL here.',
				'id' => $prefix . 'linkedinurl',
				'type' => 'text'
			),
			array(
				'name' => 'Google+',
				'desc' => 'Enter their Google+ URL here.',
				'id' => $prefix . 'gplus',
				'type' => 'text'
			),
		)
	);

	$meta_boxes[] = array(
		'id' => 'business_metabox',
		'title' => 'More Info',
		'pages' => array('testimonial'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Title',
				'desc' => 'Enter the persons title here.',
				'id' => $prefix . 'person_title',
				'type' => 'text_medium'
			),
			array(
				'name' => 'Business',
				'desc' => 'Enter the business name here.',
				'id' => $prefix . 'business',
				'type' => 'text_medium'
			),
			array(
				'name' => 'Website',
				'desc' => 'Enter the website URL here.',
				'id' => $prefix . 'site_url',
				'type' => 'text_medium'
			),
		)
	);

	$meta_boxes[] = array(
		'id' => 'video_metabox',
		'title' => 'Video',
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Video',
				'desc' => 'Paste your video embed code here, size will automatically be adjusted to fit.',
				'id' => $prefix . 'video',
				'type' => 'textarea_code'
			),
		)
	);
	
	return $meta_boxes;
}

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once (ADMIN_PATH . 'metabox/init.php');
	}
}