<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jenis Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.jenis-surat.store') }}">
                        @csrf

                        <!-- Nama Surat -->
                        <div class="mb-6">
                            <label for="nama_surat" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Surat <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="nama_surat" 
                                id="nama_surat" 
                                value="{{ old('nama_surat') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_surat') border-red-500 @enderror"
                                placeholder="Contoh: Surat Keterangan Domisili"
                                required
                            >
                            @error('nama_surat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Persyaratan -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Persyaratan <span class="text-red-500">*</span>
                            </label>
                            <p class="text-sm text-gray-500 mb-3">Tambahkan persyaratan yang diperlukan untuk surat ini</p>
                            
                            <div id="persyaratan-container" class="space-y-3">
                                <!-- Item persyaratan awal -->
                                <div class="persyaratan-item flex gap-2">
                                    <input 
                                        type="text" 
                                        name="persyaratan[]" 
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                        placeholder="Contoh: Fotokopi KTP"
                                        required
                                    >
                                    <button 
                                        type="button" 
                                        onclick="removePersyaratan(this)"
                                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition"
                                    >
                                        Hapus
                                    </button>
                                </div>
                            </div>

                            <button 
                                type="button" 
                                onclick="addPersyaratan()"
                                class="mt-3 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition"
                            >
                                + Tambah Persyaratan
                            </button>

                            @error('persyaratan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Urutan -->
                        <div class="mb-6">
                            <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                                Urutan Tampilan
                            </label>
                            <input 
                                type="number" 
                                name="urutan" 
                                id="urutan" 
                                value="{{ old('urutan', 0) }}"
                                min="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="0"
                            >
                            <p class="mt-1 text-xs text-gray-500">Semakin kecil angka, semakin atas urutannya</p>
                        </div>

                        <!-- Status Aktif -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    name="is_active" 
                                    value="1"
                                    {{ old('is_active', true) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                >
                                <span class="ml-2 text-sm text-gray-700">Aktif (tampilkan di form pengajuan)</span>
                            </label>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-4 pt-4 border-t">
                            <a 
                                href="{{ route('admin.jenis-surat.index') }}" 
                                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-lg text-center transition"
                            >
                                Batal
                            </a>
                            <button 
                                type="submit" 
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition"
                            >
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addPersyaratan() {
            const container = document.getElementById('persyaratan-container');
            const newItem = document.createElement('div');
            newItem.className = 'persyaratan-item flex gap-2';
            newItem.innerHTML = `
                <input 
                    type="text" 
                    name="persyaratan[]" 
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Fotokopi Kartu Keluarga"
                    required
                >
                <button 
                    type="button" 
                    onclick="removePersyaratan(this)"
                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition"
                >
                    Hapus
                </button>
            `;
            container.appendChild(newItem);
        }

        function removePersyaratan(button) {
            const container = document.getElementById('persyaratan-container');
            const items = container.getElementsByClassName('persyaratan-item');
            
            if (items.length > 1) {
                button.parentElement.remove();
            } else {
                alert('Minimal harus ada 1 persyaratan!');
            }
        }
    </script>
</x-app-layout>
