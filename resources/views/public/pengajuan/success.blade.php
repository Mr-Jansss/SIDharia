@extends('layouts.public')

@section('title', 'Pengajuan Berhasil - Negeri Haria')

@section('content')
    <!-- Success Section -->
    <section class="py-16">
        <div class="mx-auto px-4 container">
            <div class="mx-auto max-w-2xl">
                <!-- Success Card -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Success Icon -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 p-8 text-center">
                        <div class="inline-flex justify-center items-center bg-white mb-4 rounded-full w-20 h-20">
                            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h1 class="mb-2 font-bold text-white text-3xl">Pengajuan Berhasil!</h1>
                        <p class="text-green-100">Data Anda telah tersimpan dengan baik</p>
                    </div>

                    <!-- Data Pengajuan -->
                    <div class="p-8">
                        <h2 class="mb-4 font-bold text-gray-900 text-xl">Detail Pengajuan</h2>
                        
                        <div class="space-y-3 bg-gray-50 mb-6 p-6 rounded-lg">
                            <div class="flex">
                                <span class="w-32 font-medium text-gray-700">NIK:</span>
                                <span class="text-gray-900">{{ $pengajuan->nik }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-32 font-medium text-gray-700">Nama:</span>
                                <span class="text-gray-900">{{ $pengajuan->nama }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-32 font-medium text-gray-700">WhatsApp:</span>
                                <span class="text-gray-900">{{ $pengajuan->nomor_wa }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-32 font-medium text-gray-700">Jenis Surat:</span>
                                <span class="text-gray-900">{{ $pengajuan->jenis_surat }}</span>
                            </div>
                            <div class="flex">
                                <span class="w-32 font-medium text-gray-700">Status:</span>
                                <span class="inline-flex items-center bg-yellow-100 px-3 py-1 rounded-full font-medium text-yellow-800 text-sm">
                                    Menunggu Proses
                                </span>
                            </div>
                        </div>

                        <!-- Langkah Selanjutnya -->
                        <div class="bg-blue-50 mb-6 p-4 border-blue-500 border-l-4 rounded">
                            <h3 class="mb-2 font-bold text-blue-900">Langkah Selanjutnya:</h3>
                            <ol class="space-y-1 text-blue-800 text-sm list-decimal list-inside">
                                <li>Klik tombol "Kirim Berkas via WhatsApp" di bawah</li>
                                <li>Kirim foto/scan dokumen persyaratan yang dibutuhkan</li>
                                <li>Tunggu konfirmasi dari Admin Negeri Haria</li>
                                <li>Anda dapat mengecek status pengajuan kapan saja dengan NIK Anda</li>
                            </ol>
                        </div>

                        <!-- Daftar Persyaratan -->
                        <div class="bg-yellow-50 mb-6 p-4 border-yellow-400 border-l-4 rounded">
                            <h3 class="mb-3 font-bold text-yellow-900">Berkas yang Perlu Disiapkan:</h3>
                            <ul class="space-y-2 text-yellow-800 text-sm">
                                @foreach($syarat as $item)
                                    <li class="flex items-start">
                                        <svg class="flex-shrink-0 mt-0.5 mr-2 w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <p class="mt-3 text-yellow-700 text-xs">
                                <strong>Catatan:</strong> Pastikan foto/scan berkas jelas dan dapat dibaca.
                            </p>
                        </div>

                        <!-- WhatsApp Button -->
                        <div class="space-y-3">
                            <a 
                                href="{{ $waUrl }}" 
                                target="_blank"
                                class="block bg-green-600 hover:bg-green-700 px-6 py-4 rounded-lg w-full font-bold text-white text-center hover:scale-105 transition transform"
                            >
                                <div class="flex justify-center items-center">
                                    <svg class="mr-2 w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                    Kirim Berkas via WhatsApp
                                </div>
                            </a>

                            <a 
                                href="{{ route('pengajuan-surat.check-status') }}" 
                                class="block bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg w-full font-semibold text-white text-center transition"
                            >
                                Cek Status Pengajuan
                            </a>

                            <a 
                                href="{{ route('home') }}" 
                                class="block bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg w-full font-semibold text-gray-700 text-center transition"
                            >
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="bg-yellow-50 mt-6 p-4 border-yellow-400 border-l-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-yellow-700 text-sm">
                                <strong>Penting:</strong> Simpan NIK Anda untuk mengecek status pengajuan. Proses verifikasi biasanya memakan waktu 1-3 hari kerja.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

