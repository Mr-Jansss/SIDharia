@extends('layouts.public')

@section('title', 'Pengaduan Berhasil - Negeri Haria')

@section('content')
    <div class="mx-auto px-4 py-8 max-w-3xl container">
        <!-- Success Message -->
        <div class="bg-green-50 mb-6 p-8 border-2 border-green-200 rounded-lg text-center">
            <svg class="mx-auto mb-4 w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h1 class="mb-2 font-bold text-gray-800 text-3xl">Pengaduan Berhasil Dikirim</h1>
            <p class="text-gray-600">Terima kasih telah menyampaikan pengaduan Anda</p>
        </div>

        <!-- Nomor Pengaduan -->
        <div class="bg-white shadow-md mb-6 p-6 rounded-lg">
            <h2 class="mb-4 font-semibold text-gray-800 text-xl">Detail Pengaduan</h2>
            
            <div class="bg-blue-50 mb-4 p-4 border border-blue-200 rounded-lg">
                <p class="mb-1 text-gray-600 text-sm">Nomor Pengaduan</p>
                <p class="font-bold text-blue-600 text-2xl">{{ $pengaduan->nomor_pengaduan }}</p>
                <p class="mt-2 text-gray-500 text-xs">Simpan nomor ini untuk cek status pengaduan</p>
            </div>

            <div class="space-y-3">
                <div class="flex justify-between py-2 border-gray-200 border-b">
                    <span class="text-gray-600">Judul</span>
                    <span class="font-medium text-gray-800">{{ $pengaduan->judul }}</span>
                </div>
                <div class="flex justify-between py-2 border-gray-200 border-b">
                    <span class="text-gray-600">Tanggal Lapor</span>
                    <span class="font-medium text-gray-800">{{ $pengaduan->created_at->format('d/m/Y H:i') }} WIB</span>
                </div>
                <div class="flex justify-between py-2 border-gray-200 border-b">
                    <span class="text-gray-600">Status</span>
                    <span class="bg-yellow-100 px-3 py-1 rounded-full font-medium text-yellow-800 text-sm">
                        Menunggu Ditanggapi
                    </span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-600">Foto Dilampirkan</span>
                    <span class="font-medium text-gray-800">{{ $pengaduan->fotos->count() }} foto</span>
                </div>
            </div>
        </div>

        <!-- Next Steps -->
        <div class="bg-white shadow-md mb-6 p-6 rounded-lg">
            <h3 class="mb-4 font-semibold text-gray-800 text-lg">Langkah Selanjutnya</h3>
            <div class="space-y-3">
                <div class="flex items-start">
                    <div class="flex flex-shrink-0 justify-center items-center bg-blue-100 mr-3 rounded-full w-8 h-8 font-bold text-blue-600">
                        1
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Pengaduan Sedang Diproses</p>
                        <p class="text-gray-600 text-sm">Tim kami akan meninjau pengaduan Anda dalam 1x24 jam</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex flex-shrink-0 justify-center items-center bg-blue-100 mr-3 rounded-full w-8 h-8 font-bold text-blue-600">
                        2
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Notifikasi via Email</p>
                        <p class="text-gray-600 text-sm">Tanggapan akan dikirim ke email: <strong>{{ $pengaduan->google_email }}</strong></p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex flex-shrink-0 justify-center items-center bg-blue-100 mr-3 rounded-full w-8 h-8 font-bold text-blue-600">
                        3
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Cek Status Kapan Saja</p>
                        <p class="text-gray-600 text-sm">Gunakan nomor pengaduan untuk melihat progress tanggapan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex sm:flex-row flex-col gap-4">
            <a href="{{ route('pengaduan.check-status') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium text-white text-center transition duration-150">
                Cek Status Pengaduan
            </a>
            <a href="{{ route('home') }}" class="flex-1 bg-white hover:bg-gray-50 px-6 py-3 border-2 border-gray-300 rounded-lg font-medium text-gray-700 text-center transition duration-150">
                Kembali ke Beranda
            </a>
        </div>

        <!-- Info Box -->
        <div class="bg-yellow-50 mt-6 p-4 border border-yellow-200 rounded-lg">
            <div class="flex items-start">
                <svg class="flex-shrink-0 mt-0.5 mr-2 w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div class="text-gray-700 text-sm">
                    <p class="mb-1 font-medium">Penting untuk Diketahui:</p>
                    <ul class="space-y-1 text-gray-600 list-disc list-inside">
                        <li>Tanggapan akan dikirim maksimal 3x24 jam kerja</li>
                        <li>Pastikan email Anda aktif untuk menerima notifikasi</li>
                        <li>Pengaduan yang tidak sesuai kewenangan desa akan diarahkan ke instansi terkait</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
