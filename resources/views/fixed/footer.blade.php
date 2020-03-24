
<!-- Subscribe Section Start -->
<div class="subscribe-section section bg-gray pt-55 pb-55">
    <div class="container">
        <div class="row align-items-center">

            <!-- Mailchimp Subscribe Content Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">
                <div class="subscribe-content">
                    <h2>SUBSCRIBE <span>OUR NEWSLETTER</span></h2>
                    <h2><span>TO GET LATEST</span> PRODUCT UPDATE</h2>
                </div>
            </div><!-- Mailchimp Subscribe Content End -->


            <!-- Mailchimp Subscribe Form Start -->
            <div class="col-lg-6 col-12 mb-15 mt-15">

{{--                <form id="" class="mc-form subscribe-form" >--}}
{{--                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />--}}
{{--                    <button id="subscribeToNews">subscribe</button>--}}
{{--                </form>--}}
                <div id="" class="mc-form subscribe-form" >
                    @component('components.formElements.textBox', [
                                                                        'id' => 'mc-email',
                                                                        'placeholder' => 'Enter your email here',
                                                                        'type' => 'email',
                                                                        'class' => ''
                                                                    ])
                    @endcomponent
{{--                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />--}}
{{--                    <button id="subscribeToNews">subscribe</button>--}}
                    @component('components.formElements.button', ['type' => 'button', 'id' => 'subscribeToNews', 'value' => 'subscribe'])
                    @endcomponent
                </div>
                <!-- mailchimp-alerts Start -->
                <div class="mailchimp-alerts text-centre">
                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                </div><!-- mailchimp-alerts end -->

            </div><!-- Mailchimp Subscribe Form End -->

        </div>
    </div>
</div><!-- Subscribe Section End -->
<!-- Footer Section Start -->
<div class="footer-section section bg-ivory">

    <!-- Footer Top Section Start --><div class="footer-top-section section pt-10">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-40">

                </div><!-- Footer Widget End -->
                <!-- Footer Widget Start -->
                <div class="col-lg-4 col-md-6 col-12 mb-40">
                    <div class="footer-widget">

                        <h4 class="widget-title">Pages</h4>
                        <ul>

                        <p class="contact-info">
                        <li><a href="{{ route('home') }}">HOME</a></li>
                        </p>
                        <p class="contact-info">
                            <li><a href="{{ route('filter') }}">Shop</a></li>
                        </p>
                        <p class="contact-info">
                            <li><a href="{{ route('contact') }}">CONTACT</a></li>
                        </p>
                        </ul>

                    </div>
                </div><!-- Footer Widget End -->

                <!-- Footer Widget Start -->
                <div class="col-lg-4 col-md-6 col-12 mb-40">
                    <div class="footer-widget">

                        <h4 class="widget-title">CATEGORIES</h4>

                        <ul class="link-widget">
                            @foreach($categories as $c)
                                <li><a href="{{ route('filter', ['cat[]' => $c->id_category]) }}">{{ $c->category }}</a></li>
                            @endforeach
                        </ul>


                    </div>
                </div><!-- Footer Widget End -->


            </div>

        </div>
    </div><!-- Footer Bottom Section Start -->

    <!-- Footer Bottom Section Start -->
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row">

                <!-- Footer Copyright -->
                <div class="col-lg-6 col-12">
                    <div class="footer-copyright"><p>&copy; Copyright, All Rights Reserved by <a href="https://www.linkedin.com/in/filip-minic-4963a0175/">Filip Minic 138/17</a> <a href="documentation.pdf">Documentation</a></p></div>
                </div>

                <!-- Footer Payment Support -->
                <div class="col-lg-6 col-12">
                    <div class="footer-payments-image"><img src="{{ asset('assets/images/payment-support.png') }}" alt="Payment Support Image"></div>
                </div>

            </div>
        </div>
    </div><!-- Footer Bottom Section Start -->

</div><!-- Footer Section End -->
<div class="modal"><!-- Place at bottom of page --></div>
<script>
    @if(session()->has('user'))
        const idRole = '{{ session('user')->id_role }}';
    @else
        const idRole = 0;
    @endif
</script>
<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Plugins JS -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<!-- Ajax Mail -->
<script src="{{ asset('assets/js/ajax-mail.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/ee.js') }}"></script>

{{--Sweet Alert--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>


</html>
