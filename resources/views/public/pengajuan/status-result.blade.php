@extends('layouts.public')

@section('title', 'Status Pengajuan - Negeri Haria')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-12 text-white">
        <div class="mx-auto px-4 container">
            <div class="mx-auto max-w-4xl text-center">
                <h1 class="mb-2 font-bold text-3xl md:text-4xl">Status Pengajuan Surat</h1>
                <p class="text-blue-100">NIK: {{ $pengajuans->first()->nik }}</p>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="py-12">
        <div class="mx-auto px-4 container">
            <div class="mx-auto max-w-4xl">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-600">Ditemukan {{ $pengajuans->count() }} pengajuan</p>
                    <a 
                        href="{{ route('pengajuan-surat.check-status') }}" 
                        class="font-medium text-blue-600 hover:text-blue-800"
                    >
                        ← Cek NIK Lain
                    </a>
                </div>

                <!-- List Pengajuan -->
                <div class="space-y-4">
                    @foreach($pengajuans as $pengajuan)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <div class="p-6">
                                <!-- Header -->
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="font-bold text-gray-900 text-lg">{{ $pengajuan->jenis_surat }}</h3>
                                        <p class="text-gray-500 text-sm">{{ $pengajuan->created_at->format('d M Y, H:i') }} WIT</p>
                                    </div>
                                    @if($pengajuan->status == 'pending')
                                        <span class="bg-yellow-100 px-3 py-1 rounded-full font-medium text-yellow-800 text-sm">
                                            Menunggu
                                        </span>
                                    @elseif($pengajuan->status == 'diproses')
                                        <span class="bg-blue-100 px-3 py-1 rounded-full font-medium text-blue-800 text-sm">
                                            Diproses
                                        </span>
                                    @elseif($pengajuan->status == 'selesai')
                                        <span class="bg-green-100 px-3 py-1 rounded-full font-medium text-green-800 text-sm">
                                            Selesai
                                        </span>
                                    @elseif($pengajuan->status == 'ditolak')
                                        <span class="bg-red-100 px-3 py-1 rounded-full font-medium text-red-800 text-sm">
                                            Ditolak
                                        </span>
                                    @endif
                                </div>

                                <!-- Data -->
                                <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mb-4">
                                    <div>
                                        <p class="text-gray-600 text-sm">Nama</p>
                                        <p class="font-medium text-gray-900">{{ $pengajuan->nama }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600 text-sm">Nomor WhatsApp</p>
                                        <p class="font-medium text-gray-900">{{ $pengajuan->nomor_wa }}</p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="text-gray-600 text-sm">Keperluan</p>
                                    <p class="text-gray-900">{{ $pengajuan->keperluan }}</p>
                                </div>

                                <!-- Catatan Admin -->
                                @if($pengajuan->catatan_admin)
                                    <div class="bg-gray-50 p-4 border-gray-400 border-l-4 rounded">
                                        <p class="mb-1 font-medium text-gray-700 text-sm">Catatan Admin:</p>
                                        <p class="text-gray-900 text-sm">{{ $pengajuan->catatan_admin }}</p>
                                    </div>
                                @endif

                                <!-- Status Info -->
                                @if($pengajuan->status == 'pending')
                                    <div class="bg-yellow-50 mt-4 p-4 border-yellow-400 border-l-4 rounded">
                                        <p class="text-yellow-800 text-sm">
                                            Pengajuan Anda sedang menunggu verifikasi. Pastikan Anda telah mengirim berkas persyaratan via WhatsApp.
                                        </p>
                                    </div>
                                @elseif($pengajuan->status == 'diproses')
                                    <div class="bg-blue-50 mt-4 p-4 border-blue-400 border-l-4 rounded">
                                        <p class="text-blue-800 text-sm">
                                            Surat Anda sedang diproses oleh admin. Mohon ditunggu.
                                        </p>
                                    </div>
                                @elseif($pengajuan->status == 'selesai')
                                    <div class="bg-green-50 mt-4 p-4 border-green-400 border-l-4 rounded">
                                        <p class="text-green-800 text-sm">
                                            Surat Anda sudah selesai. Silakan hubungi kantor desa untuk pengambilan surat.
                                        </p>
                                    </div>
                                @elseif($pengajuan->status == 'ditolak')
                                    <div class="bg-red-50 mt-4 p-4 border-red-400 border-l-4 rounded">
                                        <p class="text-red-800 text-sm">
                                            Pengajuan ditolak. Silakan baca catatan admin di atas untuk informasi lebih lanjut.
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mt-8">
                    <a 
                        href="{{ route('pengajuan-surat.create') }}" 
                        class="flex-1 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold text-white text-center transition"
                    >
                        Buat Pengajuan Baru
                    </a>
                    <a 
                        href="{{ route('home') }}" 
                        class="flex-1 bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold text-gray-700 text-center transition"
                    >
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </section>

    @endsection

