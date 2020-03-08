



@if(session()->has('user'))
<!-- Mini Cart Wrap Start -->
<div class="mini-cart-wrap">

    <!-- Mini Cart Top -->
    <div class="mini-cart-top">

        <button class="close-cart">Close Cart<i class="icofont icofont-close"></i></button>

    </div>

    <!-- Mini Cart Products -->
    <ul class="mini-cart-products" id="cart-products">

    </ul>

    <!-- Mini Cart Bottom -->
    <div class="mini-cart-bottom">

        <h4 class="sub-total">Total: <span id="totalPrice"></span></h4>

        <div class="button">
            <a href="checkout-dark.html">CHECK OUT</a>
        </div>

    </div>

</div><!-- Mini Cart Wrap End -->

<!-- Cart Overlay -->
<div class="cart-overlay"></div>
@endif
