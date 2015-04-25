<?php

global $ct_options;

$use_bg = ''; $background = ''; $custom_bg = ''; $body_face = '';

if(isset($ct_options['ct_background_image'])) {
	$use_bg = $ct_options['ct_background_image'];
}

if($use_bg) {

	$custom_bg = $ct_options['ct_body_bg_image'];
	
	if(!empty($custom_bg)) {
		$bg_img = $custom_bg;
	} else {
		$bg_img = isset( $ct_options['ct_custom_bg'] ) ? esc_attr( $ct_options['ct_custom_bg'] ) : '';
	}
	
	$bg_pos = $ct_options['ct_body_bg_pos'];
	
	$ct_custom_bg = isset( $ct_options['ct_custom_bg'] ) ? esc_attr( $ct_options['ct_custom_bg'] ) : '';
	
	if($ct_custom_bg) {
		$bg_rep = 'repeat';
	} else {
		$bg_rep = $ct_options['ct_body_bg_repeat'];
	}
	
	$background = 'url('. $bg_img .') '.$bg_pos.' '.$bg_rep ;

}

?>
<style type="text/css">
<?php if($ct_options['ct_body_bg_color']) { ?>
	body { background-color:<?php echo $ct_options['ct_body_bg_color']; ?> <?php if($background != "") { echo $background; } ?> !important;}
<?php } ?>
<?php if($background) { ?>
	body { background:<?php echo $background; ?> !important;}
<?php }

/*-----------------------------------------------------------------------------------*/
/* Top Bar */
/*-----------------------------------------------------------------------------------*/

if(!empty($ct_options['ct_header_bar_color'])) {
	echo "#topbar-wrap, .advanced-search p, .flex-caption a { background: " . $ct_options['ct_header_bar_color'] . " !important; border-bottom-color: " . $ct_options['ct_header_bar_color'] . " !important;}";
}

if(!empty($ct_options['ct_header_bar_color'])) {
	echo "#topbar-wrap { background: " . $ct_options['ct_header_bar_color'] . ";}";
}

if(!empty($ct_options['ct_header_bar_color'])) {
	echo "#topbar-wrap .social li:first-child a { border-left-color: " . $ct_options['ct_header_bar_border_color'] . ";}";
	echo "#topbar-wrap .social a { border-right-color: " . $ct_options['ct_header_bar_border_color'] . ";}";
}

if(!empty($ct_options['ct_header_bar_phone_color'])) {
	echo "#topbar-wrap .contact-phone { background: " . $ct_options['ct_header_bar_phone_color'] . ";}";
}

if(!empty($ct_options['ct_header_bar_font_color'])) {
	echo "#topbar-wrap, #topbar-wrap a, #topbar-wrap a:visited { color: " . $ct_options['ct_header_bar_font_color'] . ";}";
}

/*-----------------------------------------------------------------------------------*/
/* Header */
/*-----------------------------------------------------------------------------------*/

if(!empty($ct_options['ct_header_background'])) {
	echo "#masthead, #masthead.sticky, .flex-caption p, #reply-title small a, .comment-reply-link, .grid figcaption a, input.btn, .grid-listing-info header, .list-listing-info header, .single-listings header.listing-location { background: " . $ct_options['ct_header_background'] . ";}";
}

if(!empty($ct_options['ct_header_nav_font_color'])) {
	echo ".cbp-tm-menu > li > a, p.location { color: " . $ct_options['ct_header_nav_font_color'] . " !important;}";
}

if(!empty($ct_options['ct_header_nav_current_bg'])) {
	echo ".cbp-tm-menu li.current-menu-item a, .cbp-tm-menu li.current_page_parent a { border-top-color: " . $ct_options['ct_header_nav_current_bg'] . " !important;}";
}

/*-----------------------------------------------------------------------------------*/
/* Buttons */
/*-----------------------------------------------------------------------------------*/

if(!empty($ct_options['ct_button_bg'])) {
	echo "a.btn, .btn, #masthead #cart-count { background-color: " . $ct_options['ct_button_bg'] . " !important;}";
}

/*-----------------------------------------------------------------------------------*/
/* Links */
/*-----------------------------------------------------------------------------------*/

if(!empty($ct_options['ct_link_color'])) {
	echo " a, .more, .pagination .current {color: " . $ct_options['ct_link_color'] . " !important;}";
}

if(!empty($ct_options['ct_visited_color'])) {
	echo " a:visited {color: " . $ct_options['ct_visited_color'] . " !important;}";
}

if(!empty($ct_options['ct_hover_color'])) {
	echo " a:hover, .more:hover, .pagination a:hover {color: " . $ct_options['ct_hover_color'] . " !important;}";
}

if(!empty($ct_options['ct_active_color'])) {
	echo " a:active, .more:active, .pagination a:active {color: " . get_option("ct_alink_color", true) . " !important;}";
}

/*-----------------------------------------------------------------------------------*/
/* Footer */
/*-----------------------------------------------------------------------------------*/

if(!empty($ct_options['ct_footer_widget_background'])) {
	echo " #footer-widgets {background: " . $ct_options['ct_footer_widget_background'] . " !important;}";
}

if(!empty($ct_options['ct_footer_border_top_color'])) {
	echo " #footer-widgets .container { border-top-color: " . $ct_options['ct_footer_border_top_color'] . " !important;}";
}

if(!empty($ct_options['ct_footer_widget_font_color'])) {
	echo " #footer-widgets .widget, #footer-widgets .widget a, #footer-widgets .widget a:visited, #footer-widgets .widget li  { color: " . $ct_options['ct_footer_widget_font_color'] . " !important; border-bottom-color: " . $ct_options['ct_footer_widget_font_color'] . " !important;}";
}

if(!empty($ct_options['ct_footer_link_color'])) {
	echo "footer, footer nav ul li a, footer nav ul li a:visited, footer a, footer a:visited { color: " . $ct_options['ct_footer_link_color'] . " !important;}";
}

if(!empty($ct_options['ct_footer_background'])) {
	echo " footer {background: " . $ct_options['ct_footer_background'] . " !important;}";
}

/*-----------------------------------------------------------------------------------*/
/* Custom CSS */
/*-----------------------------------------------------------------------------------*/

if(!empty($ct_options['ct_custom_css'])) {
	print($ct_options['ct_custom_css']); 
} ?>

</style>