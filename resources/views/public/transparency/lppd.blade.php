@extends('layouts.public')

@section('title', 'LPPD / LKPPD - Transparansi Keuangan Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-indigo-600 via-indigo-700 to-indigo-800 py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="z-10 relative mx-auto px-4 container">
        <div class="text-white text-center">
            <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm mb-4 px-6 py-2 rounded-full">
                <i class="mr-2 fas fa-file-alt"></i>
                <span class="font-semibold text-sm uppercase tracking-wider">Transparansi Keuangan</span>
            </div>
            <h1 class="mb-4 font-bold text-4xl md:text-5xl">Laporan Pertanggungjawaban</h1>
            <p class="mx-auto max-w-2xl text-indigo-100 text-xl">
                LPPD / LKPPD Penyelenggaraan Pemerintahan Negeri Haria
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
                <a href="{{ route('transparency.lppd') }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ !request('year') || request('year') == date('Y') ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ date('Y') }}
                </a>
                @foreach($availableYears as $availableYear)
                    @if($availableYear != date('Y'))
                        <a href="{{ route('transparency.lppd', ['year' => $availableYear]) }}" 
                           class="px-4 py-2 rounded-lg font-medium transition {{ request('year') == $availableYear ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
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
            @if($lppdData->isNotEmpty())
                <!-- Info Cards -->
                <div class="gap-6 grid grid-cols-1 md:grid-cols-3 mb-8">
                    <div class="bg-white shadow-lg p-6 rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="bg-indigo-100 p-3 rounded-lg text-indigo-600">
                                <i class="text-2xl fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-500 text-xs">Tahun Laporan</p>
                                <p class="font-bold text-gray-800 text-2xl">{{ $year }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg p-6 rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="bg-green-100 p-3 rounded-lg text-green-600">
                                <i class="text-2xl fas fa-file-alt"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-500 text-xs">Jumlah Dokumen</p>
                                <p class="font-bold text-gray-800 text-2xl">{{ $lppdData->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-lg p-6 rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-100 p-3 rounded-lg text-blue-600">
                                <i class="text-2xl fas fa-check-circle"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-500 text-xs">Status</p>
                                <p class="font-bold text-gray-800 text-lg">Terpublikasi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LPPD Items -->
                <div class="space-y-6">
                    @foreach($lppdData as $item)
                        <div class="bg-white shadow-lg hover:shadow-xl rounded-xl transition-shadow duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 p-6">
                                <div class="flex md:flex-row flex-col justify-between items-start gap-4">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 bg-white bg-opacity-20 p-4 rounded-lg">
                                            <i class="text-white text-3xl fas fa-file-contract"></i>
                                        </div>
                                        <div class="text-white">
                                            <h3 class="mb-2 font-bold text-2xl">{{ $item->title }}</h3>
                                            <p class="text-indigo-100">Tahun Anggaran {{ $item->fiscal_year }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                @if($item->description)
                                    <div class="bg-indigo-50 mb-6 p-4 border-indigo-200 border-l-4 rounded-lg">
                                        <p class="text-gray-700 leading-relaxed">{{ $item->description }}</p>
                                    </div>
                                @endif

                                <!-- Content Sections (if additional_data available) -->
                                @if($item->additional_data && isset($item->additional_data['sections']))
                                    <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mb-6">
                                        @foreach($item->additional_data['sections'] as $section)
                                            <div class="bg-gray-50 p-4 border-gray-200 border rounded-lg hover:shadow-md transition-shadow">
                                                <div class="flex items-start gap-3">
                                                    <i class="mt-1 text-indigo-600 text-xl {{ $section['icon'] ?? 'fas fa-check' }}"></i>
                                                    <div>
                                                        <h4 class="mb-1 font-bold text-gray-800">{{ $section['title'] }}</h4>
                                                        <p class="text-gray-600 text-sm">{{ $section['description'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Statistics (if available) -->
                                @if($item->additional_data && isset($item->additional_data['statistics']))
                                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 mb-6 p-6 rounded-xl">
                                        <h4 class="mb-4 font-bold text-gray-800 text-lg">Ringkasan Statistik</h4>
                                        <div class="gap-4 grid grid-cols-2 md:grid-cols-4">
                                            @foreach($item->additional_data['statistics'] as $stat)
                                                <div class="text-center">
                                                    <p class="mb-1 font-bold text-indigo-600 text-2xl">{{ $stat['value'] }}</p>
                                                    <p class="text-gray-600 text-xs">{{ $stat['label'] }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Download Buttons -->
                                <div class="flex flex-wrap gap-3 pt-4 border-gray-200 border-t">
                                    @if($item->pdf_file)
                                        <a href="{{ asset('storage/' . $item->pdf_file) }}" 
                                           target="_blank"
                                           class="inline-flex items-center bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-medium text-white transition">
                                            <i class="mr-2 fas fa-file-pdf"></i>
                                            Download LPPD Lengkap
                                        </a>
                                    @endif
                                    @if($item->infographic_image)
                                        <a href="{{ asset('storage/' . $item->infographic_image) }}" 
                                           target="_blank"
                                           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium text-white transition">
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
                            <i class="text-gray-400 text-4xl fas fa-file-contract"></i>
                        </div>
                        <h3 class="mb-3 font-bold text-gray-800 text-2xl">LPPD Belum Tersedia</h3>
                        <p class="mb-6 text-gray-600">
                            Laporan Pertanggungjawaban untuk tahun {{ $year }} sedang dalam proses penyusunan.
                        </p>
                        <a href="{{ route('home') }}" class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-700">
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
<section class="bg-indigo-50 py-12">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-4xl">
            <div class="text-center mb-8">
                <div class="inline-flex justify-center items-center bg-indigo-600 mb-4 rounded-full w-16 h-16 text-white">
                    <i class="text-2xl fas fa-info-circle"></i>
                </div>
                <h3 class="mb-3 font-bold text-gray-800 text-2xl">Tentang LPPD / LKPPD</h3>
            </div>
            
            <div class="gap-6 grid grid-cols-1 md:grid-cols-2">
                <div class="bg-white p-6 rounded-xl">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 bg-indigo-100 p-3 rounded-lg text-indigo-600">
                            <i class="text-xl fas fa-file-alt"></i>
                        </div>
                        <div>
                            <h4 class="mb-2 font-bold text-gray-800">LPPD</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Laporan Penyelenggaraan Pemerintahan Negeri yang memuat informasi penyelenggaraan urusan pemerintahan, keuangan, dan pembangunan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 bg-green-100 p-3 rounded-lg text-green-600">
                            <i class="text-xl fas fa-users"></i>
                        </div>
                        <div>
                            <h4 class="mb-2 font-bold text-gray-800">LKPPD</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Laporan Keterangan Pertanggungjawaban Pemerintah Negeri yang disampaikan kepada Saniri Negeri Haria sebagai bentuk akuntabilitas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
