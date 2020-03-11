<?php
/*
* @created 22/02/2020 - 3:11 PM
* @author flippy
*/
?>

@extends('layouts.main')


@section('content')
    <!-- Login Section Start -->
    <div class="login-section section mt-90 mb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        @if (session('wrongPass'))
                            <div class="alert alert-danger">
                                {{ session('wrongPass') }}
                            </div>
                        @endif
                </div>
                <!-- Login -->
                <div class="col-md-6 col-12 d-flex">
                    <div class="ee-login">

                        <h3>Login to your account</h3>
                        <p>E&E provide how all this mistaken idea of denouncing pleasure and sing pain born an will give you a complete account of the system, and expound</p>

                        <!-- Login Form -->

                            <div class="row" style="position: relative">
                                <form action=" {{ url('login') }}" method="POST">
                                @csrf
                                @foreach($form as $f)
                                    @component("components.formElements.textBox", $f)
                                    @endcomponent
                                @endforeach
                                <div class="col-12 mb-15 position-relative">
{{--                                    <input type="checkbox" id="remember_me">--}}
{{--                                    <label for="remember_me">Remember me</label>--}}

{{--                                    <a href="{{ route('reset') }}">Forgotten pasward?</a>--}}
                                    <a href="#" style="position: absolute; right: 0" id="showReset">Forgotten pasward?</a>

                                </div>

                                @component("components.formElements.button", $button)
                                @endcomponent
                                </form>
                                    <div class="popupReset" id="popupReset">
                                        <form action="{{ route('reset') }}" method="POST" class="popup-flex">
                                            @csrf
                                            @method('PATCH')
                                            <div class="title_reset">
                                                <h2>You'r new password will be sent on you'r email.</h2>
                                            </div>
                                            <div>
                                                @component("components.formElements.textBox", ["name" => "reset_email", "placeholder" => "Enter your email here..."])
                                                @endcomponent
                                            </div>
                                            <div class="buttons_reset">
                                                @component("components.formElements.button", ["value" => "Confirm!", "id" => "reset_yes", 'type' => 'submit'])
                                                @endcomponent
                                                @component("components.formElements.button", ["value" => "Cancel!", "id" => "reset_cancel", "type" => "button"])
                                                @endcomponent
                                            </div>
                                        </form>
                                    </div>

                            </div>

                        <h4>Don’t have account? please click <a href="{{ route('register') }}">Register</a></h4>

                    </div>
                </div>


            </div>
        </div>
    </div><!-- Login Section End -->


@endsection
