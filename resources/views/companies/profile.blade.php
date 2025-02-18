@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profile</h1>
        <p>Welcome, {{ auth()->user()->name }}</p>
    </div>
@endsection
