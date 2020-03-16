@extends('layouts.admin')

@php
    $title = 'Users';
    $tableRowsTitle = ['Id', 'Username', 'Email', 'Activity', 'Role', 'Edit', 'Delete'];

@endphp

@section('content')

@component('admin.components.table', [
    'title' => $title,
    'tableRowsTitle' => $tableRowsTitle,
    'tableRowContent' => $users

    ])
@endcomponent


@endsection
