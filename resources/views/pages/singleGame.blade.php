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

{{--                        <span class="availability">Availability:--}}
{{--                            @if($game->availability > 0)--}}
{{--                            <span>In Stock</span>--}}
{{--                            @else--}}
{{--                            <span>Out Of Stock</span>--}}
{{--                            @endif--}}
{{--                        </span>--}}
                        <span class="availability">Availability:
                                <span>In Stock</span>
                        </span>

                        <div class="quantity-genres">

                            <div class="quantity">
                                <h5>Quantity</h5>
                                <div class="pro-qty"><input type="text" value="1"></div>
                            </div>

                            <div class="genres">
                                <h5>Genre</h5>

                                    @foreach($game->genres as $c)
{{--                                    <a href="{{ $c->id_genre   }}">{{ $c->genre }}</a>--}}
                                    <a href="{{ route('filter', ['genre[]' => $c->id_genre]) }}">{{ $c->genre }}</a>
                                    @endforeach


                            </div>

                        </div>

                        <div class="actions">

                            <a href="#" class="add-to-cart" data-idgame="{{ $game->id_game }}"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                            <div class="wishlist-compare">
                                <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
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
                    <li><a href="#product-specifications" data-toggle="tab" >specifications</a></li>
                    <li><a href="#product-reviews" data-toggle="tab" >reviews</a></li>
                </ul>

                <div class="single-product-tab-content tab-content">
                    <div class="tab-pane fade show active" id="product-description">

                        <div class="row">
                            <div class="single-product-description-content col-lg-8 col-12">
                                <h4>Introducing Flex 3310</h4>
                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora in</p>
                                <h4>Stylish Design</h4>
                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                <h4>Digital Camera, FM Radio & many more...</h4>
                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                            </div>
                            <div class="single-product-description-image col-lg-4 col-12">
                                <img src="assets/images/single-product/description.png" alt="description">
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="product-specifications">
                        <div class="single-product-specification">
                            <ul>
                                <li>Full HD Camcorder</li>
                                <li>Dual Video Recording</li>
                                <li>X type battery operation</li>
                                <li>Full HD Camcorder</li>
                                <li>Dual Video Recording</li>
                                <li>X type battery operation</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-reviews">

                        <div class="product-ratting-wrap">
                            <div class="pro-avg-ratting">
                                <h4>4.5 <span>(Overall)</span></h4>
                                <span>Based on 9 Comments</span>
                            </div>
                            <div class="ratting-list">
                                <div class="sin-list float-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="sin-list float-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(3)</span>
                                </div>
                                <div class="sin-list float-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(1)</span>
                                </div>
                                <div class="sin-list float-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(0)</span>
                                </div>
                                <div class="sin-list float-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(0)</span>
                                </div>
                            </div>
                            <div class="rattings-wrapper">

                                <div class="sin-rattings">
                                    <div class="ratting-author">
                                        <h3>Cristopher Lee</h3>
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </div>
                                    <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                </div>

                                <div class="sin-rattings">
                                    <div class="ratting-author">
                                        <h3>Nirob Khan</h3>
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </div>
                                    <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                </div>

                                <div class="sin-rattings">
                                    <div class="ratting-author">
                                        <h3>MD.ZENAUL ISLAM</h3>
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </div>
                                    <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                </div>

                            </div>
                            <div class="ratting-form-wrapper fix">
                                <h3>Add your Comments</h3>
                                <form action="#">
                                    <div class="ratting-form row">
                                        <div class="col-12 mb-15">
                                            <h5>Rating:</h5>
                                            <div class="ratting-star fix">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-15">
                                            <label for="name">Name:</label>
                                            <input id="name" placeholder="Name" type="text">
                                        </div>
                                        <div class="col-md-6 col-12 mb-15">
                                            <label for="email">Email:</label>
                                            <input id="email" placeholder="Email" type="text">
                                        </div>
                                        <div class="col-12 mb-15">
                                            <label for="your-review">Your Review:</label>
                                            <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input value="add review" type="submit">
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
