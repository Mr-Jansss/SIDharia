@extends('layouts.public')

@section('title', 'Cek Status Pengajuan - Negeri Haria')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16 text-white">
        <div class="mx-auto px-4 container">
            <div class="mx-auto max-w-4xl text-center">
                <h1 class="mb-4 font-bold text-4xl md:text-5xl">Cek Status Pengajuan</h1>
                <p class="text-blue-100 text-xl">Masukkan NIK Anda untuk melihat status pengajuan surat</p>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-12">
        <div class="mx-auto px-4 container">
            <div class="mx-auto max-w-2xl">
                <!-- Error Message -->
                @if(session('error'))
                    <div class="bg-red-100 mb-6 p-4 border-red-500 border-l-4 rounded" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-red-700 text-sm">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Form Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-8">
                        <form method="POST" action="{{ route('pengajuan-surat.get-status') }}">
                            @csrf

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
                                    placeholder="Masukkan 16 digit NIK Anda"
                                    maxlength="16"
                                    required
                                    autofocus
                                >
                                @error('nik')
                                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex gap-4">
                                <a 
                                    href="{{ route('pengajuan-surat.create') }}" 
                                    class="flex-1 bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold text-gray-700 text-center transition"
                                >
                                    Buat Pengajuan Baru
                                </a>
                                <button 
                                    type="submit" 
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold text-white transition"
                                >
                                    Cek Status
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="bg-blue-50 mt-6 p-4 border-blue-500 border-l-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-blue-800 text-sm">Informasi</p>
                            <p class="mt-1 text-blue-700 text-sm">
                                Masukkan NIK yang sama dengan yang Anda gunakan saat mengajukan surat. Sistem akan menampilkan semua riwayat pengajuan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

