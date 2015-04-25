/**
 * CT Mobile Menu
 *
 * @package WP Day Spa
 * @subpackage JavaScript
 */

jQuery(function($){
	$(document).ready(function(){

		$("<ul id='mobile-nav'>").appendTo(".mobile-nav");
		
		$("<a href='#' class='show-hide'><i class='icon-reorder'></i>", {
		}).appendTo("#masthead .container");

		$("#masthead ul a").each(function() {
			var el = $(this);
			if(el.parents('.sub-menu').length >= 1) {
				$('<a>', {
				 'href' : el.attr("href"),
				 'text' : ' - ' + el.text()
				}).appendTo("ul#mobile-nav").wrap('<li></li>');
			}
			else if(el.parents('.sub-menu .sub-menu').length >= 1) {
				$('<a>', {
				 'href' : el.attr('href'),
				 'text' : ' -- ' + el.text()
				}).appendTo("ul#mobile-nav").wrap('<li></li>');
			}
			else {
				$('<a>', {
				 'href' : el.attr('href'),
				 'text' : el.text()
				}).appendTo("ul#mobile-nav").wrap('<li></li>');
			}
		});
		
		$("#mobile-nav").hide();
		$(".show-hide").show();
		
		$('.show-hide').click(function(){
			$("#mobile-nav").slideToggle();
		});
	
	});
});