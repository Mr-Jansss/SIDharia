@extends('layouts.public')

@section('title', 'Statistik Negeri - Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Statistik Negeri</h1>
            <p class="text-xl text-gray-200">Data kependudukan dan wilayah Negeri Haria secara keseluruhan</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <!-- Data Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            <!-- Total KK -->
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-home text-blue-600 text-3xl"></i>
                    </div>
                </div>
                <h3 class="text-gray-600 text-lg mb-2">Total KK</h3>
                <p class="text-5xl font-bold text-primary">{{ number_format($statistic->total_kk) }}</p>
                <p class="text-gray-500 text-sm mt-2">Kepala Keluarga</p>
            </div>

            <!-- Total Penduduk -->
            <div class="bg-white rounded-lg shadow-lg p-8 text-center hover:shadow-xl transition">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-users text-green-600 text-3xl"></i>
                    </div>
                </div>
                <h3 class="text-gray-600 text-lg mb-2">Total Penduduk</h3>
                <p class="text-5xl font-bold text-primary">{{ number_format($statistic->total_penduduk) }}</p>
                <p class="text-gray-500 text-sm mt-2">Jiwa</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
            
            <!-- Pie Chart: Jenis Kelamin -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-2xl font-bold text-primary mb-6 text-center">Perbandingan Jenis Kelamin</h3>
                <div class="flex justify-center">
                    <canvas id="genderChart" style="max-height: 300px;"></canvas>
                </div>
                <div class="mt-6 flex justify-center gap-8 text-sm">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-blue-500 rounded-full mr-2"></div>
                        <span class="text-gray-700">Laki-laki: <strong>{{ number_format($statistic->jumlah_laki_laki) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-pink-500 rounded-full mr-2"></div>
                        <span class="text-gray-700">Perempuan: <strong>{{ number_format($statistic->jumlah_perempuan) }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Bar Chart: Pendidikan -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-2xl font-bold text-primary mb-6 text-center">Jenjang Pendidikan</h3>
                <div class="flex justify-center">
                    <canvas id="educationChart" style="max-height: 300px;"></canvas>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // Pie Chart: Jenis Kelamin
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(genderCtx, {
        type: 'pie',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [{{ $statistic->jumlah_laki_laki }}, {{ $statistic->jumlah_perempuan }}],
                backgroundColor: ['#3B82F6', '#EC4899'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        },
                        padding: 15
                    }
                }
            }
        }
    });

    // Bar Chart: Pendidikan
    const educationCtx = document.getElementById('educationChart').getContext('2d');
    const educationChart = new Chart(educationCtx, {
        type: 'bar',
        data: {
            labels: ['PAUD', 'TK', 'SD', 'SMP', 'SMA', 'S1'],
            datasets: [{
                label: 'Jumlah',
                data: [
                    {{ $statistic->pendidikan_paud }},
                    {{ $statistic->pendidikan_tk }},
                    {{ $statistic->pendidikan_sd }},
                    {{ $statistic->pendidikan_smp }},
                    {{ $statistic->pendidikan_sma }},
                    {{ $statistic->pendidikan_s1 }}
                ],
                backgroundColor: '#00529B',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection
