@extends('layouts.admin')

@php
    $arrayInputs = [
            [
            'label' => 'Username',
             'type' => 'text',
             'name' => 'username',
             'placeholder' => 'User username',
        ],
        [
            'label' => 'Email',
             'type' => 'mail',
             'name' => 'email',
             'placeholder' => 'User email',
        ],
        [
            'label' => 'Password',
             'type' => 'password',
             'name' => 'password',
             'placeholder' => 'User password',
        ],
        [
            'label' => 'Confirm Password',
             'type' => 'password',
             'name' => 'confirmPassword',
             'placeholder' => 'Confirm password',
        ]
    ];

    foreach ($roles as $r) {
        $rola[] = ['value' => $r->id_role, 'text' => $r->role];
    }
    $roleObject = new stdClass();
    $roleObject->option = $rola;
    $roleObject->name = 'rolesDll';
    $roleObject->label = 'Role';

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

    $arrayDropdowns = [
        $roleObject, $activityObject
    ];

@endphp

@section('content')

    @component('admin.components.form', [
            'title' => 'Add New User',
            'method' => 'POST',
            'action' => 'users.store',
            'arrayInputs' => $arrayInputs,
            'button' => '',
            'arrayDropdowns' => $arrayDropdowns
        ])
    @endcomponent


@endsection
