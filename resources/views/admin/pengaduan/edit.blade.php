<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">
                Tanggapi Pengaduan #{{ $pengaduan->nomor_pengaduan }}
            </h2>
            <a href="{{ route('admin.pengaduan.show', $pengaduan) }}" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-gray-700">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="space-y-6 mx-auto sm:px-6 lg:px-8 max-w-4xl">
            
            @if(session('error'))
            <div class="relative bg-red-100 px-4 py-3 border border-red-400 rounded text-red-700">
                {{ session('error') }}
            </div>
            @endif

            <!-- Ringkasan Pengaduan -->
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 border-gray-200 border-b">
                    <h3 class="mb-4 font-semibold text-gray-800 text-lg">Ringkasan Pengaduan</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 text-sm">Nomor Pengaduan</p>
                                <p class="font-semibold text-gray-900">{{ $pengaduan->nomor_pengaduan }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-600 text-sm">Status Saat Ini</p>
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
                            <p class="text-gray-600 text-sm">Pelapor</p>
                            <p class="font-medium text-gray-900">
                                {{ $pengaduan->nama_pelapor }}
                                @if($pengaduan->is_anonymous)
                                <span class="bg-purple-100 ml-2 px-2 py-0.5 rounded font-medium text-purple-700 text-xs">Anonim</span>
                                @endif
                            </p>
                            <p class="text-gray-600 text-sm">{{ $pengaduan->google_email }}</p>
                            @if($pengaduan->is_anonymous)
                            <p class="mt-1 text-purple-600 text-xs">📌 Publik melihat: "Warga Negeri Haria"</p>
                            @endif
                        </div>
                        
                        <div>
                            <p class="text-gray-600 text-sm">Tanggal Pengaduan</p>
                            <p class="text-gray-900">{{ $pengaduan->created_at->format('d F Y, H:i') }} WIT</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="mb-4">
                        <p class="mb-1 font-medium text-gray-700 text-sm">Judul Pengaduan</p>
                        <p class="font-semibold text-gray-900">{{ $pengaduan->judul }}</p>
                    </div>
                    
                    <div>
                        <p class="mb-1 font-medium text-gray-700 text-sm">Isi Laporan</p>
                        <div class="bg-gray-50 p-4 border border-gray-200 rounded-lg">
                            <p class="text-gray-800 whitespace-pre-wrap">{{ $pengaduan->isi_laporan }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tanggapan -->
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="mb-6 font-semibold text-gray-800 text-lg">Form Tanggapan</h3>
                    
                    <form action="{{ route('admin.pengaduan.update', $pengaduan) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 font-medium text-gray-700 text-sm">
                                Update Status Pengaduan <span class="text-red-600">*</span>
                            </label>
                            <select 
                                id="status" 
                                name="status" 
                                required
                                class="px-4 py-3 border border-gray-300 focus:border-transparent rounded-lg focus:ring-2 focus:ring-blue-500 w-full"
                            >
                                <option value="menunggu" {{ $pengaduan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')
                            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                            
                            <div class="space-y-1 mt-2 text-gray-600 text-sm">
                                <p><strong>Menunggu:</strong> Pengaduan baru diterima dan belum ditindaklanjuti</p>
                                <p><strong>Diproses:</strong> Pengaduan sedang dalam proses penanganan</p>
                                <p><strong>Selesai:</strong> Pengaduan telah selesai ditangani</p>
                            </div>
                        </div>

                        <!-- Tanggapan -->
                        <div>
                            <label for="isi_tanggapan" class="block mb-2 font-medium text-gray-700 text-sm">
                                Isi Tanggapan <span class="text-red-600">*</span>
                            </label>
                            <textarea 
                                id="isi_tanggapan" 
                                name="isi_tanggapan" 
                                rows="8"
                                required
                                placeholder="Tuliskan tanggapan Anda terhadap pengaduan ini. Tanggapan akan dikirimkan via email kepada pelapor."
                                class="px-4 py-3 border border-gray-300 focus:border-transparent rounded-lg focus:ring-2 focus:ring-blue-500 w-full resize-none"
                            >{{ old('isi_tanggapan') }}</textarea>
                            @error('isi_tanggapan')
                            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                            
                            <p class="mt-2 text-gray-600 text-sm">
                                💡 <strong>Catatan:</strong> Email notifikasi akan otomatis dikirim ke <strong>{{ $pengaduan->google_email }}</strong> setelah Anda menyimpan tanggapan ini.
                            </p>
                        </div>

                        <!-- Riwayat Tanggapan Sebelumnya -->
                        @if($pengaduan->tanggapans->count() > 0)
                        <div class="pt-6 border-t">
                            <h4 class="mb-3 font-semibold text-gray-700 text-sm">Riwayat Tanggapan Sebelumnya</h4>
                            <div class="space-y-3">
                                @foreach($pengaduan->tanggapans->sortByDesc('created_at') as $tanggapan)
                                <div class="bg-gray-50 p-4 border border-gray-200 rounded-lg">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="font-semibold text-gray-600 text-xs">Tanggapan ke-{{ $loop->index + 1 }}</span>
                                        <span class="text-gray-500 text-xs">{{ $tanggapan->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <p class="text-gray-800 text-sm whitespace-pre-wrap">{{ $tanggapan->isi_tanggapan }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Buttons -->
                        <div class="flex gap-3 pt-4 border-t">
                            <button 
                                type="submit" 
                                class="flex-1 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium text-white transition-colors duration-200"
                            >
                                Simpan & Kirim Email Notifikasi
                            </button>
                            <a 
                                href="{{ route('admin.pengaduan.show', $pengaduan) }}" 
                                class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-medium text-gray-700 transition-colors duration-200"
                            >
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Preview Foto (Mini Gallery) -->
            @if($pengaduan->fotos->count() > 0)
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="mb-3 font-semibold text-gray-700 text-sm">Foto Pengaduan ({{ $pengaduan->fotos->count() }})</h3>
                    <div class="gap-2 grid grid-cols-3 md:grid-cols-5">
                        @foreach($pengaduan->fotos as $foto)
                        <a href="{{ asset('storage/' . $foto->file_path) }}" target="_blank" class="block">
                            <img 
                                src="{{ asset('storage/' . $foto->file_path) }}" 
                                alt="Foto {{ $loop->iteration }}"
                                class="shadow hover:shadow-lg rounded w-full h-24 object-cover transition-shadow duration-200"
                                loading="lazy"
                            >
                        </a>
                        @endforeach
                    </div>
                    <p class="mt-2 text-gray-500 text-xs">Klik foto untuk membuka dalam tab baru</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
