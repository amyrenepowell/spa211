'use strict';

/**
 * Core
 *
 * @package WP Day Spa
 * @subpackage JavaScript
 */

jQuery.noConflict();

(function($) {

    function woc_reset_cart_dropdown() {
        $('#cart-loader').show();
        $('#cart-anchor').hide();
        $('#cart-dropdown').remove();
        $('#cart-count').remove();
    }

    function woc_fetch_cart() {
        var cart_dropdown_template = $("#cart-dropdown-template").html();


        $.post(woc_global.ajax_url, {
                action : 'fetch-cart',
            },
            function( response ) {
                //console.log( response );
                $('#cart-loader').hide();
                $('#cart-anchor').show();
                $('#cart-anchor').after(_.template(cart_dropdown_template, response));
                var cart_dropdown = $('#cart-dropdown');

                    // http://snipplr.com/view.php?codeview&id=5259
                function isMouseLeaveOrEnter(e, handler) {
                    if (e.type != 'mouseout' && e.type != 'mouseover') return false;
                    var reltg = e.relatedTarget ? e.relatedTarget :
                    e.type == 'mouseout' ? e.toElement : e.fromElement;
                    while (reltg && reltg != handler) reltg = reltg.parentNode;
                    return (reltg != handler);
                }

                function openCart() {
                    cart_dropdown.stop().fadeIn();
                }

                function closeCart() {
                    cart_dropdown.stop().fadeOut();
                }

                var el = $( '#activate-cart-drop' ).get(0);
                el.addEventListener( 'mouseover', function(ev) { if( isMouseLeaveOrEnter( ev, this ) ) openCart(); } );
                el.addEventListener( 'mouseout', function(ev) { if( isMouseLeaveOrEnter( ev, this ) ) closeCart(); } );
            }
        );
    }


    $(document).ready(function(){
        $('#masthead .cart').css('display', 'inline-block');

        woc_fetch_cart();

        $('#masthead').on('click', '.remove-from-cart', function(e){
            e.preventDefault();

            var theIcon = $(this).find('i');
            theIcon.removeClass('fa-times').addClass('fa-refresh fa-spin');
            var cart_item_key = $(this).attr('data-product-key');

            $.post(woc_global.ajax_url, {
                    action : 'remove-from-cart',
                    cart_item_key: cart_item_key
                }, function(response) {
                    $('#subtotal-content').html('Subtotal: '+response.subtotal);
                    $('#cart-count').html(response.cart_contents_count);
                    theIcon.removeClass('fa-refresh fa-spin').addClass('fa-check');
                    $('#cart-item-'+cart_item_key).animate({height: 0}, function(){
                        $(this).remove();
                        if(response.cart_contents_count == 0) {
                            woc_reset_cart_dropdown();
                            woc_fetch_cart();
                        }
                    });
                });

        });

    });
})(jQuery);
