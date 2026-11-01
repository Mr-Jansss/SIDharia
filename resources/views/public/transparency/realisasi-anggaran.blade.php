@extends('layouts.public')

@section('title', 'Laporan Realisasi Anggaran - Transparansi Keuangan Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="z-10 relative mx-auto px-4 container">
        <div class="text-white text-center">
            <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm mb-4 px-6 py-2 rounded-full">
                <i class="mr-2 fas fa-chart-line"></i>
                <span class="font-semibold text-sm uppercase tracking-wider">Transparansi Keuangan</span>
            </div>
            <h1 class="mb-4 font-bold text-4xl md:text-5xl">Laporan Realisasi Anggaran</h1>
            <p class="mx-auto max-w-2xl text-blue-100 text-xl">
                Penyerapan dan Realisasi Anggaran Negeri Haria Tahun {{ $year }}
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="bg-white shadow-md py-6">
    <div class="mx-auto px-4 container">
        <div class="flex md:flex-row flex-col justify-between items-center gap-4">
            <!-- Filter Tahun -->
            <div class="flex items-center gap-2">
                <i class="text-gray-600 fas fa-filter"></i>
                <span class="font-semibold text-gray-700">Filter:</span>
                <select onchange="window.location.href='{{ route('transparency.realisasi-anggaran') }}?year='+this.value+'&semester={{ $semester }}'" 
                        class="border-gray-300 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($availableYears as $availableYear)
                        <option value="{{ $availableYear }}" {{ $year == $availableYear ? 'selected' : '' }}>
                            Tahun {{ $availableYear }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Filter Semester -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('transparency.realisasi-anggaran', ['year' => $year, 'semester' => 'all']) }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ $semester == 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Semua
                </a>
                <a href="{{ route('transparency.realisasi-anggaran', ['year' => $year, 'semester' => '1']) }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ $semester == '1' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Semester 1
                </a>
                <a href="{{ route('transparency.realisasi-anggaran', ['year' => $year, 'semester' => '2']) }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ $semester == '2' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Semester 2
                </a>
                <a href="{{ route('transparency.realisasi-anggaran', ['year' => $year, 'semester' => 'tahunan']) }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ $semester == 'tahunan' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Tahunan
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-6xl">
            @if($realisasiData->isNotEmpty())
                <!-- Summary Cards -->
                <div class="gap-6 grid grid-cols-1 md:grid-cols-4 mb-8">
                    @php
                        $totalBudget = $realisasiData->sum('budget_amount');
                        $totalRealization = $realisasiData->sum('realization_amount');
                        $avgPercentage = $realisasiData->avg('percentage');
                        $itemCount = $realisasiData->count();
                    @endphp
                    
                    <div class="bg-white shadow-lg p-6 rounded-xl">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-blue-100 p-3 rounded-lg text-blue-600">
                                <i class="text-xl fas fa-wallet"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-500 text-xs">Total Anggaran</p>
                                <p class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalBudget, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg p-6 rounded-xl">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-green-100 p-3 rounded-lg text-green-600">
                                <i class="text-xl fas fa-check-circle"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-500 text-xs">Realisasi</p>
                                <p class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalRealization, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg p-6 rounded-xl">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-purple-100 p-3 rounded-lg text-purple-600">
                                <i class="text-xl fas fa-percentage"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-500 text-xs">Rata-rata Serapan</p>
                                <p class="font-bold text-gray-800 text-lg">{{ number_format($avgPercentage, 1) }}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg p-6 rounded-xl">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-orange-100 p-3 rounded-lg text-orange-600">
                                <i class="text-xl fas fa-file-alt"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-500 text-xs">Jumlah Laporan</p>
                                <p class="font-bold text-gray-800 text-lg">{{ $itemCount }} Item</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Realisasi Items -->
                <div class="space-y-6">
                    @foreach($realisasiData as $item)
                        <div class="bg-white shadow-lg hover:shadow-xl rounded-xl transition-shadow duration-300 overflow-hidden">
                            <div class="p-6">
                                <!-- Header -->
                                <div class="flex md:flex-row flex-col justify-between items-start gap-4 mb-4">
                                    <div class="flex-1">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 bg-blue-100 mt-1 p-3 rounded-lg text-blue-600">
                                                <i class="text-xl fas fa-chart-line"></i>
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2 mb-2">
                                                    <h3 class="font-bold text-gray-800 text-xl">{{ $item->title }}</h3>
                                                    <span class="bg-blue-100 px-3 py-1 rounded-full font-semibold text-blue-700 text-xs">
                                                        {{ $item->semester == '1' ? 'Semester 1' : ($item->semester == '2' ? 'Semester 2' : 'Tahunan') }}
                                                    </span>
                                                </div>
                                                @if($item->description)
                                                    <p class="text-gray-600 leading-relaxed">{{ $item->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress and Numbers -->
                                <div class="gap-6 grid grid-cols-1 md:grid-cols-2 mb-4">
                                    <div>
                                        <div class="flex justify-between mb-2">
                                            <span class="font-medium text-gray-700 text-sm">Anggaran</span>
                                            <span class="font-bold text-blue-600">{{ $item->formatted_budget }}</span>
                                        </div>
                                        <div class="flex justify-between mb-2">
                                            <span class="font-medium text-gray-700 text-sm">Realisasi</span>
                                            <span class="font-bold text-green-600">{{ $item->formatted_realization }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-2 font-semibold text-gray-700 text-sm">Persentase Realisasi</p>
                                        <div class="relative bg-gray-200 rounded-full w-full h-8 overflow-hidden">
                                            <div class="flex justify-center items-center absolute inset-0 z-10 font-bold text-sm text-white">
                                                {{ number_format($item->percentage, 1) }}%
                                            </div>
                                            <div class="absolute inset-y-0 left-0 bg-gradient-to-r from-blue-500 to-green-500 transition-all duration-500" 
                                                 style="width: {{ min($item->percentage, 100) }}%">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Download Button -->
                                @if($item->pdf_file)
                                    <div class="pt-4 border-gray-200 border-t">
                                        <a href="{{ asset('storage/' . $item->pdf_file) }}" 
                                           target="_blank"
                                           class="inline-flex items-center bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg font-medium text-white transition">
                                            <i class="mr-2 fas fa-file-pdf"></i>
                                            Download Laporan PDF
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <!-- Empty State -->
                <div class="bg-white shadow-lg p-12 rounded-xl text-center">
                    <div class="mx-auto max-w-md">
                        <div class="inline-flex justify-center items-center bg-gray-100 mb-6 rounded-full w-20 h-20">
                            <i class="text-gray-400 text-4xl fas fa-chart-line"></i>
                        </div>
                        <h3 class="mb-3 font-bold text-gray-800 text-2xl">Laporan Realisasi Belum Tersedia</h3>
                        <p class="mb-6 text-gray-600">
                            Laporan realisasi anggaran untuk periode yang dipilih sedang dalam proses penyusunan.
                        </p>
                        <a href="{{ route('home') }}" class="inline-flex items-center font-semibold text-blue-600 hover:text-blue-700">
                            <i class="fa-arrow-left mr-2 fas"></i>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Info Footer -->
<section class="bg-blue-50 py-12">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-4xl text-center">
            <div class="inline-flex justify-center items-center bg-blue-600 mb-4 rounded-full w-16 h-16 text-white">
                <i class="text-2xl fas fa-info-circle"></i>
            </div>
            <h3 class="mb-3 font-bold text-gray-800 text-2xl">Tentang Laporan Realisasi Anggaran</h3>
            <p class="text-gray-600 leading-relaxed">
                Laporan Realisasi Anggaran menunjukkan tingkat penyerapan dan penggunaan anggaran yang telah direncanakan dalam APB Negeri. Laporan ini disajikan per semester dan tahunan untuk transparansi pengelolaan keuangan negeri.
            </p>
        </div>
    </div>
</section>
@endsection
