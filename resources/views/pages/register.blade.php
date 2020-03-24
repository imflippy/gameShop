<?php
/*
* @created 22/02/2020 - 3:05 PM
* @author flippy
*/
?>

@extends('layouts.main')

@section('content')


    <!-- Page Banner Section Start -->
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">

            <!-- Page Banner -->
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>Register</h1>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ route('home') }}">HOME</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
            </div>

        </div>
    </div><!-- Page Banner Section End -->

    <!-- Register Section Start -->
    <div class="register-section section mt-90 mb-90">
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

                </div>
                <div class="col-md-1 col-12 d-flex">

                    <div class="login-reg-vertical-boder"></div>

                </div>

                <!-- Register -->
                <div class="col-md-5 col-12 d-flex">
                    <div class="ee-register">

                        <h3>We will need for your registration</h3>
                        <p>E&E provide how all this mistaken idea of denouncing pleasure and sing pain born an will give you a complete account of the system, and expound</p>

                        <!-- Register Form -->
                        <form action="{{ route('doRegister') }}" method="POST">
                            @csrf
                            <div class="row">
                                @foreach($form as $f)

                                @component("components.formElements.textBox", $f)
                                @endcomponent

                                @endforeach

                                @component("components.formElements.button", $button)
                                @endcomponent
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-1 col-12 d-flex">

                    <div class="login-reg-vertical-boder"></div>

                </div>

            </div>
        </div>
    </div><!-- Register Section End -->



@endsection

