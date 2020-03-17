@extends('layouts.admin')

@php
    $title = 'Genres';
    $tableRowsTitle = ['Id', 'Genre', 'Edit', 'Delete'];

@endphp

@section('content')

    @component('admin.components.table', [
        'title' => $title,
        'tableRowsTitle' => $tableRowsTitle,
        'tableRowContent' => $genres
        ])
    @endcomponent


@endsection
