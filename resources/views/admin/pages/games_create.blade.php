@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Game',
             'type' => 'text',
             'name' => 'game_name',
             'placeholder' => 'Enter game title',
        ],
        [
            'label' => 'Game link',
             'type' => 'text',
             'name' => 'game_link',
             'placeholder' => 'Enter game link',
        ],
        [
            'label' => 'Price',
             'type' => 'number',
             'name' => 'price',
             'placeholder' => 'Enter game price',
        ],
        [
            'label' => 'Discount',
             'type' => 'number',
             'name' => 'discount',
             'placeholder' => 'Enter game discount or leave at 0',
        ],
        [
            'label' => 'Photos of game',
             'type' => 'file',
             'name' => 'photos_game[]',
             'multiple' => 'multiple'
        ]
    ];

    foreach ($categories as $c) {
        $cat[] = ['value' => $c->id_category, 'text' => $c->category];
    }
    $categoryObject = new stdClass();
    $categoryObject->option = $cat;
    $categoryObject->name = 'categoriesDll';
    $categoryObject->label = 'Game category';


    $arrayDropdowns = [
        $categoryObject
    ];

    foreach ($genres as $g) {
        $genre[] = ['value' => $g->id_genre, 'text' => $g->genre];
    }
    $genreObject = new stdClass();
    $genreObject->option = $genre;
    $genreObject->label = 'Game genres';
    $genreObject->name = 'genresChb[]';

    $arrayCheckboxs = [
      $genreObject
    ];

@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Add New Game',
            'method' => 'POST',
            'action' => 'games.store',
            'arrayInputs' => $arrayInputs,
            'button' => '',
            'arrayDropdowns' => $arrayDropdowns,
            'arrayCheckboxs' => $arrayCheckboxs
        ])
    @endcomponent


@endsection
