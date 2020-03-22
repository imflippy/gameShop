<div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
    <!-- Product Start -->
    <div class="ee-product" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%">

        <!-- Image -->
        <div class="image">
            @if(0 < $discount && $discount < 100)
            <span class="label sale" style="border: 10px solid #f5d730; background-color: #f5d730; border-radius: 50%; color:#000;">sale</span>
            @endif
            <a href="{{ route("games", $id_game) }}" class="img"><img src="{{ asset('/assets/images/product/'.$single_photo) }}" alt="{{ $game_name }}"></a>

            <div class="wishlist-compare">
                <a href="#" class="addWish" data-idgame="{{ $id_game }}" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
            </div>
                @if(session()->has('user'))

                    <a href="#" class="add-to-cart auth" data-idgame="{{ $id_game }}" tabindex="0"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                @else
                    <a href="#" class="add-to-cart nauth"  tabindex="0"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                @endif

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
                    @if(count($stars))
                        <p>Ratting:  @php
                                    $sumStars = 0;
                                    foreach ($stars as $s) {
                                            $sumStars = $sumStars +$s->stars;
                                    }
                                    echo $sumStars / count($stars);
                                @endphp<i class='fa fa-star' style="float: right;"></i></p>
                    @else
                        <p>No score</p>
                    @endif
                </div>

            </div>

        </div>

    </div><!-- Product End -->
</div>
