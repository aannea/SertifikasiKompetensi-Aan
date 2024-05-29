<!-- resources/views/welcome.blade.php -->
@extends('components.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Selamat datang di hotel kami</h1>
    <p class="lead">Selamat menikmati kenyamanan dan pelayanan terbaik kami.</p>
    <hr class="my-4">
    <p>Cek kamar kami dan segera booking!</p>
    <a class="btn btn-primary btn-lg" href="/rooms" role="button">Lihat Kamar</a>
</div>
@endsection