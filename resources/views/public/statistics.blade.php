@extends('layouts.public')

@section('title', 'Statistik Negeri - Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="bg-primary py-16">
    <div class="mx-auto px-4 container">
        <div class="text-white text-center">
            <h1 class="mb-4 font-bold text-4xl md:text-5xl">Statistik Negeri Haria</h1>
            <p class="text-gray-200 text-xl">Data kependudukan dan mata pencaharian masyarakat</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        
        <!-- Data Statistik Umum Cards -->
        <div class="gap-6 grid grid-cols-1 md:grid-cols-2 mb-12">
            <!-- Total KK -->
            <div class="bg-white shadow-lg hover:shadow-xl p-8 rounded-lg text-center transition">
                <div class="flex justify-center mb-4">
                    <div class="flex justify-center items-center bg-blue-100 rounded-full w-16 h-16">
                        <i class="text-blue-600 text-3xl fas fa-home"></i>
                    </div>
                </div>
                <h3 class="mb-2 text-gray-600 text-lg">Total KK</h3>
                <p class="font-bold text-primary text-5xl">{{ number_format($statistic->total_kk) }}</p>
                <p class="mt-2 text-gray-500 text-sm">Kepala Keluarga</p>
            </div>

            <!-- Total Penduduk -->
            <div class="bg-white shadow-lg hover:shadow-xl p-8 rounded-lg text-center transition">
                <div class="flex justify-center mb-4">
                    <div class="flex justify-center items-center bg-green-100 rounded-full w-16 h-16">
                        <i class="text-green-600 text-3xl fas fa-users"></i>
                    </div>
                </div>
                <h3 class="mb-2 text-gray-600 text-lg">Total Penduduk</h3>
                <p class="font-bold text-primary text-5xl">{{ number_format($statistic->total_penduduk) }}</p>
                <p class="mt-2 text-gray-500 text-sm">Jiwa</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="gap-8 grid grid-cols-1 lg:grid-cols-2 mx-auto mb-12 max-w-6xl">
            
            <!-- Pie Chart: Jenis Kelamin -->
            <div class="bg-white shadow-lg p-8 rounded-lg">
                <h3 class="mb-6 font-bold text-primary text-2xl text-center">
                    <i class="mr-2 fas fa-venus-mars"></i>Perbandingan Jenis Kelamin
                </h3>
                <div class="flex justify-center">
                    <canvas id="genderChart" style="max-height: 300px;"></canvas>
                </div>
                <div class="flex justify-center gap-8 mt-6 text-sm">
                    <div class="flex items-center">
                        <div class="bg-blue-500 mr-2 rounded-full w-4 h-4"></div>
                        <span class="text-gray-700">Laki-laki: <strong>{{ number_format($statistic->jumlah_laki_laki) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-pink-500 mr-2 rounded-full w-4 h-4"></div>
                        <span class="text-gray-700">Perempuan: <strong>{{ number_format($statistic->jumlah_perempuan) }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Bar Chart: Pendidikan -->
            <div class="bg-white shadow-lg p-8 rounded-lg">
                <h3 class="mb-6 font-bold text-primary text-2xl text-center">
                    <i class="mr-2 fas fa-graduation-cap"></i>Tingkat Pendidikan
                </h3>
                <div class="flex justify-center">
                    <canvas id="educationChart" style="max-height: 300px;"></canvas>
                </div>
            </div>

        </div>

        <!-- Chart Pekerjaan (Full Width) -->
        <div class="mx-auto max-w-6xl">
            <div class="bg-white shadow-lg p-8 rounded-lg">
                <h3 class="mb-6 font-bold text-primary text-2xl text-center">
                    <i class="mr-2 fas fa-briefcase"></i>Mata Pencaharian Penduduk
                </h3>
                <div class="flex justify-center">
                    <canvas id="occupationChart" style="max-height: 400px;"></canvas>
                </div>
                
                <!-- Occupation Legend Grid -->
                <div class="gap-4 grid grid-cols-2 md:grid-cols-4 mt-8 text-sm">
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #10B981;"></div>
                        <span class="text-gray-700">Petani: <strong>{{ number_format($statistic->pekerjaan_petani ?? 0) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #3B82F6;"></div>
                        <span class="text-gray-700">Nelayan: <strong>{{ number_format($statistic->pekerjaan_nelayan ?? 0) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #F59E0B;"></div>
                        <span class="text-gray-700">Pedagang: <strong>{{ number_format($statistic->pekerjaan_pedagang ?? 0) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #8B5CF6;"></div>
                        <span class="text-gray-700">PNS/ASN: <strong>{{ number_format($statistic->pekerjaan_pns ?? 0) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #EC4899;"></div>
                        <span class="text-gray-700">Guru/Dosen: <strong>{{ number_format($statistic->pekerjaan_guru ?? 0) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #EF4444;"></div>
                        <span class="text-gray-700">Wiraswasta: <strong>{{ number_format($statistic->pekerjaan_wiraswasta ?? 0) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #6366F1;"></div>
                        <span class="text-gray-700">Buruh: <strong>{{ number_format($statistic->pekerjaan_buruh ?? 0) }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2 rounded-full w-4 h-4" style="background-color: #9CA3AF;"></div>
                        <span class="text-gray-700">Lainnya: <strong>{{ number_format($statistic->pekerjaan_lainnya ?? 0) }}</strong></span>
                    </div>
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
    new Chart(genderCtx, {
        type: 'doughnut',
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
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed || 0;
                            const total = {{ $statistic->total_penduduk }};
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${value.toLocaleString()} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    // Bar Chart: Pendidikan
    const educationCtx = document.getElementById('educationChart').getContext('2d');
    new Chart(educationCtx, {
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
                backgroundColor: [
                    '#10B981',
                    '#3B82F6',
                    '#F59E0B',
                    '#8B5CF6',
                    '#EC4899',
                    '#EF4444'
                ],
                borderWidth: 0,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.parsed.y} orang`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Bar Chart: Pekerjaan
    const occupationCtx = document.getElementById('occupationChart').getContext('2d');
    new Chart(occupationCtx, {
        type: 'bar',
        data: {
            labels: ['Petani', 'Nelayan', 'Pedagang', 'PNS/ASN', 'Guru/Dosen', 'Wiraswasta', 'Buruh', 'Lainnya'],
            datasets: [{
                label: 'Jumlah Pekerja',
                data: [
                    {{ $statistic->pekerjaan_petani ?? 0 }},
                    {{ $statistic->pekerjaan_nelayan ?? 0 }},
                    {{ $statistic->pekerjaan_pedagang ?? 0 }},
                    {{ $statistic->pekerjaan_pns ?? 0 }},
                    {{ $statistic->pekerjaan_guru ?? 0 }},
                    {{ $statistic->pekerjaan_wiraswasta ?? 0 }},
                    {{ $statistic->pekerjaan_buruh ?? 0 }},
                    {{ $statistic->pekerjaan_lainnya ?? 0 }}
                ],
                backgroundColor: [
                    '#10B981', // Green - Petani
                    '#3B82F6', // Blue - Nelayan
                    '#F59E0B', // Amber - Pedagang
                    '#8B5CF6', // Violet - PNS
                    '#EC4899', // Pink - Guru
                    '#EF4444', // Red - Wiraswasta
                    '#6366F1', // Indigo - Buruh
                    '#9CA3AF'  // Gray - Lainnya
                ],
                borderWidth: 0,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            indexAxis: 'y', // Horizontal bar
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.parsed.x} orang`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>

@endsection
