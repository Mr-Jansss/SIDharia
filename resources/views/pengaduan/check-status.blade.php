<x-guest-layout>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Cek Status Pengaduan</h1>
            <p class="text-gray-600">Masukkan nomor pengaduan dan email untuk melihat status</p>
        </div>

        <!-- Form Cek Status -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form id="formCekStatus" class="space-y-4">
                @csrf
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email yang Terdaftar <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="contoh@gmail.com"
                        required
                    >
                </div>

                <!-- Nomor Pengaduan -->
                <div>
                    <label for="nomor_pengaduan" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Pengaduan <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nomor_pengaduan" 
                        name="nomor_pengaduan"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="PGD-20261013-0001"
                        required
                    >
                    <p class="mt-1 text-sm text-gray-500">Format: PGD-YYYYMMDD-XXXX</p>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    id="btnCek"
                    class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 font-medium disabled:bg-gray-400"
                >
                    Cek Status
                </button>
            </form>
        </div>

        <!-- Result Container -->
        <div id="resultContainer" class="hidden"></div>

        <!-- Back Link -->
        <div class="text-center">
            <a href="{{ route('pengaduan.create') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
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
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Tanggapan</h3>
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <p class="text-gray-700 mb-2">${escapeHtml(data.tanggapan.isi)}</p>
                            <p class="text-sm text-gray-500">Ditanggapi pada: ${data.tanggapan.tanggal} WIB</p>
                        </div>
                    </div>
                `;
            }
            
            const html = `
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Detail Pengaduan</h2>
                        <span class="px-3 py-1 rounded-full text-sm font-medium ${statusColor}">
                            ${escapeHtml(data.status_label)}
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-600">Nomor Pengaduan</p>
                            <p class="font-bold text-blue-600">${escapeHtml(data.nomor_pengaduan)}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Judul</p>
                            <p class="font-medium text-gray-800">${escapeHtml(data.judul)}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Isi Laporan</p>
                            <p class="text-gray-700">${escapeHtml(data.isi_laporan)}</p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 pt-2">
                            <div>
                                <p class="text-sm text-gray-600">Tanggal Lapor</p>
                                <p class="font-medium text-gray-800">${data.tanggal_lapor} WIB</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Foto Dilampirkan</p>
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
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-center">
                    <svg class="w-12 h-12 text-red-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-red-800 font-medium">${escapeHtml(message)}</p>
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
</x-guest-layout>
