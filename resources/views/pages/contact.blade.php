@extends('layouts.main')


@section('content')
    <div class="contact-section section mt-90 mb-40">
        <div class="container">
            <div class="row">

                <!-- Contact Page Title -->
                <div class="contact-page-title col mb-40">
                    <h1>Hi, Howdy <br>Let’s Connect us</h1>
                </div>
            </div>
            <div class="row">

                <!-- Contact Tab List -->
                <div class="col-lg-4 col-12 mb-50">
                    <ul class="contact-tab-list nav">
                        <li><a class="active" data-toggle="tab" href="#contact-address">Contact us</a></li>
                        <li><a data-toggle="tab" href="#contact-form-tab" class="">Leave us a message</a></li>
                        <li><a data-toggle="tab" href="#store-location" class="">All Store location</a></li>
                    </ul>
                </div>

                <!-- Contact Tab Content -->
                <div class="col-lg-8 col-12">
                    <div class="tab-content">

                        <!-- Contact Address Tab -->
                        <div class="tab-pane fade row d-flex active show" id="contact-address">

                            <div class="col-lg-4 col-md-6 col-12 mb-50">
                                <div class="contact-information">
                                    <h4>Address</h4>
                                    <p>You address will be here Lorem Ipsum text</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 mb-50">
                                <div class="contact-information">
                                    <h4>Game</h4>
                                    <p><a href="tel:01234567890">01234 567 890</a><a href="tel:01234567891">01234 567 891</a></p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 mb-50">
                                <div class="contact-information">
                                    <h4>Web</h4>
                                    <p><a href="mailto:info@example.com">info@example.com</a><a href="#">www.example.com</a></p>
                                </div>
                            </div>

                        </div>

                        <!-- Contact Form Tab -->
                        <div class="tab-pane fade row d-flex" id="contact-form-tab">
                            <div class="col">

                                <form id="contact-form" action="https://demo.hasthemes.com/ee-preview/ee/assets/php/mail.php" method="post" class="contact-form mb-50">
                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-25">
                                            <label for="email_address">Email*</label>
                                            <input id="email_address" type="email" name="email_address">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <label for="game_number">Game</label>
                                            <input id="game_number" type="text" name="game_number">
                                        </div>
                                        <div class="col-12 mb-25">
                                            <label for="message">Message*</label>
                                            <textarea id="message" name="message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" value="SEND NOW">
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>

                            </div>
                        </div>

                        <!-- Contact Stores Tab -->
                        <div class="tab-pane fade row d-flex" id="store-location">

                            <div class="col-md-6 col-12 mb-50">
                                <div class="single-store">
                                    <h3>E&amp;E Australia</h3>
                                    <p>You address will be here Lorem Ipsum is simply dummy text.</p>
                                    <p><a href="tel:01234567890">01234 567 890</a> / <a href="tel:01234567891">01234 567 891</a></p>
                                    <p><a href="mailto:info@example.com">info@example.com</a> / <a href="#">www.example.com</a></p>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 mb-50">
                                <div class="single-store">
                                    <h3>E&amp;E England</h3>
                                    <p>You address will be here Lorem Ipsum is simply dummy text.</p>
                                    <p><a href="tel:01234567890">01234 567 890</a> / <a href="tel:01234567891">01234 567 891</a></p>
                                    <p><a href="mailto:info@example.com">info@example.com</a> / <a href="#">www.example.com</a></p>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 mb-50">
                                <div class="single-store">
                                    <h3>E&amp;E Germany</h3>
                                    <p>You address will be here Lorem Ipsum is simply dummy text.</p>
                                    <p><a href="tel:01234567890">01234 567 890</a> / <a href="tel:01234567891">01234 567 891</a></p>
                                    <p><a href="mailto:info@example.com">info@example.com</a> / <a href="#">www.example.com</a></p>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 mb-50">
                                <div class="single-store">
                                    <h3>E&amp;E France</h3>
                                    <p>You address will be here Lorem Ipsum is simply dummy text.</p>
                                    <p><a href="tel:01234567890">01234 567 890</a> / <a href="tel:01234567891">01234 567 891</a></p>
                                    <p><a href="mailto:info@example.com">info@example.com</a> / <a href="#">www.example.com</a></p>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 mb-50">
                                <div class="single-store">
                                    <h3>E&amp;E Canada</h3>
                                    <p>You address will be here Lorem Ipsum is simply dummy text.</p>
                                    <p><a href="tel:01234567890">01234 567 890</a> / <a href="tel:01234567891">01234 567 891</a></p>
                                    <p><a href="mailto:info@example.com">info@example.com</a> / <a href="#">www.example.com</a></p>
                                </div>
                            </div>

                            <div class="col-md-6 col-12 mb-50">
                                <div class="single-store">
                                    <h3>E&amp;E Denmark</h3>
                                    <p>You address will be here Lorem Ipsum is simply dummy text.</p>
                                    <p><a href="tel:01234567890">01234 567 890</a> / <a href="tel:01234567891">01234 567 891</a></p>
                                    <p><a href="mailto:info@example.com">info@example.com</a> / <a href="#">www.example.com</a></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
