@extends('layouts.admin')

@php

    $arrayInputs = [
            [
            'label' => 'Game',
             'type' => 'text',
             'name' => 'game_name',
             'placeholder' => 'Enter game title',
             'value' => $singleGame->game_name
        ],
        [
            'label' => 'Game link',
             'type' => 'text',
             'name' => 'game_link',
             'placeholder' => 'Enter game link',
             'value' => $singleGame->game_link
        ],
        [
            'label' => 'Price',
             'type' => 'number',
             'name' => 'price',
             'placeholder' => 'Enter game price',
             'value' => $singleGame->price
        ],
        [
            'label' => 'Discount',
             'type' => 'number',
             'name' => 'discount',
             'placeholder' => 'Enter game discount or leave at 0',
             'value' => $singleGame->discount
        ],
        [
            'label' => 'Photos of game',
             'type' => 'file',
             'name' => 'photos_game[]',
             'multiple' => 'multiple'
        ],
        [
             'type' => 'hidden',
             'name' => 'id_game',
             'value' => $singleGame->id_game,
             'noLabel' => ''
        ],
        [
             'type' => 'hidden',
             'name' => 'files_hidden',
             'value' => $singleGame->photos,
             'noLabel' => ''
        ]
    ];
    foreach ($categories as $c) {
        $cat[] = ['value' => $c->id_category, 'text' => $c->category];
    }
    $categoryObject = new stdClass();
    $categoryObject->option = $cat;
    $categoryObject->name = 'categoriesDll';
    $categoryObject->label = 'Game category';
    $categoryObject->selected = $singleGame->id_category;


    $arrayDropdowns = [
        $categoryObject
    ];

    foreach ($genres as $g) {
        $genre[] = ['value' => $g->id_genre, 'text' => $g->genre];
    }
    foreach ($singleGame->genres as $s) {
        $selectedGenre[] = $s->id_genre;
    }
    $genreObject = new stdClass();
    $genreObject->option = $genre;
    $genreObject->name = 'genresChb[]';
    $genreObject->label = 'Game genres';
    $genreObject->selected = $selectedGenre;
    $arrayCheckboxs = [
      $genreObject
    ];

@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Edit Game',
            'method' => 'PUT',
            'action' => 'games.update',
            'arrayInputs' => $arrayInputs,
            'button' => '',
            'arrayDropdowns' => $arrayDropdowns,
            'arrayCheckboxs' => $arrayCheckboxs,
            'id' => $singleGame->id_game,
            'photos' => $singleGame->photos
        ])
    @endcomponent


@endsection
