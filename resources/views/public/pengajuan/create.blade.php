@extends('layouts.public')

@section('title', 'Pengajuan Surat - Negeri Haria')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16 text-white">
        <div class="mx-auto px-4 container">
            <div class="mx-auto max-w-4xl text-center">
                <h1 class="mb-4 font-bold text-4xl md:text-5xl">Pengajuan Surat</h1>
                <p class="text-blue-100 text-xl">{{ $heroText }}</p>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-12">
        <div class="mx-auto px-4 container">
            <div class="mx-auto max-w-3xl">
                <!-- Info Card -->
                <div class="bg-blue-50 mb-8 p-4 border-blue-500 border-l-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-blue-800 text-sm">Petunjuk</p>
                            <p class="mt-1 text-blue-700 text-sm">{{ $instructionText }}</p>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-8">
                        <form method="POST" action="{{ route('pengajuan-surat.store') }}">
                            @csrf

                            <!-- NIK -->
                            <div class="mb-6">
                                <label for="nik" class="block mb-2 font-medium text-gray-700 text-sm">
                                    NIK (Nomor Induk Kependudukan) <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="nik" 
                                    id="nik" 
                                    value="{{ old('nik') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nik') border-red-500 @enderror"
                                    placeholder="Contoh: 8171234567890123"
                                    maxlength="16"
                                    required
                                >
                                @error('nik')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-gray-500 text-xs">16 digit sesuai KTP</p>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="mb-6">
                                <label for="nama" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="nama" 
                                    id="nama" 
                                    value="{{ old('nama') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama') border-red-500 @enderror"
                                    placeholder="Nama sesuai KTP"
                                    required
                                >
                                @error('nama')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor WhatsApp -->
                            <div class="mb-6">
                                <label for="nomor_wa" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Nomor WhatsApp <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="nomor_wa" 
                                    id="nomor_wa" 
                                    value="{{ old('nomor_wa') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nomor_wa') border-red-500 @enderror"
                                    placeholder="Contoh: 081234567890"
                                    required
                                >
                                @error('nomor_wa')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jenis Surat -->
                            <div class="mb-6">
                                <label for="jenis_surat" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Jenis Surat <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    name="jenis_surat" 
                                    id="jenis_surat"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jenis_surat') border-red-500 @enderror"
                                    required
                                >
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    @foreach($jenisSuratList as $jenis)
                                        <option value="{{ $jenis->nama_surat }}" {{ old('jenis_surat') == $jenis->nama_surat ? 'selected' : '' }}>
                                            {{ $jenis->nama_surat }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_surat')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Keperluan -->
                            <div class="mb-6">
                                <label for="keperluan" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Keperluan / Keterangan <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="keperluan" 
                                    id="keperluan" 
                                    rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('keperluan') border-red-500 @enderror"
                                    placeholder="Jelaskan keperluan Anda mengajukan surat ini..."
                                    required
                                >{{ old('keperluan') }}</textarea>
                                @error('keperluan')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex gap-4">
                                <a 
                                    href="{{ route('home') }}" 
                                    class="flex-1 bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold text-gray-700 text-center transition"
                                >
                                    Batal
                                </a>
                                <button 
                                    type="submit" 
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold text-white transition"
                                >
                                    Ajukan Surat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Link Cek Status -->
                <div class="mt-6 text-center">
                    <a href="{{ route('pengajuan-surat.check-status') }}" class="font-medium text-blue-600 hover:text-blue-800">
                        🔍 Cek Status Pengajuan Surat
                    </a>
                </div>
            </div>
        </div>
    </section>@endsection

