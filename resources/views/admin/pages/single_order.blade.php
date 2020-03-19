@extends('layouts.admin')

@section('content')

    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">
                            Confirm or decline order
                        </h2>
                        <a href="{{ route( 'orders.index') }}">Back to list of Orders</a>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
        @endif
        <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card shadow-sm mb-5">
                        <h5 class="card-header"></h5>
                        <div class="card-body">
                            <div class="">
                                <div class="row">
{{--                            @dd($active->active)--}}
                                    @if($active->active == 0)
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                            <form action="{{ route('orders.confirm') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id_order" value="{{ $id_order }}">
                                                <input type="submit" class="btn btn-success" value="Confirm">
                                            </form>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                            <form action="{{ route('orders.decline') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id_order" value="{{ $id_order }}">
                                                <input type="submit" class="btn btn-danger" value="Decline">
                                            </form>
                                        </div>
                                    @endif
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
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>

        </div>
        <!-- ============================================================== -->





@endsection
