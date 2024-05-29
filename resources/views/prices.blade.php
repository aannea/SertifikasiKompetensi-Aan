@extends('components.app')

@section('content')
    <h2>Room Prices</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Room Type</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->type }}</td>
                    <td>Rp {{ $room->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
