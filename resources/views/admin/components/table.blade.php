
@php
    $routeName = \Request::route()->getName();
    $route = explode('.', $routeName);
    $removeS = rtrim($route[0], 's');

@endphp
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">
                            {{ $title }}
                        </h2>
                        <a href="{{ route($route[0]. '.create') }}">Add new {{ $removeS }}</a>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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
                                        @foreach($tableRowsTitle as $t)
                                            <th>{{ $t }}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tableRowContent as $t)
                                        <tr>
                                            @foreach(get_object_vars($t) as $var => $val)
                                                <td>{{ $val }}</td>
                                            @endforeach
                                                <form action="{{route($route[0] . '.edit', [array_values(get_object_vars($t))[0]]) }}" method="get">

                                                    <td><button type="submit">Edit</button></td>
                                                </form>
                                                <form action="{{route($route[0] . '.destroy', array_values(get_object_vars($t))[0]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td><button type="submit">Delete</button></td>
                                                </form>
{{--                                            <td><a href="{{url($route[0]. '/' . array_values(get_object_vars($t))[0] . '/edit') }}">Edit</a></td>--}}
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        @foreach($tableRowsTitle as $t)
                                            <th>{{ $t }}</th>
                                        @endforeach
                                    </tr>
                                    </tfoot>

                                </table>
                                {{ $tableRowContent->appends($_GET)->links() }}
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


