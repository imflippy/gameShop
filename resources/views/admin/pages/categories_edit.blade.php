@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Category name',
             'type' => 'text',
             'name' => 'category',
             'placeholder' => 'Enter new category name',
             'value' => $getCategory->category
        ],
        [
             'type' => 'hidden',
             'name' => 'id_category',
             'value' => $getCategory->id_category,
             'noLabel' => ''
        ]
    ];


@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Update Category',
            'method' => 'PUT',
            'action' => 'categories.update',
            'arrayInputs' => $arrayInputs,
            'button' => '',
            'id' => $getCategory->id_category
        ])
    @endcomponent


@endsection
