@extends('components.app')

@section('content')
    <h2>Detail Pesanan</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Identitas</th>
                    <th>Tipe Kamar</th>
                    <th>Tanggal Booking</th>
                    <th>Durasi (malam)</th>
                    <th>Sarapan</th>
                    <th>Discount</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->gender }}</td>
                        <td>{{ $booking->identity_number }}</td>
                        <td>{{ $booking->room->type }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->duration }}</td>
                        <td>{{ $booking->breakfast ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $booking->discount }}%</td>
                        <td>Rp{{ number_format($booking->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{ route('bookings.deleteAll') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Semua Pesanan</button>
    </form>
@endsection
