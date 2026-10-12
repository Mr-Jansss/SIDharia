<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Status Pengajuan Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <!-- Data Pemohon (Read Only) -->
                    <div class="mb-8 bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-4">Data Pemohon</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-600">NIK:</span>
                                <span class="ml-2 text-gray-900">{{ $pengajuan->nik }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Nama:</span>
                                <span class="ml-2 text-gray-900">{{ $pengajuan->nama }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">WhatsApp:</span>
                                <span class="ml-2 text-gray-900">{{ $pengajuan->nomor_wa }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Jenis Surat:</span>
                                <span class="ml-2 text-gray-900">{{ $pengajuan->jenis_surat }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Edit -->
                    <form method="POST" action="{{ route('admin.pengajuan-surat.update', $pengajuan->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Status -->
                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Status Pengajuan <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="status" 
                                id="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status') border-red-500 @enderror"
                                required
                            >
                                <option value="pending" {{ old('status', $pengajuan->status) == 'pending' ? 'selected' : '' }}>
                                    Menunggu Proses
                                </option>
                                <option value="diproses" {{ old('status', $pengajuan->status) == 'diproses' ? 'selected' : '' }}>
                                    Sedang Diproses
                                </option>
                                <option value="selesai" {{ old('status', $pengajuan->status) == 'selesai' ? 'selected' : '' }}>
                                    Selesai (Siap Diambil)
                                </option>
                                <option value="ditolak" {{ old('status', $pengajuan->status) == 'ditolak' ? 'selected' : '' }}>
                                    Ditolak
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan Admin -->
                        <div class="mb-6">
                            <label for="catatan_admin" class="block text-sm font-medium text-gray-700 mb-2">
                                Catatan Admin (Opsional)
                            </label>
                            <textarea 
                                name="catatan_admin" 
                                id="catatan_admin" 
                                rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('catatan_admin') border-red-500 @enderror"
                                placeholder="Contoh: Surat sudah selesai, silakan diambil di kantor desa pada hari Senin-Jumat jam 08:00-14:00"
                            >{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
                            @error('catatan_admin')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                Catatan ini akan ditampilkan kepada pemohon saat cek status. Berikan informasi yang jelas seperti jadwal pengambilan atau alasan penolakan.
                            </p>
                        </div>

                        <!-- Info Box -->
                        <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        <strong>Tips:</strong> Ubah status menjadi "Selesai" jika surat sudah dapat diambil. Jika menolak, berikan alasan yang jelas di catatan admin.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-4">
                            <a 
                                href="{{ route('admin.pengajuan-surat.index') }}" 
                                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-lg text-center transition"
                            >
                                Batal
                            </a>
                            <button 
                                type="submit" 
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition"
                            >
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
