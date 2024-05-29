@extends('components.app')

@section('content')
    <h2>Book a Room</h2>
    <form id="bookingForm" action="{{ route('createMantap') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="identity_number" class="form-label">Identity Number</label>
            <input type="text" class="form-control" id="identity_number" name="identity_number" required>
        </div>
        <div class="mb-3">
            <label for="room_id" class="form-label">Room Type</label>
            <select class="form-control" id="room_id" name="room_id" required>
                <option value="">Select Room Type</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" data-price="{{ $room->price }}">{{ $room->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="booking_date" class="form-label">Booking Date</label>
            <input type="text" class="form-control" id="booking_date" name="booking_date" placeholder="dd/mm/yyyy"
                required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (nights)</label>
            <input type="number" class="form-control" id="duration" name="duration" required>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="breakfast" name="breakfast" value="true">
            <label for="breakfast" class="form-check-label">Include Breakfast</label>
        </div>
        <button type="button" class="btn btn-primary" onclick="calculateTotal()">Calculate Total</button>

        <div id="totalPriceContainer" style="display:none; margin-top: 20px;">
            <h4>Total Price: <span id="totalPrice"></span></h4>
            <button type="submit" class="btn btn-success" onclick="return confirmBooking()">Confirm Booking</button>
        </div>
    </form>

    <script>
        function calculateTotal() {
            const duration = parseInt(document.getElementById('duration').value);
            const roomSelect = document.getElementById('room_id');
            const roomPrice = parseFloat(roomSelect.options[roomSelect.selectedIndex].dataset.price);
            const breakfast = document.getElementById('breakfast').checked; // Menyimpan nilai boolean breakfast

            if (isNaN(duration) || duration <= 0) {
                alert('Duration must be a positive number.');
                return;
            }

            let totalPrice = roomPrice * duration;
            if (duration > 3) {
                totalPrice *= 0.9;
            }
            if (breakfast) {
                totalPrice += 80000 * duration; // Jumlahkan biaya sarapan jika dipilih
            }

            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
            document.getElementById('totalPriceContainer').style.display = 'block';
        }

        function confirmBooking() {
            if (confirm("Are you sure you want to confirm this booking?")) {
                alert("Booking confirmed!");
                return true;
            } else {
                alert("Booking canceled.");
                return false;
            }
        }
    </script>
@endsection
