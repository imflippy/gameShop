@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Username',
             'type' => 'text',
             'name' => 'username',
             'placeholder' => 'User username',
             'value' => $getUser->username
        ],
        [
            'label' => 'Email',
             'type' => 'mail',
             'name' => 'email',
             'placeholder' => 'User email',
             'value' => $getUser->email
        ],
        [
             'type' => 'hidden',
             'name' => 'id_user',
             'value' => $getUser->id_user,
             'noLabel' => ''
        ]
    ];

    foreach ($roles as $r) {
        $rola[] = ['value' => $r->id_role, 'text' => $r->role];
    }
    $roleObject = new stdClass();
    $roleObject->option = $rola;
    $roleObject->name = 'rolesDll';
    $roleObject->label = 'Role';
    $roleObject->selected = $getUser->id_role;

    $activityObject = new stdClass();
    $activityObject->option = [
            [
                'value' => 1,
                'text' => 'Active'
            ],
            [
                'value' => 0,
                'text' => 'Inactive'
            ]
        ];
    $activityObject->name = 'activity';
    $activityObject->label = 'Activity';
    $activityObject->selected = $getUser->active;


    $arrayDropdowns = [
        $roleObject, $activityObject
    ];

@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Update User',
            'method' => 'PUT',
            'action' => 'users.update',
            'arrayInputs' => $arrayInputs,
            'button' => '',
            'arrayDropdowns' => $arrayDropdowns,
            'id_user' => $getUser->id_user
        ])
    @endcomponent


@endsection
