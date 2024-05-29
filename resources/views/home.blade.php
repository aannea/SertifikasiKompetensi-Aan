<!-- resources/views/welcome.blade.php -->
@extends('components.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Welcome to Our Hotel</h1>
    <p class="lead">Enjoy your stay with the best comfort and services.</p>
    <hr class="my-4">
    <p>Discover our rooms, prices, and book your stay now!</p>
    <a class="btn btn-primary btn-lg" href="/rooms" role="button">View Rooms</a>
</div>
@endsection