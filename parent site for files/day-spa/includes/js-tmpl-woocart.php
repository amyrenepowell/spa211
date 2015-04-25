<script type="text/template" id="cart-dropdown-template">
    <span id="cart-count"><%- cart_contents_count %></span>
    <ul id="cart-dropdown">
    <li class="upcaret fa fa-caret-up fa-3x"></li>
    <% if(cart_contents_count == 0) { %>
        <li class="empty">Your cart is empty. Check out <a href="<%- shop_url %>">our shop</a>.</li>
    <% }  else { %>
    <% _.each(cart_contents, function(item, key, arr) { %>
        <li class="cart-item" id="cart-item-<%- item.cart_item_key %>">
            <div class="cart-item">
                <span class="product-image"><%= item.image %></span>
                <span class="product-info product-quantity"><%- item.quantity %></span>
                <span class="product-info product-title"><%- item.title %></span>
                <div class="product-info right">
                    <span class="product-price"><%= item.price %></span>
                    <a href="#" class="remove-from-cart" data-product-key="<%- item.cart_item_key %>"><i class="fa fa-times"></i></a>
                </div>
            </div>
        </li>
    <% }); %>
        <li class="subtotal"><span class="right" id="subtotal-content">Subtotal: <%= subtotal %></span></li>
        <li class="checkout"><a class="button alt" href="<%- cart_url %>">Checkout</a></li>
    <% } %>
    </ul>
</script>
