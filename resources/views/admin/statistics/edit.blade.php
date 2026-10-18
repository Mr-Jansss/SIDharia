<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Edit Statistik Negeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-4xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.statistics.update', $villageStatistic) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Data Statistik Umum -->
                        <div class="mb-6">
                            <h3 class="mb-4 font-semibold text-gray-900 text-lg">Data Statistik Umum</h3>
                            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                                <div>
                                    <label for="total_kk" class="block font-medium text-gray-700 text-sm">Total KK<span class="text-red-500">*</span></label>
                                    <input type="number" name="total_kk" id="total_kk" value="{{ old('total_kk', $villageStatistic->total_kk) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('total_kk')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="total_penduduk" class="block font-medium text-gray-700 text-sm">Total Penduduk<span class="text-red-500">*</span></label>
                                    <input type="number" name="total_penduduk" id="total_penduduk" value="{{ old('total_penduduk', $villageStatistic->total_penduduk) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('total_penduduk')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Jenis Kelamin -->
                        <div class="mb-6">
                            <h3 class="mb-4 font-semibold text-gray-900 text-lg">Data Jenis Kelamin</h3>
                            <div class="gap-4 grid grid-cols-1 md:grid-cols-2">
                                <div>
                                    <label for="jumlah_laki_laki" class="block font-medium text-gray-700 text-sm">Jumlah Laki-laki<span class="text-red-500">*</span></label>
                                    <input type="number" name="jumlah_laki_laki" id="jumlah_laki_laki" value="{{ old('jumlah_laki_laki', $villageStatistic->jumlah_laki_laki) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('jumlah_laki_laki')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_perempuan" class="block font-medium text-gray-700 text-sm">Jumlah Perempuan<span class="text-red-500">*</span></label>
                                    <input type="number" name="jumlah_perempuan" id="jumlah_perempuan" value="{{ old('jumlah_perempuan', $villageStatistic->jumlah_perempuan) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('jumlah_perempuan')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Pendidikan -->
                        <div class="mb-6">
                            <h3 class="mb-4 font-semibold text-gray-900 text-lg">Data Pendidikan</h3>
                            <div class="gap-4 grid grid-cols-2 md:grid-cols-3">
                                <div>
                                    <label for="pendidikan_paud" class="block font-medium text-gray-700 text-sm">PAUD<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_paud" id="pendidikan_paud" value="{{ old('pendidikan_paud', $villageStatistic->pendidikan_paud) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pendidikan_paud')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_tk" class="block font-medium text-gray-700 text-sm">TK<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_tk" id="pendidikan_tk" value="{{ old('pendidikan_tk', $villageStatistic->pendidikan_tk) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pendidikan_tk')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_sd" class="block font-medium text-gray-700 text-sm">SD<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_sd" id="pendidikan_sd" value="{{ old('pendidikan_sd', $villageStatistic->pendidikan_sd) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pendidikan_sd')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_smp" class="block font-medium text-gray-700 text-sm">SMP<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_smp" id="pendidikan_smp" value="{{ old('pendidikan_smp', $villageStatistic->pendidikan_smp) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pendidikan_smp')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_sma" class="block font-medium text-gray-700 text-sm">SMA<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_sma" id="pendidikan_sma" value="{{ old('pendidikan_sma', $villageStatistic->pendidikan_sma) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pendidikan_sma')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_s1" class="block font-medium text-gray-700 text-sm">S1<span class="text-red-500">*</span></label>
                                    <input type="number" name="pendidikan_s1" id="pendidikan_s1" value="{{ old('pendidikan_s1', $villageStatistic->pendidikan_s1) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pendidikan_s1')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Pekerjaan -->
                        <div class="mb-6">
                            <h3 class="mb-4 font-semibold text-gray-900 text-lg">Data Pekerjaan/Mata Pencaharian</h3>
                            <div class="gap-4 grid grid-cols-2 md:grid-cols-4">
                                <div>
                                    <label for="pekerjaan_petani" class="block font-medium text-gray-700 text-sm">Petani<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_petani" id="pekerjaan_petani" value="{{ old('pekerjaan_petani', $villageStatistic->pekerjaan_petani ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_petani')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_nelayan" class="block font-medium text-gray-700 text-sm">Nelayan<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_nelayan" id="pekerjaan_nelayan" value="{{ old('pekerjaan_nelayan', $villageStatistic->pekerjaan_nelayan ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_nelayan')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_pedagang" class="block font-medium text-gray-700 text-sm">Pedagang<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_pedagang" id="pekerjaan_pedagang" value="{{ old('pekerjaan_pedagang', $villageStatistic->pekerjaan_pedagang ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_pedagang')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_pns" class="block font-medium text-gray-700 text-sm">PNS/ASN<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_pns" id="pekerjaan_pns" value="{{ old('pekerjaan_pns', $villageStatistic->pekerjaan_pns ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_pns')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_guru" class="block font-medium text-gray-700 text-sm">Guru/Dosen<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_guru" id="pekerjaan_guru" value="{{ old('pekerjaan_guru', $villageStatistic->pekerjaan_guru ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_guru')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_wiraswasta" class="block font-medium text-gray-700 text-sm">Wiraswasta<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_wiraswasta" id="pekerjaan_wiraswasta" value="{{ old('pekerjaan_wiraswasta', $villageStatistic->pekerjaan_wiraswasta ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_wiraswasta')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_buruh" class="block font-medium text-gray-700 text-sm">Buruh<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_buruh" id="pekerjaan_buruh" value="{{ old('pekerjaan_buruh', $villageStatistic->pekerjaan_buruh ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_buruh')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_lainnya" class="block font-medium text-gray-700 text-sm">Lainnya<span class="text-red-500">*</span></label>
                                    <input type="number" name="pekerjaan_lainnya" id="pekerjaan_lainnya" value="{{ old('pekerjaan_lainnya', $villageStatistic->pekerjaan_lainnya ?? 0) }}" required min="0"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('pekerjaan_lainnya')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.statistics.index') }}" class="bg-gray-500 hover:bg-gray-700 px-4 py-2 rounded font-bold text-white">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
