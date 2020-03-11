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
                        <li><a class="active" data-toggle="tab" href="#contact-form-tab" class="">Leave us a message</a></li>
                    </ul>
                </div>

                <!-- Contact Tab Content -->
                <div class="col-lg-8 col-12">
                    <div class="tab-content">


                        <!-- Contact Form Tab -->
                        <div class="tab-pane fade row d-flex active show" id="contact-form-tab">
                            <div class="col">

                                <div id="contact-form" class="contact-form mb-50">
                                    <div class="row">
                                        @component('components.formElements.textBox', ['label' => 'Email*', 'type' => 'email', 'id' => 'email-contact', 'class' => 'col-md-12 col-12 mb-25'])
                                        @endcomponent
                                        <div class="col-12 mb-25">
                                            <label for="message">Message*</label>
                                            <textarea id="message" name="message"></textarea>
                                        </div>
                                            @component('components.formElements.button', ['type' => 'submit', 'value' => 'SEND NOW', 'id' => 'sendContact'])
                                            @endcomponent
                                    </div>
                                </div>
                                <p class="form-messege"></p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
