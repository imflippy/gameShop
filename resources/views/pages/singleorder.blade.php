@extends('layouts.main')


@section('content')

    <body class="theme-dark">

    <!-- Hero Section Start -->
    <div class="hero-section section mb-10">
        <div class="container">

        </div>
    </div><!-- Hero Section End -->


    <!-- New Arrival Product Section Start -->
    <div class="product-section section mb-60">
        <div class="container">
            <div class="row">
                @foreach($orderDetails as $od)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-4 pl-4 d-flex">
                        <img src="{{ asset('/assets/images/product/' . $od->photos[0]->single_photo) }}" style="width: 240px; height: 240px;">
                        <div class="pl-2">
                            <p>Price/game: {{ $od->price_with_discount }}$</p>
                            <p>Quantity: {{ $od->quantity }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- New Arrival Product Section End -->

@endsection
