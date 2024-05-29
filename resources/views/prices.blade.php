@extends('components.app')

@section('content')
    <h2>Harga Kamar</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipe Kamar</th>
                <th>Harga Kamar</th>
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
