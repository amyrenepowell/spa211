'use strict';

/**
 * Core
 *
 * @package WP Day Spa
 * @subpackage JavaScript
 */

jQuery.noConflict();

(function($) {
	$(document).ready(function(){

		"use strict";

		$('.flexslider').resize();

		/*-----------------------------------------------------------------------------------*/
		/* Main Nav Setup */
		/*-----------------------------------------------------------------------------------*/

		if(!jQuery('#masthead #megaMenu').length) {
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		}

		var masthead_anim_to;

		$('#nav .sub-menu').before('<i class="icon-angle-down"></i>');

		$("ul.sub-menu").closest("li").addClass("drop");

		var masthead = $('#masthead'),
			masthead_h = masthead.height();
			masthead_anim_to = ($('body').hasClass('admin-bar')) ? '32px' : '0px';

		//TODO: Support CSS animation
		masthead.waypoint(function(direction) {
  			if(direction == 'down') {
  				masthead.css('top', '-'+masthead_h+'px').addClass('sticky').animate({'top': masthead_anim_to});
  			}
  			if(direction == 'up') {
  				masthead.removeClass('sticky').css('top', '');
  			}
		}, {
			offset: function() { return -$(this).height(); }
		});

		/*-----------------------------------------------------------------------------------*/
		/* Testimonials Widget */
		/*-----------------------------------------------------------------------------------*/
		
		$('.widget_ct_testimonials .testimonials').cycle({ 
			fx:     'fade', 
			speed:  'fast', 
			timeout: 0, 
			next:   '.next.test', 
			prev:   '.prev.test' 
		});

		/*-----------------------------------------------------------------------------------*/
		/* Remove height/width */
		/*-----------------------------------------------------------------------------------*/

		$('img').removeAttr('width').removeAttr('height');

		/*-----------------------------------------------------------------------------------*/
		/* Booking Modal Form */
		/*-----------------------------------------------------------------------------------*/

		$(".book-now").click(function() {

	        $("#overlay").addClass('open');
	        
	        var $service = $('#service');
	        var serviceName = $(this).attr('data-service');
	        
	        $service.find('option[value="'+serviceName+'"]').prop('selected', true);
			$service.customSelect();
			$service.trigger('render');
	    });

	    $(".close").click(function() {
	        $("#overlay").removeClass('open');
	    });

		/*-----------------------------------------------------------------------------------*/
		/* Add Zoom Class to Default WordPress Gallery */
		/*-----------------------------------------------------------------------------------*/

		$(".gallery-icon").addClass("zoom");

		/*-----------------------------------------------------------------------------------*/
		/* Remove Zoom Class from Woo Main Image */
		/*-----------------------------------------------------------------------------------*/

		$(".woocommerce-main-image").removeClass("zoom");

		/*-----------------------------------------------------------------------------------*/
		/* FitVids */
		/*-----------------------------------------------------------------------------------*/

		$("article").fitVids();

		/*-----------------------------------------------------------------------------------*/
		/* Testimonials Widget */
		/*-----------------------------------------------------------------------------------

		$('.widget_ct_testimonials .testimonials').cycle({
			fx:     'fade',
			speed:  'fast',
			timeout: 0,
			next:   '.next.test',
			prev:   '.prev.test'
		});

		/*-----------------------------------------------------------------------------------*/
		/* Portfolio Widget */
		/*-----------------------------------------------------------------------------------

		$('.widget_ct_portfolio .portfolio').cycle({
			fx:     'fade',
			speed:  'fast',
			timeout: 0,
			next:   '.next.port-item',
			prev:   '.prev.port-item'
		});

		/*-----------------------------------------------------------------------------------*/
		/* Symple Skillbar Shortcode */
		/*-----------------------------------------------------------------------------------*/

		$('.symple-skillbar').each(function(){
			$(this).find('.symple-skillbar-bar').animate({ width: $(this).attr('data-percent') }, 1500 );
		});

		/*-----------------------------------------------------------------------------------*/
		/* Initialize FitVids */
		/*-----------------------------------------------------------------------------------*/

		$(".container").fitVids();

		/*-----------------------------------------------------------------------------------*/
		/* Add class for prev/next icons */
		/*-----------------------------------------------------------------------------------*/

		$('.prev-next .nav-prev a').addClass('icon-arrow-left');
		$('.prev-next .nav-next a').addClass('icon-arrow-right');

		/*-----------------------------------------------------------------------------------*/
		/* Add Font Awesome Icon to Sitemap list */
		/*-----------------------------------------------------------------------------------*/

		$('.page-template-template-sitemap-php #main-content li a').before('<i class="icon-caret-right"></i>');

		/*-----------------------------------------------------------------------------------*/
		/* Isotope for portfolio filtering */
		/*-----------------------------------------------------------------------------------*/

		var $container = $('#isotope-container');

		// filter items when filter link is clicked
		$('#tags-filter a').click(function(e){
			e.preventDefault();
			var t = $(this);

			if(!t.hasClass('selected')) {
				var selector = t.attr('data-filter');
				$container.isotope({ filter: selector });
				$('#tags-filter a').removeClass('selected');
				t.addClass('selected');
			}
		});

		function wocPortfolioIsotope() {
            $container.imagesLoaded( function(){
                $container.isotope({
                    itemSelector: '.item',
                    layoutMode: 'sloppyMasonry',
                    animationOptions: {
                        duration: 400,
                        easing: 'swing',
                        queue: false
                    }
                });
            });
		}

        wocPortfolioIsotope();

		// Orientation change
		if (window.addEventListener) {
			window.addEventListener("orientationchange", function() {
				$container.isotope("reLayout");
			});
		}

		/*-----------------------------------------------------------------------------------*/
		/* Add margin right 0 isotope items */
		/*-----------------------------------------------------------------------------------*/

         $(".post-type-archive .grid li:nth-child(3n+3)").css("margin-right", "0");

         $(".page-template-demotemplate-4col-portfolio-php .grid li:nth-child(4n+4)").css("margin-right", "0");

         $(".page-template-demotemplate-2col-portfolio-php .grid li:nth-child(2n+2)").css("margin-right", "0");

		/*-----------------------------------------------------------------------------------*/
		/* Add last class to every fourth related portfolio item */
		/*-----------------------------------------------------------------------------------*/

		$(".single-portfolio .grid li:nth-child(4n+4)").css("margin-right", "0");

		/*-----------------------------------------------------------------------------------*/
		/* Add last class to every third related item, and every second testimonial */
		/*-----------------------------------------------------------------------------------*/

		$("li.related:nth-child(3n+3), .testimonial-home li:nth-child(2n+1)").addClass("last");

		/*-----------------------------------------------------------------------------------*/
		/* Add last class to footer widgets */
		/*-----------------------------------------------------------------------------------*/

		$("#latest-shoots li:nth-child(4n)").addClass("omega");

		/*-----------------------------------------------------------------------------------*/
		/* Search Bar Expansion */
		/*-----------------------------------------------------------------------------------*/

		var sbar = $('#search-bar'),
			search_input = $('#search-input');

		function toggle_search_bar() {
				if(!$(window).data('search-open')){
					sbar.show().animate({'height': '52px'}, 'fast');
					search_input.focus();
					$(window).data('search-open', true);
				} else {
					sbar.animate({'height': '0px'}, 'fast', function(){ sbar.hide(); });
					$(window).data('search-open', false);
				}
			}

			$('#activate-search, #search-close').click(function(e){
				e.preventDefault();
				toggle_search_bar();
			});
		});

		/*-----------------------------------------------------------------------------------*/
		/* Reservation Form Validation */
		/*-----------------------------------------------------------------------------------*/

		$('#reservationform').on('submit', function(e){
			e.preventDefault();

			$('#formresponse').html('');
			var errors = false;

			var name = $.trim($('#name').attr('value')),
				email = $.trim($('#email').attr('value')),
				phone = $.trim($('#phone').attr('value')),
				guests = $.trim($('#guests').attr('value')),
				datetime = $.trim($('#datetime').attr('value')),
				service = $('#service option:selected').text()

			if(guests == '') { $('#required-guests').clone().appendTo('#formresponse'); errors = true; }
			if(datetime == '') { $('#required-datetime').clone().appendTo('#formresponse'); errors = true; } 
			if(name == '') { $('#required-name').clone().appendTo('#formresponse'); errors = true; }
			if(email == '') { $('#required-email').clone().appendTo('#formresponse'); errors = true; } 
			if(phone == '') { $('#required-phone').clone().appendTo('#formresponse'); errors = true; } 

			else if(!validateEmail(email)) {
				$('#invalid-email').clone().appendTo('#formresponse');
				errors = true;
			}

			if(!errors) {
				console.log('send ajax call');
				$('#submit').hide();
				$('#formloader').show();
				$.post(woc_global.ajax_url, {
	                action : 'submit-contact',
	                contentType: false,
	                guests: guests,
	                datetime: datetime,
	                name: name,
	                email: email,
	                phone: phone,
	                service: service,

	            }, function(res) {
	            	$('#formloader').hide();
	            	if(res.success) {
	            		$('#formresponse').addClass('formsuccess').show();
	            		$('#formresponse').html('<div class="notification">'+res.success_msg+'</div>');
	            		$('#contactform fieldset').fadeOut();
	            	} else {
	            		$('#formresponse').addClass('formerror').show();
	            		$('#formresponse').html('<div class="notification">'+res.error_msg+'</div>');
	            		$('#submit').show();
	            	}
	            });
			}
		});

})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* Social Popups */
/*-----------------------------------------------------------------------------------*/

function popup(pageURL,title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
