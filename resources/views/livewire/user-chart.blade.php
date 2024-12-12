<!-- Blade View: livewire/user-chart.blade.php -->
<div>
    <canvas id="myChart"></canvas>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        // Ambil data chart yang dikirim oleh Livewire
        const chartData = @json($this->userChartData);
        console.log(chartData); // Debugging untuk memastikan data ada

        // Cek apakah data tersedia dan valid
        if (chartData && chartData.labels && chartData.data) {
            const ctx = document.getElementById('myChart').getContext('2d');

            new Chart(ctx, {
                type: 'line', // Jenis grafik
                data: {
                    labels: chartData.labels, // Labels tanggal
                    datasets: [{
                        label: 'Jumlah Pengguna Terdaftar',
                        data: chartData.data, // Data jumlah pengguna
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } else {
            console.error('Data chart tidak tersedia!');
        }
    });
</script>
@endpush
