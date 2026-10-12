<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tanggapi Pengaduan #{{ $pengaduan->nomor_pengaduan }}
            </h2>
            <a href="{{ route('admin.pengaduan.show', $pengaduan) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                {{ session('error') }}
            </div>
            @endif

            <!-- Ringkasan Pengaduan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pengaduan</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-gray-600">Nomor Pengaduan</p>
                                <p class="font-semibold text-gray-900">{{ $pengaduan->nomor_pengaduan }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600">Status Saat Ini</p>
                                @php
                                    $statusColor = match($pengaduan->status) {
                                        'menunggu' => 'bg-yellow-100 text-yellow-800',
                                        'diproses' => 'bg-blue-100 text-blue-800',
                                        'selesai' => 'bg-green-100 text-green-800',
                                        default => 'bg-gray-100 text-gray-800'
                                    };
                                @endphp
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $statusColor }}">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Pelapor</p>
                            <p class="font-medium text-gray-900">{{ $pengaduan->nama_pelapor }}</p>
                            <p class="text-sm text-gray-600">{{ $pengaduan->google_email }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Tanggal Pengaduan</p>
                            <p class="text-gray-900">{{ $pengaduan->created_at->format('d F Y, H:i') }} WIT</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 mb-1">Judul Pengaduan</p>
                        <p class="text-gray-900 font-semibold">{{ $pengaduan->judul }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-1">Isi Laporan</p>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-gray-800 whitespace-pre-wrap">{{ $pengaduan->isi_laporan }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tanggapan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Form Tanggapan</h3>
                    
                    <form action="{{ route('admin.pengaduan.update', $pengaduan) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Update Status Pengaduan <span class="text-red-600">*</span>
                            </label>
                            <select 
                                id="status" 
                                name="status" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                                <option value="menunggu" {{ $pengaduan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                            <div class="mt-2 space-y-1 text-sm text-gray-600">
                                <p><strong>Menunggu:</strong> Pengaduan baru diterima dan belum ditindaklanjuti</p>
                                <p><strong>Diproses:</strong> Pengaduan sedang dalam proses penanganan</p>
                                <p><strong>Selesai:</strong> Pengaduan telah selesai ditangani</p>
                            </div>
                        </div>

                        <!-- Tanggapan -->
                        <div>
                            <label for="isi_tanggapan" class="block text-sm font-medium text-gray-700 mb-2">
                                Isi Tanggapan <span class="text-red-600">*</span>
                            </label>
                            <textarea 
                                id="isi_tanggapan" 
                                name="isi_tanggapan" 
                                rows="8"
                                required
                                placeholder="Tuliskan tanggapan Anda terhadap pengaduan ini. Tanggapan akan dikirimkan via email kepada pelapor."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                            >{{ old('isi_tanggapan') }}</textarea>
                            @error('isi_tanggapan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                            <p class="mt-2 text-sm text-gray-600">
                                💡 <strong>Catatan:</strong> Email notifikasi akan otomatis dikirim ke <strong>{{ $pengaduan->google_email }}</strong> setelah Anda menyimpan tanggapan ini.
                            </p>
                        </div>

                        <!-- Riwayat Tanggapan Sebelumnya -->
                        @if($pengaduan->tanggapans->count() > 0)
                        <div class="border-t pt-6">
                            <h4 class="text-sm font-semibold text-gray-700 mb-3">Riwayat Tanggapan Sebelumnya</h4>
                            <div class="space-y-3">
                                @foreach($pengaduan->tanggapans->sortByDesc('created_at') as $tanggapan)
                                <div class="bg-gray-50 border border-gray-200 p-4 rounded-lg">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-xs font-semibold text-gray-600">Tanggapan ke-{{ $loop->index + 1 }}</span>
                                        <span class="text-xs text-gray-500">{{ $tanggapan->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <p class="text-sm text-gray-800 whitespace-pre-wrap">{{ $tanggapan->isi_tanggapan }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Buttons -->
                        <div class="flex gap-3 pt-4 border-t">
                            <button 
                                type="submit" 
                                class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium transition-colors duration-200"
                            >
                                Simpan & Kirim Email Notifikasi
                            </button>
                            <a 
                                href="{{ route('admin.pengaduan.show', $pengaduan) }}" 
                                class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 font-medium transition-colors duration-200"
                            >
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Preview Foto (Mini Gallery) -->
            @if($pengaduan->fotos->count() > 0)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Foto Pengaduan ({{ $pengaduan->fotos->count() }})</h3>
                    <div class="grid grid-cols-3 md:grid-cols-5 gap-2">
                        @foreach($pengaduan->fotos as $foto)
                        <a href="{{ asset('storage/' . $foto->file_path) }}" target="_blank" class="block">
                            <img 
                                src="{{ asset('storage/' . $foto->file_path) }}" 
                                alt="Foto {{ $loop->iteration }}"
                                class="w-full h-24 object-cover rounded shadow hover:shadow-lg transition-shadow duration-200"
                                loading="lazy"
                            >
                        </a>
                        @endforeach
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Klik foto untuk membuka dalam tab baru</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
