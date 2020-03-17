@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Genre',
             'type' => 'text',
             'name' => 'genre',
             'placeholder' => 'Enter genre',
        ]
    ];


@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Add New Genre',
            'method' => 'POST',
            'action' => 'genres.store',
            'arrayInputs' => $arrayInputs,
            'button' => ''
        ])
    @endcomponent


@endsection
