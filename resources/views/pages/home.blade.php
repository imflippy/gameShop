@extends('layouts.main')


@section('content')

    <body class="theme-dark">

    <!-- Hero Section Start -->
    <div class="hero-section section mb-10">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Header Category -->
                    <div class="hero-side-category">

                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap">
                            <!-- Category Toggle -->
                            <button class="category-toggle">Categories <i class="ti-menu"></i></button>
                        </div>

                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                @foreach($categories as $c)
                                    <li><a href="{{ route('filter', ['cat[]' => $c->id_category]) }}">{{ $c->category }}</a></li>
                                @endforeach
                            </ul>
                        </nav>

                    </div><!-- Header Bottom End -->

                    <!-- Hero Slider Start -->
                    <div class="hero-slider hero-slider-three fix">

                        @foreach($slider as $s)
                        <!-- Hero Item Start -->
                        <div class="hero-item-three" style="background-image: url({{ asset('assets/images/hero/hero-3-bg-1.jpg') }})">
                            <div class="row align-items-center justify-content-between">

                                <!-- Hero Content -->
                                <div class="hero-content-three col">

                                    <h2 class="offer">{{ $s->discount }}% <span>OFF</span></h2>
                                    <h1>PLAY <br> {{ $s->game_name }} <br> ANY TIME</h1>
                                    <a href="{{ route("games", $s->id_game) }}">get it now</a>

                                </div>

                                <!-- Hero Image -->
                                <div class="hero-image-three col">
                                    <img src="{{ asset($s->photos[0]->single_photo) }}" alt="{{ $s->game_name }}">
                                </div>

                            </div>
                        </div><!-- Hero Item End -->
                        @endforeach
                    </div><!-- Hero Slider End -->

                </div>
            </div>
        </div>
    </div><!-- Hero Section End -->


    <!-- New Arrival Product Section Start -->
    <div class="product-section section mb-60">
        <div class="container">
            <div class="row">

                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="NEW ARRIVAL"><h1>NEW ARRIVAL</h1></div>
                </div><!-- Section Title End -->

                <div class="col-12">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-12 order-1 order-lg-2">
                            <div class="row">

                                @foreach($games as $p)

                                    @component("components.singleGame", [
                                                                            'single_photo' => $p->photos[0]->single_photo,
                                                                            'game_name' => $p->game_name,
                                                                            'category' => $p->category,
                                                                            'id_category' => $p->id_category,
                                                                            'discount' => $p->discount,
                                                                            'price' => $p->price,
                                                                            'id_game' => $p->id_game,
                                                                            'stars' => $p->stars
                                                                        ])
                                    @endcomponent
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- New Arrival Product Section End -->

@endsection
