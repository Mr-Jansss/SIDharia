<x-guest-layout>
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <!-- Success Message -->
        <div class="bg-green-50 border-2 border-green-200 rounded-lg p-8 mb-6 text-center">
            <svg class="w-16 h-16 text-green-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Pengaduan Berhasil Dikirim</h1>
            <p class="text-gray-600">Terima kasih telah menyampaikan pengaduan Anda</p>
        </div>

        <!-- Nomor Pengaduan -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Pengaduan</h2>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                <p class="text-sm text-gray-600 mb-1">Nomor Pengaduan</p>
                <p class="text-2xl font-bold text-blue-600">{{ $pengaduan->nomor_pengaduan }}</p>
                <p class="text-xs text-gray-500 mt-2">Simpan nomor ini untuk cek status pengaduan</p>
            </div>

            <div class="space-y-3">
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Judul</span>
                    <span class="font-medium text-gray-800">{{ $pengaduan->judul }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Tanggal Lapor</span>
                    <span class="font-medium text-gray-800">{{ $pengaduan->created_at->format('d/m/Y H:i') }} WIB</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Status</span>
                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
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
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Langkah Selanjutnya</h3>
            <div class="space-y-3">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold mr-3">
                        1
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Pengaduan Sedang Diproses</p>
                        <p class="text-sm text-gray-600">Tim kami akan meninjau pengaduan Anda dalam 1x24 jam</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold mr-3">
                        2
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Notifikasi via Email</p>
                        <p class="text-sm text-gray-600">Tanggapan akan dikirim ke email: <strong>{{ $pengaduan->google_email }}</strong></p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold mr-3">
                        3
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Cek Status Kapan Saja</p>
                        <p class="text-sm text-gray-600">Gunakan nomor pengaduan untuk melihat progress tanggapan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('pengaduan.check-status') }}" class="flex-1 px-6 py-3 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 transition duration-150 font-medium">
                Cek Status Pengaduan
            </a>
            <a href="{{ route('home') }}" class="flex-1 px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 text-center rounded-lg hover:bg-gray-50 transition duration-150 font-medium">
                Kembali ke Beranda
            </a>
        </div>

        <!-- Info Box -->
        <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-yellow-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div class="text-sm text-gray-700">
                    <p class="font-medium mb-1">Penting untuk Diketahui:</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>Tanggapan akan dikirim maksimal 3x24 jam kerja</li>
                        <li>Pastikan email Anda aktif untuk menerima notifikasi</li>
                        <li>Pengaduan yang tidak sesuai kewenangan desa akan diarahkan ke instansi terkait</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
