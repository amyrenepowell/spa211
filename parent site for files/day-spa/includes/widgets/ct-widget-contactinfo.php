<?php
/**
 * Contact Info
 *
 * @package WP Day Spa
 * @subpackage Widget
 */
 
class ct_ContactInfo extends WP_Widget {

   function ct_ContactInfo() {
	   $widget_ops = array('description' => 'Use this widget to display your contact information.' );
	   parent::WP_Widget(false, __('CT Contact Info', 'contempo'),$widget_ops);      
   }

   function widget($args, $instance) {  
	extract( $args );
	$title = $instance['title'];
	$logo = $instance['logo'];
	$blurb = $instance['blurb'];
	$company = $instance['company'];
	$street = $instance['street'];
	$city = $instance['city'];
	$state = $instance['state'];
	$postal = $instance['postal'];
	$country = $instance['country'];
	$phone = $instance['phone'];
	$email = $instance['email'];
	$facebook = $instance['facebook'];
	$twitter = $instance['twitter'];
	$googleplus = $instance['googleplus'];
	$linkedin = $instance['linkedin'];
	$instagram = $instance['instagram'];
	$pinterest = $instance['pinterest'];

	global $ct_options;
	?>

		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; } ?>
		<?php if($logo == "Yes") { ?>
			<?php if($ct_options['ct_logo']) { ?>
				<a href="<?php echo home_url(); ?>"><img class="widget-logo marB30" src="<?php echo $ct_options['ct_logo']; ?>" alt="<?php bloginfo('name'); ?>" /></a>
			<?php } else { ?>
				<a href="<?php echo home_url(); ?>"><img class="widget-logo marB30" src="<?php echo get_template_directory_uri(); ?>/images/day-spa-logo.png" alt="WP Day Spa, a WordPress theme by Contempo." /></a>
			<?php } ?>
		<?php } ?>
        <?php if($blurb) { ?><p class="marB15"><?php echo $blurb; ?></p><?php } ?>

        <ul class="contact-info">
            <?php if($street) { ?><li><i class="fa fa-home"></i> <?php echo $street; ?><br /><?php echo $city; ?>, <?php echo $state; ?> <?php echo $postal; ?><br /><?php echo $country; ?></li><?php } ?>
            <?php if($phone) { ?><li><i class="fa fa-phone"></i> <?php echo $phone; ?></li><?php } ?>
            <?php if($email) { ?><li id="company-email"><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a></li><?php } ?>
        </ul>

        <ul class="contact-social">
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
            <?php if($pinterest != '') { ?>
                <li class="pinterest"><a href="<?php echo $pinterest; ?>"><i class="fa fa-pinterest"></i></a></li>
            <?php } ?>
            <?php if($instagram != '') { ?>
                <li class="instagram"><a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a></li>
            <?php } ?>
        </ul>
		<?php echo $after_widget; ?>   
    <?php
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {    
   
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';    
		$blurb = isset( $instance['blurb'] ) ? esc_attr( $instance['blurb'] ) : '';
		$company = isset( $instance['company'] ) ? esc_attr( $instance['company'] ) : '';
		$street = isset( $instance['street'] ) ? esc_attr( $instance['street'] ) : '';
		$city = isset( $instance['city'] ) ? esc_attr( $instance['city'] ) : '';
		$state = isset( $instance['state'] ) ? esc_attr( $instance['state'] ) : '';
		$postal = isset( $instance['postal'] ) ? esc_attr( $instance['postal'] ) : '';
		$country = isset( $instance['country'] ) ? esc_attr( $instance['country'] ) : '';
		$phone = isset( $instance['phone'] ) ? esc_attr( $instance['phone'] ) : '';
		$email = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
		$facebook = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
		$twitter = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
		$linkedin = isset( $instance['linkedin'] ) ? esc_attr( $instance['linkedin'] ) : '';
		$googleplus = isset( $instance['googleplus'] ) ? esc_attr( $instance['googleplus'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_attr( $instance['instagram'] ) : '';
		$pinterest = isset( $instance['pinterest'] ) ? esc_attr( $instance['pinterest'] ) : '';

		$logo = isset( $instance['logo'] ) ? esc_attr( $instance['logo'] ) : '';

		?>
		<p>
            <label for="<?php echo $this->get_field_id('logo'); ?>"><?php _e('Show Logo:','contempo'); ?></label>
            <select name="<?php echo $this->get_field_name('logo'); ?>" class="widefat" id="<?php echo $this->get_field_id('logo'); ?>">
                <option value="Yes" <?php if($logo == 'Yes'){ echo "selected='selected'";} ?>><?php _e('Yes', 'contempo'); ?></option>
                <option value="No" <?php if($logo == 'No'){ echo "selected='selected'";} ?>><?php _e('No', 'contempo'); ?></option>
            </select>
        </p>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('blurb'); ?>"><?php _e('Blurb:','contempo'); ?></label>
			<textarea name="<?php echo $this->get_field_name('blurb'); ?>" class="widefat" id="<?php echo $this->get_field_id('blurb'); ?>"><?php echo $blurb; ?></textarea>
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('company'); ?>"><?php _e('Company Name:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('company'); ?>"  value="<?php echo $company; ?>" class="widefat" id="<?php echo $this->get_field_id('company'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('street'); ?>"><?php _e('Street Address:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('street'); ?>"  value="<?php echo $street; ?>" class="widefat" id="<?php echo $this->get_field_id('street'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('city'); ?>"><?php _e('City:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('city'); ?>"  value="<?php echo $city; ?>" class="widefat" id="<?php echo $this->get_field_id('city'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('state'); ?>"><?php _e('State:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('state'); ?>"  value="<?php echo $state; ?>" class="widefat" id="<?php echo $this->get_field_id('state'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('postal'); ?>"><?php _e('Postal:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('postal'); ?>"  value="<?php echo $postal; ?>" class="widefat" id="<?php echo $this->get_field_id('postal'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('country'); ?>"><?php _e('Country:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('country'); ?>"  value="<?php echo $country; ?>" class="widefat" id="<?php echo $this->get_field_id('country'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('phone'); ?>"  value="<?php echo $phone; ?>" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('email'); ?>"  value="<?php echo $email; ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>"  value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('twitter'); ?>"  value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('Google+:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('googleplus'); ?>"  value="<?php echo $googleplus; ?>" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>"  value="<?php echo $linkedin; ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>"  value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
		</p>
		<?php
	}
} 

register_widget('ct_ContactInfo');
?>