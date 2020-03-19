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
                @if(count($orders))
                <table class="table table-striped table-bordered first" style="color: #cccccc">
                    <thead>
                    <tr>
                        <td>id</td>
                        <td>Status</td>
                        <td>Details</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $o )
                        <tr>
                            <td>{{ $o->id_order }}</td>
                            <td>
                                @if($o->active == 0)
                                    <span class="badge badge-warning" style="color: #555555">Pending</span>
                                @elseif($o->active == 1)
                                    <span class="badge badge-success" style="color: #555555">Confirmed</span>
                                @else
                                    <span class="badge badge-danger" style="color: #555555">Declined</span>
                                @endif
                            </td>
                            <td><a href="{{ route('singleorder', $o->id_order) }}" class="btn btn-info">Details</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>id</td>
                        <td>Status</td>
                        <td>Details</td>
                    </tr>
                    </tfoot>

                </table>
                @else
                    <h2>You dont have any order.</h2>
                @endif
                {{ $orders->appends($_GET)->links() }}
            </div>
        </div>
    </div><!-- New Arrival Product Section End -->

@endsection
