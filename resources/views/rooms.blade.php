@extends('components.app')

@section('content')
    <h2>Our Rooms</h2>
    <div class="row">
        @foreach ($rooms as $room)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('images/' . $room->type . '.jpg') }}" class="card-img-top" alt="{{ $room->type }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->type }} Room</h5>
                        <p class="card-text">Price: Rp {{ $room->price }} per night</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
