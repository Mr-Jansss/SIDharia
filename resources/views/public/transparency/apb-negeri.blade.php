@extends('layouts.public')

@section('title', 'APB Negeri - Transparansi Keuangan Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-green-600 via-green-700 to-green-800 py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="z-10 relative mx-auto px-4 container">
        <div class="text-white text-center">
            <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm mb-4 px-6 py-2 rounded-full">
                <i class="mr-2 fas fa-file-invoice-dollar"></i>
                <span class="font-semibold text-sm uppercase tracking-wider">Transparansi Keuangan</span>
            </div>
            <h1 class="mb-4 font-bold text-4xl md:text-5xl">APB Negeri Haria</h1>
            <p class="mx-auto max-w-2xl text-green-100 text-xl">
                Anggaran Pendapatan dan Belanja Negeri Tahun {{ $year }}
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="bg-white shadow-md py-6">
    <div class="mx-auto px-4 container">
        <div class="flex md:flex-row flex-col justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <i class="text-gray-600 fas fa-filter"></i>
                <span class="font-semibold text-gray-700">Filter Tahun:</span>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('transparency.apb-negeri') }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ !request('year') || request('year') == date('Y') ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ date('Y') }}
                </a>
                @foreach($availableYears as $availableYear)
                    @if($availableYear != date('Y'))
                        <a href="{{ route('transparency.apb-negeri', ['year' => $availableYear]) }}" 
                           class="px-4 py-2 rounded-lg font-medium transition {{ request('year') == $availableYear ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                            {{ $availableYear }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-6xl">
            @if($apbData->isNotEmpty())
                <!-- Summary Cards -->
                <div class="gap-6 grid grid-cols-1 md:grid-cols-3 mb-8">
                    @php
                        $totalBudget = $apbData->sum('budget_amount');
                        $totalPendapatan = $apbData->where('additional_data.type', 'pendapatan')->sum('budget_amount');
                        $totalBelanja = $apbData->where('additional_data.type', 'belanja')->sum('budget_amount');
                    @endphp
                    
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg p-6 rounded-xl text-white">
                        <div class="flex justify-between items-start mb-2">
                            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                <i class="text-2xl fas fa-wallet"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 font-semibold text-blue-100 text-sm">Total Anggaran</h3>
                        <p class="font-bold text-2xl">Rp {{ number_format($totalBudget, 0, ',', '.') }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-green-500 to-green-600 shadow-lg p-6 rounded-xl text-white">
                        <div class="flex justify-between items-start mb-2">
                            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                <i class="text-2xl fas fa-arrow-down"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 font-semibold text-green-100 text-sm">Total Pendapatan</h3>
                        <p class="font-bold text-2xl">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 shadow-lg p-6 rounded-xl text-white">
                        <div class="flex justify-between items-start mb-2">
                            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                <i class="text-2xl fas fa-arrow-up"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 font-semibold text-orange-100 text-sm">Total Belanja</h3>
                        <p class="font-bold text-2xl">Rp {{ number_format($totalBelanja, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- APB Items -->
                <div class="space-y-6">
                    @foreach($apbData as $item)
                        <div class="bg-white shadow-lg hover:shadow-xl rounded-xl transition-shadow duration-300 overflow-hidden">
                            <div class="p-6">
                                <div class="flex md:flex-row flex-col justify-between items-start gap-4 mb-4">
                                    <div class="flex-1">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 bg-green-100 mt-1 p-3 rounded-lg text-green-600">
                                                <i class="text-xl fas fa-file-invoice-dollar"></i>
                                            </div>
                                            <div>
                                                <h3 class="mb-2 font-bold text-gray-800 text-xl">{{ $item->title }}</h3>
                                                @if($item->description)
                                                    <p class="text-gray-600 leading-relaxed">{{ $item->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="mb-1 font-semibold text-gray-500 text-sm">Nominal Anggaran</p>
                                        <p class="font-bold text-green-600 text-2xl">{{ $item->formatted_budget }}</p>
                                    </div>
                                </div>

                                <!-- Download Buttons -->
                                <div class="flex flex-wrap gap-3 pt-4 border-gray-200 border-t">
                                    @if($item->pdf_file)
                                        <a href="{{ asset('storage/' . $item->pdf_file) }}" 
                                           target="_blank"
                                           class="inline-flex items-center bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg font-medium text-white transition">
                                            <i class="mr-2 fas fa-file-pdf"></i>
                                            Download PDF
                                        </a>
                                    @endif
                                    @if($item->infographic_image)
                                        <a href="{{ asset('storage/' . $item->infographic_image) }}" 
                                           target="_blank"
                                           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-medium text-white transition">
                                            <i class="mr-2 fas fa-image"></i>
                                            Lihat Infografis
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <!-- Empty State -->
                <div class="bg-white shadow-lg p-12 rounded-xl text-center">
                    <div class="mx-auto max-w-md">
                        <div class="inline-flex justify-center items-center bg-gray-100 mb-6 rounded-full w-20 h-20">
                            <i class="text-gray-400 text-4xl fas fa-file-invoice"></i>
                        </div>
                        <h3 class="mb-3 font-bold text-gray-800 text-2xl">Data APB Negeri Belum Tersedia</h3>
                        <p class="mb-6 text-gray-600">
                            Data APB Negeri untuk tahun {{ $year }} sedang dalam proses penyusunan.
                        </p>
                        <a href="{{ route('home') }}" class="inline-flex items-center font-semibold text-green-600 hover:text-green-700">
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
<section class="bg-green-50 py-12">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-4xl text-center">
            <div class="inline-flex justify-center items-center bg-green-600 mb-4 rounded-full w-16 h-16 text-white">
                <i class="text-2xl fas fa-info-circle"></i>
            </div>
            <h3 class="mb-3 font-bold text-gray-800 text-2xl">Tentang APB Negeri</h3>
            <p class="text-gray-600 leading-relaxed">
                APB Negeri (Anggaran Pendapatan dan Belanja Negeri) adalah rencana keuangan tahunan pemerintahan Negeri Haria yang memuat rincian pendapatan dan belanja untuk menjalankan program dan kegiatan pembangunan demi kesejahteraan masyarakat.
            </p>
        </div>
    </div>
</section>
@endsection
