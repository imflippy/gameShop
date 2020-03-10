@extends('layouts.main')

@section('content')
<!-- Single Product Section Start -->
<div class="product-section section mt-90 mb-90">
    <div class="container">

        <div class="row mb-40">

            <div class="col-lg-6 col-12 mb-50">

                <!-- Image -->
                <div class="single-product-image thumb-left">

                    <div class="tab-content">
                        <div id="single-image-1" class="tab-pane fade show active big-image-slider">
                            @foreach($game->photos as $p)
                                <div class="big-image"><img src="{{ asset($p->single_photo) }}" alt="Big Image"><a href="assets/images/single-product/big-3.png" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 col-12 mb-50">

                <!-- Content -->
                <div class="single-product-content">

                    <!-- Category & Title -->
                    <div class="head-content">

                        <div class="category-title">
                            <a href="#" class="cat">{{ $game->category }}</a>
                            <h5 class="title">{{ $game->game_name }}</h5>
                        </div>

                        <h5 class="price">
                        @if(0 < $game->discount && $game->discount < 100)
                            <span class="old">${{ $game->price }} </span>
                            ${{$game->price - $game->price * $game->discount / 100}}
                        @else
                           ${{ $game->price }}
                        @endif
                        </h5>

                    </div>

                    <div class="single-product-description">

                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <div class="desc">
                            <p>{{ $game->game_info }} </p>
                        </div>


                        <div class="quantity-genres mb-3">

                            <div class="genres">
                                <h5>Genre</h5>

                                    @foreach($game->genres as $c)
                                    <a href="{{ route('filter', ['genre[]' => $c->id_genre]) }}">{{ $c->genre }}</a>
                                    @endforeach


                            </div>

                        </div>

                        <div class="actions">

                            @if(session()->has('user'))

                                <a href="#" class="add-to-cart auth" data-idgame="{{ $game->id_game }}" tabindex="0"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                            @else
                                <a href="#" class="add-to-cart nauth"  tabindex="0"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                            @endif

                            <div class="wishlist-compare">
                                <a href="#" class="addWish"  data-idgame="{{ $game->id_game }}" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-10 col-12 ml-auto mr-auto">

                <ul class="single-product-tab-list nav">
                    <li><a href="#product-description" class="active" data-toggle="tab" >description</a></li>
                    <li><a href="#product-reviews" data-toggle="tab" >reviews</a></li>
                </ul>

                <div class="single-product-tab-content tab-content">
                    <div class="tab-pane fade show active" id="product-description">

                        <div class="row">
                            <div class="single-product-description-content col-lg-8 col-12">
                                {{ $game->game_info }}
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="product-reviews">

                        <div class="product-ratting-wrap">
                            <div class="pro-avg-ratting">
                                <h4><span id="score"></span> <span>(Overall)</span></h4>
                                <span id="numberOfComments"></span>
                            </div>
                            <div class="ratting-list">

                            </div>
                            <div class="rattings-wrapper" id="allReviews">


                            </div>
                            <div class="ratting-form-wrapper fix">
                                <h3>Add your Comments</h3>
                                <form action="#">
                                    <div class="ratting-form row">
                                        <div class="col-12 mb-15">
                                            <h5>Rating:</h5>
                                            <div class='rating-stars'>
                                                <ul id='stars'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-15">
                                            <label for="your-review">Your Review:</label>
                                            <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                        </div>
                                        <input type="hidden" id="hiddenGame" value="{{ $game->id_game }}">
                                        <div class="col-12">
                                            <input value="add review" class="addreview" type="button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div><!-- Single Product Section End -->

@endsection
