<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Statistik Negeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            @if (session('success'))
                <div class="bg-green-100 mb-4 px-4 py-3 border border-green-400 rounded text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-semibold text-gray-900 text-lg">Data Statistik Negeri</h3>
                        <a href="{{ route('admin.statistics.edit', $statistic) }}" class="bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                            Edit Data Statistik
                        </a>
                    </div>

                    <!-- Data Statistik Cards -->
                    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 mb-8">
                        <div class="bg-blue-50 p-6 border-blue-500 border-l-4 rounded">
                            <div class="flex items-center">
                                <i class="mr-4 text-blue-600 text-3xl fas fa-home"></i>
                                <div>
                                    <p class="text-gray-600 text-sm">Total KK</p>
                                    <p class="font-bold text-gray-900 text-3xl">{{ number_format($statistic->total_kk) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-50 p-6 border-green-500 border-l-4 rounded">
                            <div class="flex items-center">
                                <i class="mr-4 text-green-600 text-3xl fas fa-users"></i>
                                <div>
                                    <p class="text-gray-600 text-sm">Total Penduduk</p>
                                    <p class="font-bold text-gray-900 text-3xl">{{ number_format($statistic->total_penduduk) }} Jiwa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-8">
                        <h4 class="mb-4 font-semibold text-gray-900 text-lg">Data Jenis Kelamin</h4>
                        <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">Laki-laki</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->jumlah_laki_laki) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="text-gray-600">Perempuan</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->jumlah_perempuan) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pendidikan -->
                    <div class="mb-8">
                        <h4 class="mb-4 font-semibold text-gray-900 text-lg">Data Pendidikan</h4>
                        <div class="gap-4 grid grid-cols-2 md:grid-cols-3">
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="font-semibold text-gray-600">PAUD</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pendidikan_paud) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="font-semibold text-gray-600">TK</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pendidikan_tk) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="font-semibold text-gray-600">SD</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pendidikan_sd) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="font-semibold text-gray-600">SMP</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pendidikan_smp) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="font-semibold text-gray-600">SMA</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pendidikan_sma) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded text-center">
                                <p class="font-semibold text-gray-600">S1</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pendidikan_s1) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pekerjaan -->
                    <div>
                        <h4 class="mb-4 font-semibold text-gray-900 text-lg">Data Pekerjaan/Mata Pencaharian</h4>
                        <div class="gap-4 grid grid-cols-2 md:grid-cols-4">
                            <div class="bg-green-50 p-4 border-green-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">Petani</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_petani ?? 0) }}</p>
                            </div>
                            <div class="bg-blue-50 p-4 border-blue-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">Nelayan</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_nelayan ?? 0) }}</p>
                            </div>
                            <div class="bg-yellow-50 p-4 border-yellow-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">Pedagang</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_pedagang ?? 0) }}</p>
                            </div>
                            <div class="bg-purple-50 p-4 border-purple-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">PNS/ASN</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_pns ?? 0) }}</p>
                            </div>
                            <div class="bg-pink-50 p-4 border-pink-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">Guru/Dosen</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_guru ?? 0) }}</p>
                            </div>
                            <div class="bg-red-50 p-4 border-red-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">Wiraswasta</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_wiraswasta ?? 0) }}</p>
                            </div>
                            <div class="bg-indigo-50 p-4 border-indigo-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">Buruh</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_buruh ?? 0) }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 border-gray-500 border-l-4 rounded text-center">
                                <p class="font-semibold text-gray-600">Lainnya</p>
                                <p class="font-bold text-gray-900 text-2xl">{{ number_format($statistic->pekerjaan_lainnya ?? 0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
