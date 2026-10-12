<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Pengaturan Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-4xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-100 mb-6 p-4 border-l-4 border-green-500 rounded" role="alert">
                            <p class="font-bold text-green-700">Berhasil!</p>
                            <p class="text-green-700">{{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- Settings Form -->
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Section: Kontak Admin -->
                        <div class="mb-8">
                            <h3 class="mb-4 pb-2 border-b font-bold text-gray-900 text-lg">Kontak Admin</h3>
                            
                            <!-- Admin WhatsApp Number -->
                            <div class="mb-6">
                                <label for="admin_wa_number" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Nomor WhatsApp Admin Desa
                                    <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="admin_wa_number" 
                                    id="admin_wa_number" 
                                    value="{{ old('admin_wa_number', $settings['admin_wa_number']) }}"
                                    class="border-gray-300 shadow-sm focus:border-blue-500 mt-1 px-4 py-2 border rounded-lg focus:ring-blue-500 w-full"
                                    placeholder="08123456789"
                                    required
                                >
                                @error('admin_wa_number')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-gray-500 text-xs">Format: 08xxxxxxxxxx atau 628xxxxxxxxxx</p>
                            </div>
                        </div>

                        <!-- Section: Pengajuan Surat -->
                        <div class="mb-8">
                            <h3 class="mb-4 pb-2 border-b font-bold text-gray-900 text-lg">Pengajuan Surat</h3>
                            
                            <!-- Hero Text -->
                            <div class="mb-6">
                                <label for="pengajuan_hero_text" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Teks Sambutan / Hero
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="pengajuan_hero_text" 
                                    id="pengajuan_hero_text" 
                                    rows="3"
                                    class="border-gray-300 shadow-sm focus:border-blue-500 mt-1 px-4 py-2 border rounded-lg focus:ring-blue-500 w-full"
                                    placeholder="Teks yang akan ditampilkan di bagian atas halaman pengajuan surat"
                                    required
                                >{{ old('pengajuan_hero_text', $settings['pengajuan_hero_text']) }}</textarea>
                                @error('pengajuan_hero_text')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Instruction Text -->
                            <div class="mb-6">
                                <label for="pengajuan_instruction_text" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Teks Petunjuk
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="pengajuan_instruction_text" 
                                    id="pengajuan_instruction_text" 
                                    rows="3"
                                    class="border-gray-300 shadow-sm focus:border-blue-500 mt-1 px-4 py-2 border rounded-lg focus:ring-blue-500 w-full"
                                    placeholder="Petunjuk pengisian formulir dan proses selanjutnya"
                                    required
                                >{{ old('pengajuan_instruction_text', $settings['pengajuan_instruction_text']) }}</textarea>
                                @error('pengajuan_instruction_text')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Section: Pengaduan Masyarakat -->
                        <div class="mb-8">
                            <h3 class="mb-4 pb-2 border-b font-bold text-gray-900 text-lg">Pengaduan Masyarakat</h3>
                            
                            <!-- Hero Text -->
                            <div class="mb-6">
                                <label for="pengaduan_hero_text" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Teks Sambutan / Hero
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="pengaduan_hero_text" 
                                    id="pengaduan_hero_text" 
                                    rows="3"
                                    class="border-gray-300 shadow-sm focus:border-blue-500 mt-1 px-4 py-2 border rounded-lg focus:ring-blue-500 w-full"
                                    placeholder="Teks yang akan ditampilkan di bagian atas halaman pengaduan"
                                    required
                                >{{ old('pengaduan_hero_text', $settings['pengaduan_hero_text']) }}</textarea>
                                @error('pengaduan_hero_text')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Instruction Text -->
                            <div class="mb-6">
                                <label for="pengaduan_instruction_text" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Teks Petunjuk
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="pengaduan_instruction_text" 
                                    id="pengaduan_instruction_text" 
                                    rows="3"
                                    class="border-gray-300 shadow-sm focus:border-blue-500 mt-1 px-4 py-2 border rounded-lg focus:ring-blue-500 w-full"
                                    placeholder="Petunjuk mengisi pengaduan dan upload foto"
                                    required
                                >{{ old('pengaduan_instruction_text', $settings['pengaduan_instruction_text']) }}</textarea>
                                @error('pengaduan_instruction_text')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end gap-4 pt-4 border-t">
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="inline-flex justify-center items-center bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-lg font-semibold text-gray-700 text-sm transition"
                            >
                                Batal
                            </a>
                            <button 
                                type="submit" 
                                class="inline-flex justify-center items-center bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-semibold text-sm text-white transition"
                            >
                                <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-blue-50 mt-6 p-4 border-l-4 border-blue-500 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-blue-800 text-sm">Informasi</p>
                        <p class="mt-1 text-blue-700 text-sm">
                            Pengaturan ini akan ditampilkan secara dinamis di halaman publik. Pastikan teks yang Anda masukkan jelas dan informatif untuk masyarakat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
