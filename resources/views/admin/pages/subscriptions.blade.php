@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Title',
             'type' => 'text',
             'name' => 'title',
             'placeholder' => 'Enter mail title',
        ],
        [
            'label' => 'Subject',
             'type' => 'text',
             'name' => 'subject',
             'placeholder' => 'Enter mail subject',
        ]
    ];

    $textarea = new stdClass();
    $textarea->title = "Mail body";
    $textarea->name = "content-mail";

@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Send Mail to all Subscribers',
            'method' => 'POST',
            'action' => 'subs.store',
            'arrayInputs' => $arrayInputs,
            'textarea' => $textarea,
            'button' => ''
        ])
    @endcomponent


@endsection
