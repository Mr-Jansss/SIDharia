<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Pengaduan #{{ $pengaduan->nomor_pengaduan }}
            </h2>
            <a href="{{ route('admin.pengaduan.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
            @endif

            <!-- Informasi Pengaduan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pengaduan</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Pengaduan</label>
                            <p class="text-gray-900 font-semibold">{{ $pengaduan->nomor_pengaduan }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
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
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pelapor</label>
                            <p class="text-gray-900">{{ $pengaduan->nama_pelapor }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Pelapor</label>
                            <p class="text-gray-900">{{ $pengaduan->google_email }}</p>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengaduan</label>
                            <p class="text-gray-900">{{ $pengaduan->created_at->format('d F Y, H:i') }} WIT</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Judul Pengaduan</h3>
                    <p class="text-gray-900 text-base">{{ $pengaduan->judul }}</p>
                </div>

                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Isi Laporan</h3>
                    <div class="text-gray-900 whitespace-pre-wrap">{{ $pengaduan->isi_laporan }}</div>
                </div>

                <!-- Gallery Foto -->
                @if($pengaduan->fotos->count() > 0)
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Foto Pengaduan ({{ $pengaduan->fotos->count() }})</h3>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($pengaduan->fotos as $foto)
                        <div class="relative group cursor-pointer" onclick="openModal('{{ asset('storage/' . $foto->file_path) }}')">
                            <img 
                                src="{{ asset('storage/' . $foto->file_path) }}" 
                                alt="Foto Pengaduan {{ $loop->iteration }}"
                                class="w-full h-48 object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                                <svg class="w-10 h-10 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
                                </svg>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Tanggapan Admin -->
                @if($pengaduan->tanggapans->count() > 0)
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Riwayat Tanggapan</h3>
                    
                    <div class="space-y-4">
                        @foreach($pengaduan->tanggapans->sortByDesc('created_at') as $tanggapan)
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-sm font-semibold text-blue-800">Tanggapan Admin</span>
                                <span class="text-xs text-gray-600">{{ $tanggapan->created_at->format('d F Y, H:i') }}</span>
                            </div>
                            <p class="text-gray-800 whitespace-pre-wrap">{{ $tanggapan->isi_tanggapan }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="p-6">
                    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded">
                        <p class="font-medium">Belum ada tanggapan untuk pengaduan ini</p>
                    </div>
                </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-wrap gap-3">
                    @if($pengaduan->status !== 'selesai')
                    <a href="{{ route('admin.pengaduan.edit', $pengaduan) }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                        Berikan Tanggapan
                    </a>
                    @endif
                    
                    <form action="{{ route('admin.pengaduan.destroy', $pengaduan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini? Semua foto dan data terkait akan dihapus permanen dan tidak dapat dikembalikan.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium">
                            Hapus Pengaduan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Zoom Foto -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center p-4" onclick="closeModal()">
        <div class="relative max-w-5xl max-h-full">
            <button onclick="closeModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300 text-3xl font-bold">
                &times;
            </button>
            <img id="modalImage" src="" alt="Foto Pengaduan" class="max-w-full max-h-screen rounded-lg shadow-2xl">
        </div>
    </div>

    <script>
        function openModal(imageSrc) {
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('modalImage').src = imageSrc;
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal dengan ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</x-app-layout>
