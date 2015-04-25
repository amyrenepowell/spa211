<?php
/**
 * Booking Modal
 *
 * @package WP Day Spa
 * @subpackage Template
 */

global $ct_options;

?>
    
<div id="overlay">
    <div id="reservation">
        <a href="#" class="close"><?php _e('Close', 'contempo'); ?></a>
        <h5><?php _e('Book Your Reservation','contempo'); ?></h5>
        <form id="reservationform" method="post">

            <div id="formresponse" class="marT20 marB20"></div>

            <select name="service" id="service" class="marB8">
                <option value="Select a service"><?php _e('Select a service', 'contempo'); ?></option>
                <?php 

                    $args = array(
                        'post_type' => 'services',
                        'posts_per_page' => -1
                    );
                    $query = new WP_Query($args);
                
                    while ( $query->have_posts() ) : $query->the_post(); ?>

                        <option name="service" value="<?php the_title(); ?>"><?php the_title(); ?></option> 

                    <?php endwhile; wp_reset_postdata(); ?>
            </select>

            <input class="first" name="guests" id="guests" class="text-input" placeholder="<?php _e('How Many Guests','contempo'); ?>" type="number" />
            <input name="datetime" id="datetime" type="datetime-local" value="<?php $date = new DateTime(); $date->setTime(14, 55); echo $date->format('Y-m-d H:i:s A'); ?>" class="text-input" />
            <input name="name" id="name" placeholder="Name" />
            <input name="email" id="email" placeholder="Email" type="email" />
            <input name="phone" id="phone" placeholder="Phone" type="tel" />

            <input type="input" id="servicetype" name="servicetype" value="<?php the_title(); ?>" />

            <input type="input" id="ctreservationemail" name="ctreservationemail" value="<?php echo $ct_options['ct_reservation_email']; ?>" />
            <input type="input" id="ctreservationsubject" name="ctreservationsubject" value="<?php echo stripslashes($ct_options['ct_reservation_subject']); ?>" />
            
            <input type="submit" name="Submit" value="<?php _e('Confirm', 'contempo'); ?>" id="submit" class="btn confirm" /> 
            <i id="formloader" class="fa fa-refresh fa-spin"></i> 
        </form>
    </div>

    <div id="contacterror-placeholders" style="display:none;">
        <div class="notification error" id="required-guests"><?php _e('Number of guests is required', 'contempo'); ?></div>
        <div class="notification error" id="required-datetime"><?php _e('Date & Time is required', 'contempo'); ?></div>
        <div class="notification error" id="required-name"><?php _e('Name is required', 'contempo'); ?></div>
        <div class="notification error" id="required-email"><?php _e('Email is required', 'contempo'); ?></div>
        <div class="notification error" id="invalid-email"><?php _e('Enter a valid email', 'contempo'); ?></div>
        <div class="notification error" id="required-phone"><?php _e('Phone is required', 'contempo'); ?></div>
        <div class="notification success" id="success"><?php _e('Thank you for contacting us.', 'contempo'); ?></div>
    </div>

</div>