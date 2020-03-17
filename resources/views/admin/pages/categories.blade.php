@extends('layouts.admin')

@php
    $title = 'Categories';
    $tableRowsTitle = ['Id', 'Category', 'Edit', 'Delete'];

@endphp

@section('content')

    @component('admin.components.table', [
        'title' => $title,
        'tableRowsTitle' => $tableRowsTitle,
        'tableRowContent' => $categories
        ])
    @endcomponent


@endsection
