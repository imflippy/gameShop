
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
                                <li><a href="{{ route('home') }}">HOME</a></li>
                                <li><a href="{{ route('filter') }}">Shop</a></li>
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
                            @component("components.formElements.textBox", ['name' => 'search', 'placeholder' => 'Search your product', 'class' => 'input'])
                            @endcomponent

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
