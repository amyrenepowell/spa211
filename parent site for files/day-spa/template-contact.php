<?php
/**
 * Template Name: Contact
 *
 * @package WP Day Spa
 * @subpackage Template
 */

get_header();

wp_reset_postdata();

$address = isset( $ct_options['ct_contact_details_location'] ) ? esc_attr( $ct_options['ct_contact_details_location'] ) : ''; 
$phone = isset( $ct_options['ct_contact_phone'] ) ? esc_attr( $ct_options['ct_contact_phone'] ) : ''; 
$email = isset( $ct_options['ct_contact_email'] ) ? esc_attr( $ct_options['ct_contact_email'] ) : ''; 
$facebook = isset( $ct_options['ct_fb_url'] ) ? esc_attr( $ct_options['ct_fb_url'] ) : '';    
$twitter = isset( $ct_options['ct_twitter_url'] ) ? esc_attr( $ct_options['ct_twitter_url'] ) : '';  
$linkedin = isset( $ct_options['ct_linkedin_url'] ) ? esc_attr( $ct_options['ct_linkedin_url'] ) : '';  
$googleplus = isset( $ct_options['ct_googleplus_url'] ) ? esc_attr( $ct_options['ct_googleplus_url'] ) : '';  
$dribbble = isset( $ct_options['ct_dribbble_url'] ) ? esc_attr( $ct_options['ct_dribbble_url'] ) : ''; 
$pinterest = isset( $ct_options['ct_pinterest_url'] ) ? esc_attr( $ct_options['ct_pinterest_url'] ) : '';  
$instagram = isset( $ct_options['ct_instagram_url'] ) ? esc_attr( $ct_options['ct_instagram_url'] ) : ''; 
$github = isset( $ct_options['ct_github_url'] ) ? esc_attr( $ct_options['ct_github_url'] ) : ''; 

?>
	
	<?php if($ct_options['ct_contact_map'] == "Yes") { ?>
	<!-- Single Header -->
	<div id="single-header">
		<?php woc_contact_us_map(); ?>
	</div>
	<!-- //Single Header -->
	<?php } ?>

	<!-- Container -->
	<div class="container marT60 padB60" <?php if($ct_options['ct_contact_map'] == "No") { ?>style="padding-top: 120px;"<?php } ?>>

		<!-- Page Content -->
		<div class="content col span_12">
			
			<?php the_content(); ?>

			<form id="contactform" class="formular col span_9 first" method="post">

                <fieldset class="col span_11">
	                <div class="col span_4">
	                    <input type="text" name="name" id="name" class="validate[required,custom[onlyLetter]] text-input" placeholder="<?php _e('Name*', 'contempo'); ?>" />
                    </div>
                    
                    <div class="col span_4">
	                    <input type="text" name="email" id="email" class="validate[required,custom[email]] text-input" placeholder="<?php _e('Email*', 'contempo'); ?>" />
                    </div>

                    <div class="col span_4">
	                    <input type="text" name="phone" id="phone" class="text-input" placeholder="<?php _e('Phone', 'contempo'); ?>" />                             
                    </div>

                    <input type="text" name="subject" id="subject" class="validate[required,custom[onlyLetter]] text-input" placeholder="<?php _e('Subject*', 'contempo'); ?>" />
                    
                    <textarea class="validate[required,length[2,2000]] text-input" name="message" id="message" rows="12" cols="10" placeholder="<?php _e('Message', 'contempo'); ?>"></textarea>

                    <input type="hidden" id="ctyouremail" name="ctyouremail" value="<?php echo $ct_options['ct_contact_email']; ?>" />
                    <input type="hidden" id="ctsubject" name="ctsubject" value="<?php echo stripslashes($ct_options['ct_contact_subject']); ?>" />
                    
                        <div class="clear"></div>
                    
                    <input type="submit" name="<?php _e('Submit','contempo'); ?>" value="<?php _e('Submit','contempo'); ?>" id="submit" class="btn" />
					<i id="formloader" class="fa fa-refresh fa-spin"></i>
                </fieldset>
            </form>

            <div id="sidebar" class="col span_3">
	            <div id="sidebar-inner" class="contact-details">
		            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Contact Page') ) :else: endif; ?>
	            </div>
	        </div>

		</div>
		<!-- //Page Content -->
			<div class="clear"></div>
	</div>
	<!-- //Container -->

<?php get_footer(); ?>