@extends('layouts.public')

@section('title', 'Cek Status Pengaduan - Negeri Haria')

@section('content')
    <div class="mx-auto px-4 py-8 max-w-2xl container">
        <!-- Header -->
        <div class="bg-white shadow-md mb-6 p-6 rounded-lg">
            <h1 class="mb-2 font-bold text-gray-800 text-3xl">Cek Status Pengaduan</h1>
            <p class="text-gray-600">Masukkan nomor pengaduan dan email untuk melihat status</p>
        </div>

        <!-- Form Cek Status -->
        <div class="bg-white shadow-md mb-6 p-6 rounded-lg">
            <form id="formCekStatus" class="space-y-4">
                @csrf
                
                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 font-medium text-gray-700 text-sm">
                        Email yang Terdaftar <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="px-4 py-2 border border-gray-300 focus:border-transparent rounded-lg focus:ring-2 focus:ring-blue-500 w-full"
                        placeholder="contoh@gmail.com"
                        required
                    >
                </div>

                <!-- Nomor Pengaduan -->
                <div>
                    <label for="nomor_pengaduan" class="block mb-2 font-medium text-gray-700 text-sm">
                        Nomor Pengaduan <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nomor_pengaduan" 
                        name="nomor_pengaduan"
                        class="px-4 py-2 border border-gray-300 focus:border-transparent rounded-lg focus:ring-2 focus:ring-blue-500 w-full"
                        placeholder="PGD-20261013-0001"
                        required
                    >
                    <p class="mt-1 text-gray-500 text-sm">Format: PGD-YYYYMMDD-XXXX</p>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    id="btnCek"
                    class="bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 px-6 py-3 rounded-lg w-full font-medium text-white transition duration-150"
                >
                    Cek Status
                </button>
            </form>
        </div>

        <!-- Result Container -->
        <div id="resultContainer" class="hidden"></div>

        <!-- Back Link -->
        <div class="text-center">
            <a href="{{ route('pengaduan.create') }}" class="font-medium text-blue-600 hover:text-blue-700 text-sm">
                ← Buat Pengaduan Baru
            </a>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('formCekStatus').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const btnCek = document.getElementById('btnCek');
            const resultContainer = document.getElementById('resultContainer');
            
            // Disable button
            btnCek.disabled = true;
            btnCek.textContent = 'Mencari...';
            
            // Hide previous result
            resultContainer.classList.add('hidden');
            
            // Get form data
            const formData = new FormData(this);
            
            try {
                const response = await fetch('{{ route("pengaduan.get-status") }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    displayResult(result.data);
                } else {
                    displayError(result.message || 'Pengaduan tidak ditemukan');
                }
                
            } catch (error) {
                console.error('Error:', error);
                displayError('Terjadi kesalahan. Silakan coba lagi.');
            } finally {
                btnCek.disabled = false;
                btnCek.textContent = 'Cek Status';
            }
        });
        
        function displayResult(data) {
            const statusColors = {
                'yellow': 'bg-yellow-100 text-yellow-800',
                'blue': 'bg-blue-100 text-blue-800',
                'green': 'bg-green-100 text-green-800',
                'gray': 'bg-gray-100 text-gray-800'
            };
            
            const statusColor = statusColors[data.status_color] || statusColors.gray;
            
            let tanggapanHtml = '';
            if (data.tanggapan) {
                tanggapanHtml = `
                    <div class="mt-6 pt-6 border-gray-200 border-t">
                        <h3 class="mb-3 font-semibold text-gray-800 text-lg">Tanggapan</h3>
                        <div class="bg-green-50 p-4 border border-green-200 rounded-lg">
                            <p class="mb-2 text-gray-700">${escapeHtml(data.tanggapan.isi)}</p>
                            <p class="text-gray-500 text-sm">Ditanggapi pada: ${data.tanggapan.tanggal} WIB</p>
                        </div>
                    </div>
                `;
            }
            
            const html = `
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold text-gray-800 text-xl">Detail Pengaduan</h2>
                        <span class="px-3 py-1 rounded-full text-sm font-medium ${statusColor}">
                            ${escapeHtml(data.status_label)}
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <div>
                            <p class="text-gray-600 text-sm">Nomor Pengaduan</p>
                            <p class="font-bold text-blue-600">${escapeHtml(data.nomor_pengaduan)}</p>
                        </div>
                        
                        <div>
                            <p class="text-gray-600 text-sm">Judul</p>
                            <p class="font-medium text-gray-800">${escapeHtml(data.judul)}</p>
                        </div>
                        
                        <div>
                            <p class="text-gray-600 text-sm">Isi Laporan</p>
                            <p class="text-gray-700">${escapeHtml(data.isi_laporan)}</p>
                        </div>
                        
                        <div class="gap-4 grid grid-cols-2 pt-2">
                            <div>
                                <p class="text-gray-600 text-sm">Tanggal Lapor</p>
                                <p class="font-medium text-gray-800">${data.tanggal_lapor} WIB</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Foto Dilampirkan</p>
                                <p class="font-medium text-gray-800">${data.jumlah_foto} foto</p>
                            </div>
                        </div>
                    </div>
                    
                    ${tanggapanHtml}
                </div>
            `;
            
            const resultContainer = document.getElementById('resultContainer');
            resultContainer.innerHTML = html;
            resultContainer.classList.remove('hidden');
            resultContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
        
        function displayError(message) {
            const html = `
                <div class="bg-red-50 p-4 border border-red-200 rounded-lg text-center">
                    <svg class="mx-auto mb-3 w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="font-medium text-red-800">${escapeHtml(message)}</p>
                </div>
            `;
            
            const resultContainer = document.getElementById('resultContainer');
            resultContainer.innerHTML = html;
            resultContainer.classList.remove('hidden');
        }
        
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    </script>
    @endpush
@endsection
