@extends('components.app')

@section('content')
    <h2>Pesan Kamar</h2>
    <form id="bookingForm" action="{{ route('createMantap') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="">Pilih jenis kelamin</option>
                <option value="Cowo">Cowo</option>
                <option value="Cewe">Cewe</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="identity_number" class="form-label">Nomor KTP</label>
            <input type="text" class="form-control" id="identity_number" name="identity_number" required>
        </div>
        <div class="mb-3">
            <label for="room_id" class="form-label">Tipe Kamar</label>
            <select class="form-control" id="room_id" name="room_id" required>
                <option value="">Pilih Tipe Kamar</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" data-price="{{ $room->price }}">{{ $room->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="booking_date" class="form-label">Tanggal</label>
            <input type="text" class="form-control" id="booking_date" name="booking_date" placeholder="dd/mm/yyyy"
                required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Lama (malam)</label>
            <input type="number" class="form-control" id="duration" name="duration" required>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="breakfast" name="breakfast" value="true">
            <label for="breakfast" class="form-check-label">Dengan Sarapan</label>
        </div>
        <button type="button" class="btn btn-primary" onclick="calculateTotal()">Hitung Total</button>

        <div id="totalPriceContainer" style="display:none; margin-top: 20px;">
            <h4>Total Price: <span id="totalPrice"></span></h4>
            <button type="submit" class="btn btn-success" onclick="return confirmBooking()">Konfirmasi</button>
        </div>
    </form>

    <script>
        function calculateTotal() {
            const duration = parseInt(document.getElementById('duration').value);
            const roomSelect = document.getElementById('room_id');
            const roomPrice = parseFloat(roomSelect.options[roomSelect.selectedIndex].dataset.price);
            const breakfast = document.getElementById('breakfast').checked; 

            if (isNaN(duration) || duration <= 0) {
                alert('Duration must be a positive number.');
                return;
            }

            let totalPrice = roomPrice * duration;
            if (duration > 3) {
                totalPrice *= 0.9;
            }
            if (breakfast) {
                totalPrice += 80000 * duration;
            }

            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
            document.getElementById('totalPriceContainer').style.display = 'block';
        }

        function confirmBooking() {
            if (confirm("Pesanan Sudah Benar?")) {
                alert("Pesanan terkonfirmasi!");
                return true;
            } else {
                alert("Pesanan Batal");
                return false;
            }
        }
    </script>
@endsection
