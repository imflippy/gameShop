@extends('layouts.main')


@section('content')
    <!-- Feature Product Section Start -->
    <div class="product-section section mt-90 mb-40">
        <div class="container">

            <form action="{{ route('filter') }}" method="GET">
{{--                @csrf--}}
                <div class="row">

                <div class="col-xl-9 col-lg-8 col-12 order-lg-2 mb-50">

                    <div class="row mb-50">
                        <div class="col">

                            <!-- Shop Top Bar Start -->
                            <div class="shop-top-bar with-sidebar">

                                <!-- Product Showing -->
                                <div class="product-showing">
                                    @php
                                        $show = [
                                                        [
                                                            "value" => '6',
                                                        ],
                                                        [
                                                            "value" => '9',
                                                        ],
                                                        [
                                                            "value" => '12',
                                                        ],
                                                        [
                                                            "value" => '15',
                                                        ],
                                                        [
                                                            "value" => '18'
                                                        ]
                                                    ]
                                    @endphp
                                    <p>Showing</p>
                                    <select name="showing" class="nice-select">
                                        @foreach($show as $s)
                                            @if($s['value'] == $showing)
                                                <option selected value="{{$s['value']}}">{{$s['value']}}</option>
                                            @else
                                                <option value="{{$s['value']}}">{{$s['value']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Product Short -->
                                <div class="product-short">
                                    <p>Sort by</p>

                                    @php
                                        $sort = [
                                                    [
                                                        "value" => 'date',
                                                        "title" => 'Newset items'
                                                    ],
                                                    [
                                                        "value" => 'priceasc',
                                                        "title" => 'Price: low to high'
                                                    ],
                                                    [
                                                        "value" => 'pricedesc',
                                                        "title" => 'Price: high to low'
                                                    ]
                                                ]
                                    @endphp
                                    <select name="sortby" class="nice-select">
                                        @foreach($sort as $s)
                                            @if($s['value'] == $sortby)
                                            <option selected value="{{$s['value']}}">{{$s['title']}}</option>
                                            @else
                                                <option value="{{$s['value']}}">{{$s['title']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Product Pages -->
                                <div class="product-pages">
                                    <p>Pages {{ $games->currentPage() }} of {{ $games->lastPage() }}</p>
                                </div>
                                <div class="header-advance-search">
                                @component("components.formElements.textBox", ['name' => 'search', 'placeholder' => 'Search your product', 'class' => 'input width-auto', 'value' => $searchOld])
                                @endcomponent
                                    <div class="submit"><button><i class="icofont icofont-search-alt-1"></i></button></div>
                                </div>
                            </div><!-- Shop Top Bar End -->

                        </div>
                    </div>

                    <!-- Shop Product Wrap Start -->
                    <!-- Shop Product Wrap Start -->
                    <div class="shop-product-wrap grid with-sidebar row">

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
                        @if(!count($games))
                            <h2>No games for this filter. Please try another.</h2>
                        @endif
                    </div><!-- Shop Product Wrap End -->

                    <div class="row mt-30">
                        <div class="col">



                            {{ $games->appends($_GET)->links() }}

                        </div>
                    </div>

                </div>

                <div class="shop-sidebar-wrap col-xl-3 col-lg-4 col-12 order-lg-1 mb-15">

                    <div class="shop-sidebar mb-35">

                        <h4 class="title">CATEGORIES</h4>


                            @foreach($categories as $c)
                            @if(in_array($c->id_category, $categoriesChb ?? []))
                                <div class="col-12 mb-15 position-relative">
                                    <input type="checkbox" name="cat[]" value="{{ $c->id_category }}" id="remember_me" checked="checked">
                                    <label for="remember_me">{{ $c->category }}</label>
                                </div>
                            @else
                                <div class="col-12 mb-15 position-relative">
                                    <input type="checkbox" name="cat[]" value="{{ $c->id_category }}" id="remember_me">
                                    <label for="remember_me">{{ $c->category }}</label>
                                </div>
                            @endif

                            @endforeach

                    </div>

                    <div class="shop-sidebar mb-35">

                        <h4 class="title">Genre</h4>
                        @foreach($genres as $c)
                            <div class="col-12 mb-15 position-relative">
                                @if(in_array($c->id_genre, $genreChb ?? []))
                                    <input type="checkbox" name="genre[]" value="{{ $c->id_genre }}" id="remember_me" checked="checked">
                                    <label for="remember_me">{{ $c->genre }}</label>
                                @else
                                <input type="checkbox" name="genre[]" value="{{ $c->id_genre }}" id="remember_me">
                                    <label for="remember_me">{{ $c->genre }}</label>
                                @endif

                            </div>

                        @endforeach


                    </div>

                </div>

            </div>
            </form>
        </div>
    </div><!-- Feature Product Section End -->


@endsection
