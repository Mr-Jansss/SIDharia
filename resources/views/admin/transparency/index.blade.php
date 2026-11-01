<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">Kelola Transparansi Keuangan</h2>
            <a href="{{ route('admin.transparency.create') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                <i class="mr-2 fas fa-plus"></i>Tambah Data Transparansi
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            @if (session('success'))
                <div class="relative bg-green-100 mb-4 px-4 py-3 border border-green-400 rounded text-green-700" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Filter Tabs -->
            <div class="bg-white shadow-sm mb-6 rounded-lg overflow-hidden">
                <div class="flex flex-wrap border-gray-200 border-b">
                    <a href="{{ route('admin.transparency.index') }}" 
                       class="px-6 py-3 font-medium text-sm transition {{ !request('category') ? 'border-blue-500 border-b-2 text-blue-600' : 'text-gray-600 hover:text-gray-800' }}">
                        <i class="mr-2 fas fa-list"></i>Semua ({{ $transparencies->count() }})
                    </a>
                    <a href="{{ route('admin.transparency.index', ['category' => 'apb_negeri']) }}" 
                       class="px-6 py-3 font-medium text-sm transition {{ request('category') == 'apb_negeri' ? 'border-green-500 border-b-2 text-green-600' : 'text-gray-600 hover:text-gray-800' }}">
                        <i class="mr-2 fas fa-file-invoice-dollar"></i>APB Negeri ({{ $transparencies->where('category', 'apb_negeri')->count() }})
                    </a>
                    <a href="{{ route('admin.transparency.index', ['category' => 'realisasi_anggaran']) }}" 
                       class="px-6 py-3 font-medium text-sm transition {{ request('category') == 'realisasi_anggaran' ? 'border-blue-500 border-b-2 text-blue-600' : 'text-gray-600 hover:text-gray-800' }}">
                        <i class="mr-2 fas fa-chart-line"></i>Realisasi ({{ $transparencies->where('category', 'realisasi_anggaran')->count() }})
                    </a>
                    <a href="{{ route('admin.transparency.index', ['category' => 'blt_bansos']) }}" 
                       class="px-6 py-3 font-medium text-sm transition {{ request('category') == 'blt_bansos' ? 'border-purple-500 border-b-2 text-purple-600' : 'text-gray-600 hover:text-gray-800' }}">
                        <i class="mr-2 fas fa-hand-holding-usd"></i>BLT & Bansos ({{ $transparencies->where('category', 'blt_bansos')->count() }})
                    </a>
                    <a href="{{ route('admin.transparency.index', ['category' => 'lppd']) }}" 
                       class="px-6 py-3 font-medium text-sm transition {{ request('category') == 'lppd' ? 'border-indigo-500 border-b-2 text-indigo-600' : 'text-gray-600 hover:text-gray-800' }}">
                        <i class="mr-2 fas fa-file-alt"></i>LPPD ({{ $transparencies->where('category', 'lppd')->count() }})
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    @php
                        $filteredData = request('category') 
                            ? $transparencies->where('category', request('category')) 
                            : $transparencies;
                    @endphp

                    @if($filteredData->count() > 0)
                        <div class="space-y-4">
                            @foreach($filteredData as $item)
                                <div class="hover:shadow-lg border border-gray-200 rounded-lg transition overflow-hidden">
                                    <div class="flex md:flex-row flex-col">
                                        <!-- Left: Info -->
                                        <div class="flex-1 p-6">
                                            <div class="flex justify-between items-start mb-2">
                                                <div class="flex-1">
                                                    <div class="flex items-center gap-2 mb-2">
                                                        <h3 class="font-bold text-gray-900 text-lg">{{ $item->title }}</h3>
                                                        @if($item->is_published)
                                                            <span class="bg-green-100 px-2 py-1 rounded-full font-semibold text-green-700 text-xs">
                                                                <i class="fas fa-check-circle"></i> Published
                                                            </span>
                                                        @else
                                                            <span class="bg-gray-100 px-2 py-1 rounded-full font-semibold text-gray-700 text-xs">
                                                                <i class="fas fa-eye-slash"></i> Draft
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <!-- Category Badge -->
                                                    <div class="mb-3">
                                                        @if($item->category == 'apb_negeri')
                                                            <span class="inline-flex items-center bg-green-100 px-3 py-1 rounded-full font-semibold text-green-700 text-xs">
                                                                <i class="mr-1 fas fa-file-invoice-dollar"></i> APB Negeri
                                                            </span>
                                                        @elseif($item->category == 'realisasi_anggaran')
                                                            <span class="inline-flex items-center bg-blue-100 px-3 py-1 rounded-full font-semibold text-blue-700 text-xs">
                                                                <i class="mr-1 fas fa-chart-line"></i> Realisasi Anggaran
                                                            </span>
                                                        @elseif($item->category == 'blt_bansos')
                                                            <span class="inline-flex items-center bg-purple-100 px-3 py-1 rounded-full font-semibold text-purple-700 text-xs">
                                                                <i class="mr-1 fas fa-hand-holding-usd"></i> BLT & Bansos
                                                            </span>
                                                        @else
                                                            <span class="inline-flex items-center bg-indigo-100 px-3 py-1 rounded-full font-semibold text-indigo-700 text-xs">
                                                                <i class="mr-1 fas fa-file-alt"></i> LPPD / LKPPD
                                                            </span>
                                                        @endif
                                                        <span class="inline-flex items-center bg-gray-100 ml-2 px-3 py-1 rounded-full font-semibold text-gray-700 text-xs">
                                                            <i class="mr-1 fas fa-calendar"></i> Tahun {{ $item->fiscal_year }}
                                                        </span>
                                                    </div>

                                                    @if($item->description)
                                                        <p class="mb-3 text-gray-600 text-sm">{{ Str::limit($item->description, 150) }}</p>
                                                    @endif

                                                    <!-- Stats -->
                                                    <div class="flex flex-wrap gap-4 text-sm">
                                                        @if($item->budget_amount)
                                                            <div class="flex items-center text-gray-600">
                                                                <i class="mr-1 fas fa-wallet text-green-500"></i>
                                                                <span class="font-semibold">Anggaran:</span>
                                                                <span class="ml-1">{{ $item->formatted_budget }}</span>
                                                            </div>
                                                        @endif
                                                        @if($item->realization_amount)
                                                            <div class="flex items-center text-gray-600">
                                                                <i class="mr-1 fas fa-check-circle text-blue-500"></i>
                                                                <span class="font-semibold">Realisasi:</span>
                                                                <span class="ml-1">{{ $item->formatted_realization }}</span>
                                                            </div>
                                                        @endif
                                                        @if($item->percentage)
                                                            <div class="flex items-center text-gray-600">
                                                                <i class="mr-1 fas fa-percentage text-purple-500"></i>
                                                                <span class="font-semibold">{{ number_format($item->percentage, 1) }}%</span>
                                                            </div>
                                                        @endif
                                                        @if($item->beneficiary_count)
                                                            <div class="flex items-center text-gray-600">
                                                                <i class="mr-1 fas fa-users text-orange-500"></i>
                                                                <span class="font-semibold">{{ number_format($item->beneficiary_count) }} KPM</span>
                                                            </div>
                                                        @endif
                                                        @if($item->semester)
                                                            <div class="flex items-center text-gray-600">
                                                                <i class="mr-1 fas fa-calendar-alt text-indigo-500"></i>
                                                                <span class="font-semibold">
                                                                    {{ $item->semester == '1' ? 'Semester 1' : ($item->semester == '2' ? 'Semester 2' : 'Tahunan') }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Files -->
                                                    <div class="flex gap-2 mt-3">
                                                        @if($item->pdf_file)
                                                            <span class="inline-flex items-center bg-red-50 px-2 py-1 rounded font-medium text-red-600 text-xs">
                                                                <i class="mr-1 fas fa-file-pdf"></i> PDF
                                                            </span>
                                                        @endif
                                                        @if($item->infographic_image)
                                                            <span class="inline-flex items-center bg-blue-50 px-2 py-1 rounded font-medium text-blue-600 text-xs">
                                                                <i class="mr-1 fas fa-image"></i> Infografis
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right: Actions -->
                                        <div class="flex md:flex-col flex-row md:justify-center gap-2 md:border-gray-200 md:border-l p-4">
                                            <a href="{{ route('admin.transparency.edit', $item) }}" 
                                               class="flex md:flex-col justify-center items-center bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded font-semibold text-white text-sm transition">
                                                <i class="md:mb-1 md:mr-0 mr-1 fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('admin.transparency.destroy', $item) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Yakin ingin menghapus data {{ $item->title }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="flex md:flex-col justify-center items-center bg-red-500 hover:bg-red-600 px-4 py-2 rounded w-full h-full font-semibold text-white text-sm transition">
                                                    <i class="md:mb-1 md:mr-0 mr-1 fas fa-trash"></i>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <svg class="mx-auto w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="mt-4 text-gray-500 text-lg">Belum ada data transparansi keuangan.</p>
                            <a href="{{ route('admin.transparency.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 mt-4 px-6 py-2 rounded font-bold text-white">
                                Tambah Data Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
