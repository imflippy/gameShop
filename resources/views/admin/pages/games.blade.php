@extends('layouts.admin')

@php
    $title = 'Games';
    $tableRowsTitle = ['Id', 'Game', 'Price', 'Discount(%)', 'Edit', 'Delete'];

@endphp

@section('content')

    @component('admin.components.table', [
        'title' => $title,
        'tableRowsTitle' => $tableRowsTitle,
        'tableRowContent' => $games,
        'classDelete' => 'deleteGame'

        ])
    @endcomponent


@endsection
