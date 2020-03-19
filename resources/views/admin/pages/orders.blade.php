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
                            All Orders
                        </h2>
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
                        <h5 class="card-header">Basic Table</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
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
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif($o->active == 1)
                                                        <span class="badge badge-success">Confirmed</span>
                                                    @else
                                                        <span class="badge badge-danger">Declined</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('orders.show', $o->id_order) }}" class="btn btn-info">Details</a></td>
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
                                {{ $orders->appends($_GET)->links() }}
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
