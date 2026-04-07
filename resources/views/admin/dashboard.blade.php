@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('pageTitle', 'Welcome Back, ' . auth()->user()->name)

@section('content')
    @php
        $isAdmin = true;
        $roleLabel = 'Admin';
        $stats = [
            ['title' => 'Active Users', 'value' => 24, 'icon' => 'fa-users', 'color' => 'bg-sky-500'],
            ['title' => 'Available Items', 'value' => 132, 'icon' => 'fa-boxes-stacked', 'color' => 'bg-emerald-500'],
            ['title' => 'Pending Categories', 'value' => 8, 'icon' => 'fa-tags', 'color' => 'bg-indigo-500'],
        ];
    @endphp
@endsection