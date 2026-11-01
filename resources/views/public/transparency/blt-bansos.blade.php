@extends('layouts.public')

@section('title', 'Penyaluran BLT & Bansos - Transparansi Keuangan Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-purple-600 via-purple-700 to-purple-800 py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="z-10 relative mx-auto px-4 container">
        <div class="text-white text-center">
            <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm mb-4 px-6 py-2 rounded-full">
                <i class="mr-2 fas fa-hand-holding-usd"></i>
                <span class="font-semibold text-sm uppercase tracking-wider">Transparansi Keuangan</span>
            </div>
            <h1 class="mb-4 font-bold text-4xl md:text-5xl">Penyaluran BLT & Bansos</h1>
            <p class="mx-auto max-w-2xl text-purple-100 text-xl">
                Bantuan Langsung Tunai dan Bantuan Sosial untuk Masyarakat Negeri Haria
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
                <a href="{{ route('transparency.blt-bansos') }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ !request('year') || request('year') == date('Y') ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ date('Y') }}
                </a>
                @foreach($availableYears as $availableYear)
                    @if($availableYear != date('Y'))
                        <a href="{{ route('transparency.blt-bansos', ['year' => $availableYear]) }}" 
                           class="px-4 py-2 rounded-lg font-medium transition {{ request('year') == $availableYear ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
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
            @if($bltData->isNotEmpty())
                <!-- Summary Cards -->
                <div class="gap-6 grid grid-cols-1 md:grid-cols-3 mb-8">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 shadow-lg p-6 rounded-xl text-white">
                        <div class="flex justify-between items-start mb-2">
                            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                <i class="text-2xl fas fa-users"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 font-semibold text-purple-100 text-sm">Total Penerima Manfaat</h3>
                        <p class="font-bold text-3xl">{{ number_format($totalBeneficiaries, 0, ',', '.') }}</p>
                        <p class="text-purple-200 text-xs">Keluarga Penerima Manfaat (KPM)</p>
                    </div>

                    <div class="bg-gradient-to-br from-green-500 to-green-600 shadow-lg p-6 rounded-xl text-white">
                        <div class="flex justify-between items-start mb-2">
                            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                <i class="text-2xl fas fa-wallet"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 font-semibold text-green-100 text-sm">Total Dana Disalurkan</h3>
                        <p class="font-bold text-2xl">Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
                        <p class="text-green-200 text-xs">Tahun {{ $year }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg p-6 rounded-xl text-white">
                        <div class="flex justify-between items-start mb-2">
                            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                <i class="text-2xl fas fa-file-alt"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 font-semibold text-blue-100 text-sm">Jumlah Program</h3>
                        <p class="font-bold text-3xl">{{ $bltData->count() }}</p>
                        <p class="text-blue-200 text-xs">Program Bantuan Aktif</p>
                    </div>
                </div>

                <!-- BLT Items -->
                <div class="space-y-6">
                    @foreach($bltData as $item)
                        <div class="bg-white shadow-lg hover:shadow-xl rounded-xl transition-shadow duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-4">
                                <h3 class="font-bold text-white text-xl">{{ $item->title }}</h3>
                                <p class="text-purple-100 text-sm">Tahun Anggaran {{ $item->fiscal_year }}</p>
                            </div>
                            
                            <div class="p-6">
                                @if($item->description)
                                    <p class="mb-4 text-gray-600 leading-relaxed">{{ $item->description }}</p>
                                @endif

                                <!-- Stats Grid -->
                                <div class="gap-4 grid grid-cols-1 md:grid-cols-3 mb-4">
                                    <div class="bg-purple-50 p-4 border-purple-200 border-l-4 rounded-lg">
                                        <p class="mb-1 font-semibold text-gray-700 text-sm">Jumlah Penerima</p>
                                        <p class="font-bold text-purple-600 text-2xl">{{ number_format($item->beneficiary_count, 0, ',', '.') }}</p>
                                        <p class="text-gray-500 text-xs">KPM</p>
                                    </div>
                                    
                                    <div class="bg-green-50 p-4 border-green-200 border-l-4 rounded-lg">
                                        <p class="mb-1 font-semibold text-gray-700 text-sm">Total Dana</p>
                                        <p class="font-bold text-green-600 text-xl">{{ $item->formatted_budget }}</p>
                                    </div>
                                    
                                    <div class="bg-blue-50 p-4 border-blue-200 border-l-4 rounded-lg">
                                        <p class="mb-1 font-semibold text-gray-700 text-sm">Dana per KPM</p>
                                        @if($item->beneficiary_count > 0)
                                            <p class="font-bold text-blue-600 text-xl">
                                                Rp {{ number_format($item->budget_amount / $item->beneficiary_count, 0, ',', '.') }}
                                            </p>
                                        @else
                                            <p class="font-bold text-blue-600 text-xl">-</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Additional Data (RT/Soa breakdown if available) -->
                                @if($item->additional_data && isset($item->additional_data['breakdown']))
                                    <div class="bg-gray-50 mb-4 p-4 rounded-lg">
                                        <h4 class="mb-3 font-bold text-gray-800">Rincian Penerima per RT/Soa:</h4>
                                        <div class="gap-3 grid grid-cols-2 md:grid-cols-4">
                                            @foreach($item->additional_data['breakdown'] as $area => $count)
                                                <div class="flex justify-between items-center bg-white p-3 rounded-lg">
                                                    <span class="font-medium text-gray-700 text-sm">{{ $area }}</span>
                                                    <span class="bg-purple-100 px-2 py-1 rounded-full font-bold text-purple-700 text-xs">{{ $count }} KPM</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Download Button -->
                                @if($item->pdf_file)
                                    <div class="pt-4 border-gray-200 border-t">
                                        <a href="{{ asset('storage/' . $item->pdf_file) }}" 
                                           target="_blank"
                                           class="inline-flex items-center bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg font-medium text-white transition">
                                            <i class="mr-2 fas fa-file-pdf"></i>
                                            Download SK Penerima BLT
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
                            <i class="text-gray-400 text-4xl fas fa-hand-holding-usd"></i>
                        </div>
                        <h3 class="mb-3 font-bold text-gray-800 text-2xl">Data BLT & Bansos Belum Tersedia</h3>
                        <p class="mb-6 text-gray-600">
                            Data penyaluran bantuan untuk tahun {{ $year }} sedang dalam proses verifikasi.
                        </p>
                        <a href="{{ route('home') }}" class="inline-flex items-center font-semibold text-purple-600 hover:text-purple-700">
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
<section class="bg-purple-50 py-12">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-4xl text-center">
            <div class="inline-flex justify-center items-center bg-purple-600 mb-4 rounded-full w-16 h-16 text-white">
                <i class="text-2xl fas fa-info-circle"></i>
            </div>
            <h3 class="mb-3 font-bold text-gray-800 text-2xl">Tentang Penyaluran BLT & Bansos</h3>
            <p class="text-gray-600 leading-relaxed">
                Bantuan Langsung Tunai (BLT) dan Bantuan Sosial (Bansos) merupakan program pemerintah untuk membantu keluarga kurang mampu di Negeri Haria. Data ini menampilkan transparansi penyaluran bantuan kepada Keluarga Penerima Manfaat (KPM) yang telah terverifikasi.
            </p>
        </div>
    </div>
</section>
@endsection
