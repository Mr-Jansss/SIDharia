<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Statistik Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.statistics.update', $villageStatistic) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Data Statistik Umum -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Data Statistik Umum</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="total_kk" class="block text-sm font-medium text-gray-700">Total KK<span class="text-red-500">*</span></label>
                                    <input type="number" name="total_kk" id="total_kk" value="{{ old('total_kk', $villageStatistic->total_kk) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('total_kk')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="total_penduduk" class="block text-sm font-medium text-gray-700">Total Penduduk<span class="text-red-500">*</span></label>
                                    <input type="number" name="total_penduduk" id="total_penduduk" value="{{ old('total_penduduk', $villageStatistic->total_penduduk) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('total_penduduk')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Jenis Kelamin -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Data Jenis Kelamin</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="jumlah_laki_laki" class="block text-sm font-medium text-gray-700">Jumlah Laki-laki<span class="text-red-500">*</span></label>
                                    <input type="number" name="jumlah_laki_laki" id="jumlah_laki_laki" value="{{ old('jumlah_laki_laki', $villageStatistic->jumlah_laki_laki) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('jumlah_laki_laki')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_perempuan" class="block text-sm font-medium text-gray-700">Jumlah Perempuan<span class="text-red-500">*</span></label>
                                    <input type="number" name="jumlah_perempuan" id="jumlah_perempuan" value="{{ old('jumlah_perempuan', $villageStatistic->jumlah_perempuan) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('jumlah_perempuan')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Pendidikan -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Data Pendidikan</h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="pendidikan_paud" class="block text-sm font-medium text-gray-700">PAUD<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_paud" id="pendidikan_paud" value="{{ old('pendidikan_paud', $villageStatistic->pendidikan_paud) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('pendidikan_paud')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_tk" class="block text-sm font-medium text-gray-700">TK<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_tk" id="pendidikan_tk" value="{{ old('pendidikan_tk', $villageStatistic->pendidikan_tk) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('pendidikan_tk')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_sd" class="block text-sm font-medium text-gray-700">SD<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_sd" id="pendidikan_sd" value="{{ old('pendidikan_sd', $villageStatistic->pendidikan_sd) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('pendidikan_sd')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_smp" class="block text-sm font-medium text-gray-700">SMP<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_smp" id="pendidikan_smp" value="{{ old('pendidikan_smp', $villageStatistic->pendidikan_smp) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('pendidikan_smp')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_sma" class="block text-sm font-medium text-gray-700">SMA<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_sma" id="pendidikan_sma" value="{{ old('pendidikan_sma', $villageStatistic->pendidikan_sma) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('pendidikan_sma')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_s1" class="block text-sm font-medium text-gray-700">S1<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_s1" id="pendidikan_s1" value="{{ old('pendidikan_s1', $villageStatistic->pendidikan_s1) }}" required min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('pendidikan_s1')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.statistics.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
