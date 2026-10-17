<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistik Negeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-900">Data Statistik Negeri</h3>
                        <a href="{{ route('admin.statistics.edit', $statistic) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Data Statistik
                        </a>
                    </div>

                    <!-- Data Statistik Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-home text-blue-600 text-3xl mr-4"></i>
                                <div>
                                    <p class="text-gray-600 text-sm">Total KK</p>
                                    <p class="text-3xl font-bold text-gray-900">{{ number_format($statistic->total_kk) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded">
                            <div class="flex items-center">
                                <i class="fas fa-users text-green-600 text-3xl mr-4"></i>
                                <div>
                                    <p class="text-gray-600 text-sm">Total Penduduk</p>
                                    <p class="text-3xl font-bold text-gray-900">{{ number_format($statistic->total_penduduk) }} Jiwa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Data Jenis Kelamin</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">Laki-laki</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->jumlah_laki_laki) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">Perempuan</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->jumlah_perempuan) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pendidikan -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Data Pendidikan</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="text-gray-600 font-semibold">PAUD</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->pendidikan_paud) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="text-gray-600 font-semibold">TK</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->pendidikan_tk) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="text-gray-600 font-semibold">SD</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->pendidikan_sd) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="text-gray-600 font-semibold">SMP</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->pendidikan_smp) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="text-gray-600 font-semibold">SMA</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->pendidikan_sma) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="text-gray-600 font-semibold">S1</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($statistic->pendidikan_s1) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
