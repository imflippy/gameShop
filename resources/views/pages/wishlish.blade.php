@extends('layouts.main')



@section('content')
    <div class="page-section section mt-90 mb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-subtotal">Visit</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody id="wishlist">


                                </tbody>
                            </table>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
