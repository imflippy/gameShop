@extends('layouts.admin')

@section('head')
    {{--    <link rel="stylesheet"--}}
    {{--          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"--}}
    {{--          crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">--}}
    <style>
        h1 {
            font-size: 1.5em;
            margin-top: 0;
        }

        #table-log {
            font-size: 0.85rem;
        }

        .sidebar {
            font-size: 0.85rem;
            line-height: 1;
        }

        .btn {
            font-size: 0.7rem;
        }

        .stack {
            font-size: 0.85em;
        }

        .date {
            min-width: 75px;
        }

        .text {
            word-break: break-all;
        }

        a.llv-active {
            z-index: 2;
            background-color: #f5f5f5;
            border-color: #777;
        }

        .list-group-item {
            word-wrap: break-word;
        }

        .folder {
            padding-top: 15px;
        }

        .div-scroll {
            height: 80vh;
            overflow: hidden auto;
        }
        .nowrap {
            white-space: nowrap;
        }

    </style>
@endsection


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
                            laravel.log - All catches, laravel-date - User daily activity
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
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col sidebar ">
                                            <h1><i class="fa fa-calendar" aria-hidden="true"></i>Logs </h1>
                                            <div class="list-group div-scroll">
                                                @foreach($folders as $folder)
                                                    <div class="list-group-item">
                                                        <a href="?f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}">
                                                            <span class="fa fa-folder"></span> {{$folder}}
                                                        </a>
                                                        @if ($current_folder == $folder)
                                                            <div class="list-group folder">
                                                                @foreach($folder_files as $file)
                                                                    <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}&f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}"
                                                                       class="list-group-item @if ($current_file == $file) llv-active @endif">
                                                                        {{$file}}
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                                @foreach($files as $file)
                                                    <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}"
                                                       class="list-group-item @if ($current_file == $file) llv-active @endif">
                                                        {{$file}}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-10 table-container">
                                            @if ($logs === null)
                                                <div>
                                                    Log file >50M, please download it.
                                                </div>
                                            @else
                                                <table id="table-log" class="table table-striped" data-ordering-index="{{ $standardFormat ? 2 : 0 }}">
                                                    <thead>
                                                    <tr>
                                                        @if ($standardFormat)
                                                            <th>Level</th>
                                                            <th>Context</th>
                                                            <th>Date</th>
                                                        @else
                                                            <th>Line number</th>
                                                        @endif
                                                        <th>Content</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
{{--        @dd($logs)--}}
                                                    @foreach($logs as $key => $log)
                                                        <tr data-display="stack{{{$key}}}">
                                                            @if ($standardFormat)
                                                                <td class="nowrap text-{{{$log['level_class']}}}">
                                                                    <span class="fa fa-{{{$log['level_img']}}}" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                                                                </td>
                                                                <td class="text">{{$log['context']}}</td>
                                                            @endif
                                                            <td class="date">{{{$log['date']}}}</td>
                                                            <td class="text">
                                                                @if ($log['stack'])
                                                                    <button type="button"
                                                                            class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                                                                            data-display="stack{{{$key}}}">
                                                                        <span class="fa fa-search"></span>
                                                                    </button>
                                                                @endif
                                                                {{{$log['text']}}}
                                                                @if (isset($log['in_file']))
                                                                    <br/>{{{$log['in_file']}}}
                                                                @endif
                                                                @if ($log['stack'])
                                                                    <div class="stack" id="stack{{{$key}}}"
                                                                         style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            @endif
                                            <div class="p-3">
                                                @if($current_file)
                                                    <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                                        <span class="fa fa-download"></span> Download file
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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


@section('footer')
    <!-- jQuery for Bootstrap -->
{{--        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--                crossorigin="anonymous"></script>--}}
{{--        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"--}}
{{--                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"--}}
{{--                crossorigin="anonymous"></script>--}}
{{--        <!-- FontAwesome -->--}}
{{--        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>--}}
{{--        <!-- Datatables -->--}}
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.table-container tr').on('click', function () {
                    $('#' + $(this).data('display')).toggle();
                });
                $('#table-log').DataTable({
                    "order": [$('#table-log').data('orderingIndex'), 'desc'],
                    "stateSave": true,
                    "stateSaveCallback": function (settings, data) {
                        window.localStorage.setItem("datatable", JSON.stringify(data));
                    },
                    "stateLoadCallback": function (settings) {
                        var data = JSON.parse(window.localStorage.getItem("datatable"));
                        if (data) data.start = 0;
                        return data;
                    }
                });
                $('#delete-log, #clean-log, #delete-all-log').click(function () {
                    return confirm('Are you sure?');
                });
            });
        </script>
@endsection