@extends ('components.app')

@section('content')
<h2>Room Booking Statistics</h2>
<canvas id="statsChart" width="400" height="200"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('statsChart').getContext('2d');
var statsChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($roomTypes),
        datasets: [{
            label: 'Number of Bookings',
            data: @json($bookingsCount),
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection