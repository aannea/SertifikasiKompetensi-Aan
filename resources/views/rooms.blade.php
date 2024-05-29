@extends('components.app')

@section('content')
    <h2>Kamar Kami</h2>
    <div class="row">
        @foreach ($rooms as $room)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('img/' . $room->type . '.jpeg') }}" class="card-img-top" alt="{{ $room->type }}">
                    <div class="card-body">
                        <h5 class="card-title">Kamar {{ $room->type }}</h5>
                        <p class="card-text">Harga: Rp {{ $room->price }} per night</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
