@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Category',
             'type' => 'text',
             'name' => 'category',
             'placeholder' => 'Enter category',
        ]
    ];


@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Add New Category',
            'method' => 'POST',
            'action' => 'categories.store',
            'arrayInputs' => $arrayInputs,
            'button' => ''
        ])
    @endcomponent


@endsection
