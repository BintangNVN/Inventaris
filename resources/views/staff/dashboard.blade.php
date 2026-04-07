@extends('layouts.app')

@section('title', 'Staff Dashboard')
@section('pageTitle', 'Welcome Back, ' . auth()->user()->name)

@section('content')
  <h1>halo halo ini dashboard staff</h1>
@endsection