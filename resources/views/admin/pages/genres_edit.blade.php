@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Genre name',
             'type' => 'text',
             'name' => 'genre',
             'placeholder' => 'Enter new genre name',
             'value' => $getGenre->genre
        ],
        [
             'type' => 'hidden',
             'name' => 'id_genre',
             'value' => $getGenre->id_genre,
             'noLabel' => ''
        ]
    ];


@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Update Genre',
            'method' => 'PUT',
            'action' => 'genres.update',
            'arrayInputs' => $arrayInputs,
            'button' => '',
            'id' => $getGenre->id_genre
        ])
    @endcomponent


@endsection
