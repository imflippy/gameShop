<div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
    <!-- Product Start -->
    <div class="ee-product">

        <!-- Image -->
        <div class="image">
            @if(0 < $discount && $discount < 100)
            <span class="label sale">sale</span>
            @endif
            <a href="{{ route("games", $id_game) }}" class="img"><img src="{{ asset($single_photo) }}" alt="{{ $game_name }}"></a>

            <div class="wishlist-compare">
                <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                <a href="#" class="addWish" data-idgame="{{ $id_game }}" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
            </div>
                <a href="#" class="add-to-cart" data-idgame="{{ $id_game }}" tabindex="0"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
        </div>

        <!-- Content -->
        <div class="content">

            <!-- Category & Title -->
            <div class="category-title">

                <a href="{{ route('filter', ['cat[]' => $id_category]) }}" class="cat">{{ $category }}</a>
                <h5 class="title"><a href="{{ route("games", $id_game) }}">{{ $game_name }}</a></h5>

            </div>

            <!-- Price & Ratting -->
            <div class="price-ratting">

                <h5 class="price">
                    @if(0 < $discount && $discount < 100)
                        <span class="old">${{ $price }} </span>
                        ${{$price - $price * $discount / 100}}
                    @else
                        ${{ $price }}
                    @endif
                </h5>
                <div class="ratting">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>

            </div>

        </div>

    </div><!-- Product End -->
</div>
