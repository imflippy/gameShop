
<body class="theme-dark">
<!-- Header Section Start -->
<div class="header-section section">

    <!-- Header Top Start -->
    <div class="header-top header-top-three bg-ivory pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <div class="col mt-10 mb-10">
                    <!-- Header Account Links Start -->
                    <div class="header-account-links">

                        @if(!session()->has('user'))
                        <a href="{{ route('login') }}"><i class="icofont icofont-user-alt-7"></i> <span class="">my account</span></a>
                        @else
                            <span style="line-height: 30px" class="ml-2">{{ session('user')->username }}</span>
                            <a href="{{ url('logout') }}"><span class="">Logout</span></a>
                        @endif
                    </div><!-- Header Account Links End -->
                </div>

                <div class="col mt-10 mb-10">
                    <!-- Header Language Currency Start -->
                </div>

                <div class="col mt-10 mb-10">
                    <!-- Header Shop Links Start -->
                    <div class="header-shop-links">

                        <!-- Wishlist -->
                        <a href="{{ route('wishlist') }}" class="header-wishlist"><i class="ti-heart"></i> <span class="number" id="numberOfWishes"></span></a>

                        @if(session()->has('user'))
                            <!-- Cart -->
                            <a href="#" class="header-cart"><i class="ti-shopping-cart"></i> <span class="number" id="numberOfCartProd"></span></a>
                        @else
                            <!-- Cart -->
                            <a href="{{ route('login') }}" ><i class="ti-shopping-cart"></i> <span class="number">0</span></a>
                        @endif
                    </div><!-- Header Shop Links End -->
                </div>

            </div>
        </div>
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-three header-sticky">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 order-12 order-lg-1 order-xl-1 d-none d-lg-block">
                    <div class="main-menu menu-3">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">HOME</a>
                                </li>
                                <li>
                                    <a href="{{ route('filter') }}">Shop</a>
                                </li>
                                <li class="menu-item-has-children"><a href="#">PAGES</a>
                                    <ul class="mega-menu three-column">
                                        <li><a href="#">Column One</a>
                                            <ul>
                                                <li><a href="about-us-dark.html">About us</a></li>
                                                <li><a href="banner-dark.html">Banner</a></li>
                                                <li><a href="best-deals-dark.html">Best Deals</a></li>
                                                <li><a href="buttons-dark.html">Buttons</a></li>
                                                <li><a href="cart-dark.html">Cart</a></li>
                                                <li><a href="checkout-dark.html">Checkout</a></li>
                                                <li><a href="clients-dark.html">Clients</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Column Two</a>
                                            <ul>
                                                <li><a href="compare-dark.html">Compare</a></li>
                                                <li><a href="faq-dark.html">Faq</a></li>
                                                <li><a href="feature-dark.html">Feature</a></li>
                                                <li><a href="login-dark.html">Login</a></li>
                                                <li><a href="register-dark.html">Register</a></li>
                                                <li><a href="store-dark.html">Store</a></li>
                                                <li><a href="tabs-dark.html">Tabs</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Column Three</a>
                                            <ul>
                                                <li><a href="team-dark.html">Team</a></li>
                                                <li><a href="terms-conditions-dark.html">Terms & Conditions</a></li>
                                                <li><a href="testimonial-dark.html">Testimonial</a></li>
                                                <li><a href="track-order-dark.html">Track Order</a></li>
                                                <li><a href="typography-dark.html">Typography</a></li>
                                                <li><a href="wishlist-dark.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">CONTACT</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-2 order-1 order-lg-2 order-xl-2 d-flex justify-content-center mt-15 mb-15">
                    <!-- Logo Start -->

                        <a href="{{ route('home') }}">
                            <img class="theme-dark" src="{{ asset('assets/images/logo-light.png') }}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                        </a>

                </div>

                <div class="col-lg-5 order-2 order-lg-3 order-xl-3">
                    <!-- Header Advance Search Start -->
                    @if(strpos(url()->current(), 'filter') == false)
                    <div class="header-advance-search">

                        <form action="{{ route('filter') }}" method="GET">
{{--                            <div class="input"><input type="text" name="search" placeholder="Search your product"></div>--}}
                            @component("components.formElements.textBox", ['name' => 'search', 'placeholder' => 'Search your product', 'class' => 'input'])
                            @endcomponent
{{--                            <div class="select">--}}
{{--                                <select class="nice-select" name="categories" multiple>--}}
{{--                                    <option value="0">All Categories</option>--}}
{{--                                    @foreach($categories as $cat)--}}
{{--                                    <option value="{{ $cat->id_category }}">{{ $cat->category }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="submit"><button><i class="icofont icofont-search-alt-1"></i></button></div>

                        </form>

                    </div><!-- Header Advance Search End -->
                    @endif
                </div>

                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>
        </div>
    </div><!-- Header BOttom End -->

</div><!-- Header Section End -->
