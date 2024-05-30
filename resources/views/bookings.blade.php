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
            <label class="form-label">Jenis Kelamin</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="genderCowo" name="gender" value="Cowo" required>
                <label class="form-check-label" for="genderCowo">Cowo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="genderCewe" name="gender" value="Cewe" required>
                <label class="form-check-label" for="genderCewe">Cewe</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="identity_number" class="form-label">Nomor KTP</label>
            <input type="text" class="form-control" id="identity_number" name="identity_number" required>
            <div class="invalid-feedback">Isian salah.. data harus 16 digit</div>
        </div>
        <div class="mb-3">
            <label for="room_id" class="form-label">Tipe Kamar</label>
            <select class="form-control" id="room_id" name="room_id" required>
                <option value="">Pilih Tipe Kamar</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" data-price="{{ $room->price }}" data-type="{{ $room->type }}">{{ $room->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="room_price" class="form-label">Harga Kamar</label>
            <input type="text" class="form-control" id="room_price" readonly>
        </div>
        <div class="mb-3">
            <label for="booking_date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="booking_date" name="booking_date" placeholder="dd/mm/yyyy"
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
            <button type="button" class="btn btn-success" onclick="confirmBooking()">Konfirmasi</button>
        </div>
    </form>

    <script>
        function formatNumber(number) {
            return number.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

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
            let discount = 0;
            if (duration > 3) {
                totalPrice *= 0.9;
                discount = 10;
            }
            if (breakfast) {
                totalPrice += 80000 * duration;
            }

            document.getElementById('totalPrice').innerText = formatNumber(totalPrice);
            document.getElementById('totalPriceContainer').style.display = 'block';

            return discount;
        }

        function confirmBooking() {
            const name = document.getElementById('name').value;
            const gender = document.querySelector('input[name="gender"]:checked').value;
            const identityNumber = document.getElementById('identity_number').value;
            const roomSelect = document.getElementById('room_id');
            const roomType = roomSelect.options[roomSelect.selectedIndex].text;
            const roomPrice = parseFloat(roomSelect.options[roomSelect.selectedIndex].dataset.price);
            const roomTypeData = roomSelect.options[roomSelect.selectedIndex].dataset.type;
            const bookingDate = document.getElementById('booking_date').value;
            const duration = document.getElementById('duration').value;
            const breakfast = document.getElementById('breakfast').checked ? 'Yes' : 'No';
            const totalPrice = document.getElementById('totalPrice').innerText;
            const discount = calculateTotal();

            const imageUrl = `/img/${roomTypeData}.jpeg`;

            const confirmationMessage = `
                Nama: ${name}\n
                Jenis Kelamin: ${gender}\n
                Nomor KTP: ${identityNumber}\n
                Tipe Kamar: ${roomType}\n
                Harga Kamar: Rp. ${formatNumber(roomPrice)}\n
                Tanggal: ${bookingDate}\n
                Lama (malam): ${duration}\n
                Dengan Sarapan: ${breakfast}\n
                Diskon: ${discount}%\n
                Total Harga: Rp. ${totalPrice}
            `;

            if (confirm(confirmationMessage)) {
                const confirmationHtml = `
                    <p>${confirmationMessage.replace(/\n/g, '<br>')}</p>
                    <img src="${imageUrl}" alt="Room Image" style="max-width: 100%; height: auto;">
                `;

                const confirmationDiv = document.createElement('div');
                confirmationDiv.innerHTML = confirmationHtml;
                document.body.appendChild(confirmationDiv);

                setTimeout(() => {
                    alert(confirmationMessage);
                    document.getElementById('bookingForm').submit();
                }, 100);
            }
        }

        document.getElementById('identity_number').addEventListener('input', function () {
            const identityNumber = document.getElementById('identity_number');
            if (identityNumber.value.length !== 16) {
                identityNumber.classList.add('is-invalid');
            } else {
                identityNumber.classList.remove('is-invalid');
            }
        });

        document.getElementById('room_id').addEventListener('change', function() {
            const roomSelect = document.getElementById('room_id');
            const roomPrice = parseFloat(roomSelect.options[roomSelect.selectedIndex].dataset.price);
            document.getElementById('room_price').value = 'Rp. ' + formatNumber(roomPrice);
        });
    </script>
@endsection
