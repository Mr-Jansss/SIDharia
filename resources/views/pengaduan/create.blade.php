@extends('layouts.public')

@section('title', 'Pengaduan Masyarakat - Negeri Haria')

@section('content')
    <div class="mx-auto px-4 py-8 max-w-4xl container">
        <!-- Header -->
        <div class="bg-white shadow-md mb-6 p-6 rounded-lg">
            <h1 class="mb-2 font-bold text-gray-800 text-3xl">Pengaduan Masyarakat</h1>
            <p class="text-gray-600">Sampaikan pengaduan atau keluhan Anda kepada pemerintah Negeri</p>
        </div>

        <!-- Google Auth Gate -->
        @if(!$googleAuth)
        <div class="bg-blue-50 mb-6 p-6 border border-blue-200 rounded-lg">
            <div class="flex items-start space-x-4">
                <svg class="flex-shrink-0 mt-1 w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="flex-1">
                    <h3 class="mb-2 font-semibold text-gray-800 text-lg">Verifikasi Identitas Diperlukan</h3>
                    <p class="mb-4 text-gray-600">Untuk mengirim pengaduan, Anda perlu melakukan verifikasi identitas menggunakan akun Google. Data Anda akan dijaga kerahasiaannya.</p>
                    <a href="{{ route('auth.google') }}" class="inline-flex items-center bg-white hover:bg-gray-50 shadow-sm px-6 py-3 border border-gray-300 rounded-lg font-medium text-gray-700 transition duration-150">
                        <svg class="mr-2 w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Login dengan Google
                    </a>
                </div>
            </div>
        </div>
        @else
        <!-- User Info (Logged In) -->
        <div class="flex justify-between items-center bg-green-50 mb-6 p-4 border border-green-200 rounded-lg">
            <div class="flex items-center space-x-3">
                <img src="{{ $googleAuth['avatar'] }}" alt="Avatar" class="rounded-full w-10 h-10">
                <div>
                    <p class="font-medium text-gray-800">{{ $googleAuth['nama'] }}</p>
                    <p class="text-gray-600 text-sm">{{ $googleAuth['email'] }}</p>
                </div>
            </div>
            <form action="{{ route('auth.google.logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?');">
                @csrf
                <button type="submit" class="bg-red-50 hover:bg-red-100 px-4 py-2 border border-red-300 rounded-lg font-medium text-red-600 hover:text-red-700 text-sm transition">
                    <i class="mr-1 fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>

        <!-- Form Pengaduan -->
        <div class="bg-white shadow-md p-6 rounded-lg">
            @if(session('success'))
            <div class="bg-green-50 mb-4 px-4 py-3 border border-green-200 rounded text-green-800">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-50 mb-4 px-4 py-3 border border-red-200 rounded text-red-800">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('pengaduan.store') }}" method="POST" id="formPengaduan" enctype="multipart/form-data">
                @csrf

                <!-- Judul Pengaduan -->
                <div class="mb-6">
                    <label for="judul" class="block mb-2 font-medium text-gray-700 text-sm">
                        Judul Pengaduan <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="judul" 
                        id="judul" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Jalan Rusak di RT 03"
                        maxlength="255"
                        required
                    >
                    @error('judul')
                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Isi Laporan -->
                <div class="mb-6">
                    <label for="isi_laporan" class="block mb-2 font-medium text-gray-700 text-sm">
                        Isi Laporan <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="isi_laporan" 
                        id="isi_laporan" 
                        rows="6"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('isi_laporan') border-red-500 @enderror"
                        placeholder="Jelaskan pengaduan Anda secara detail (minimal 20 karakter)"
                        required
                    >{{ old('isi_laporan') }}</textarea>
                    @error('isi_laporan')
                    <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-gray-500 text-sm">Minimal 20 karakter</p>
                </div>

                <!-- Upload Foto -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700 text-sm">
                        Foto Pendukung (Opsional)
                    </label>
                    <p class="mb-3 text-gray-500 text-sm">Maksimal 5 foto. Foto akan dikompres otomatis.</p>
                    
                    <div class="p-6 border-2 border-gray-300 hover:border-blue-500 border-dashed rounded-lg text-center transition duration-150 cursor-pointer" onclick="document.getElementById('foto').click()">
                        <svg class="mx-auto w-12 h-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="mt-2 text-gray-600 text-sm">Klik untuk memilih foto atau drag & drop</p>
                        <p class="mt-1 text-gray-500 text-xs">PNG, JPG, WebP hingga 2MB per foto</p>
                    </div>
                    
                    <input 
                        type="file" 
                        name="foto[]" 
                        id="foto" 
                        class="hidden" 
                        accept="image/jpeg,image/jpg,image/png,image/webp"
                        multiple
                        onchange="handleFileSelect(event)"
                    >

                    <!-- Preview Container -->
                    <div id="previewContainer" class="gap-4 grid grid-cols-2 md:grid-cols-3 mt-4"></div>
                    
                    @error('foto.*')
                    <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800">
                        Kembali ke Beranda
                    </a>
                    <button 
                        type="submit" 
                        id="btnSubmit"
                        class="bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 px-6 py-3 rounded-lg font-medium text-white transition duration-150 disabled:cursor-not-allowed"
                    >
                        Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
        @endif

        <!-- Info Section -->
        <div class="bg-gray-50 mt-6 p-6 rounded-lg">
            <h3 class="mb-3 font-semibold text-gray-800 text-lg">Informasi</h3>
            <ul class="space-y-2 text-gray-600 text-sm">
                <li class="flex items-start">
                    <svg class="flex-shrink-0 mt-0.5 mr-2 w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Pengaduan akan ditanggapi maksimal 3x24 jam</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 mt-0.5 mr-2 w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Notifikasi tanggapan akan dikirim via email</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 mt-0.5 mr-2 w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Data pribadi Anda dijamin kerahasiaannya</span>
                </li>
            </ul>
        </div>

        <!-- Link Cek Status -->
        <div class="mt-4 text-center">
            <a href="{{ route('pengaduan.check-status') }}" class="font-medium text-blue-600 hover:text-blue-700 text-sm">
                Cek Status Pengaduan →
            </a>
        </div>
    </div>

    @push('scripts')
    <script>
        console.log('=== PENGADUAN FORM SCRIPT LOADED ===');
        
        // Global error handler
        window.addEventListener('error', function(event) {
            console.error('JavaScript Error:', event.error);
        });
        
        // Unhandled promise rejection handler
        window.addEventListener('unhandledrejection', function(event) {
            console.error('Unhandled Promise Rejection:', event.reason);
        });
        
        let selectedFiles = [];
        const MAX_FILES = 5;
        const TARGET_WIDTH = 800;
        const TARGET_SIZE_KB = 75; // Target 50-100KB, aim for middle

        async function handleFileSelect(event) {
            console.log('File select triggered');
            const files = Array.from(event.target.files);
            
            // Validasi maksimal 5 foto
            if (selectedFiles.length + files.length > MAX_FILES) {
                alert(`Maksimal ${MAX_FILES} foto yang dapat diunggah`);
                return;
            }

            // Proses setiap file
            for (const file of files) {
                if (!file.type.match('image.*')) {
                    alert('File harus berupa gambar');
                    continue;
                }

                try {
                    const compressed = await compressImage(file);
                    selectedFiles.push(compressed);
                } catch (error) {
                    console.error('Error compressing image:', error);
                    alert('Gagal memproses gambar: ' + file.name);
                }
            }

            renderPreviews();
            updateFormFiles();
        }

        async function compressImage(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const img = new Image();
                    
                    img.onload = function() {
                        // Hitung dimensi baru (max width 800px, maintain aspect ratio)
                        let width = img.width;
                        let height = img.height;
                        
                        if (width > TARGET_WIDTH) {
                            height = (height * TARGET_WIDTH) / width;
                            width = TARGET_WIDTH;
                        }

                        // Create canvas
                        const canvas = document.createElement('canvas');
                        canvas.width = width;
                        canvas.height = height;
                        
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, width, height);

                        // Convert to WebP with quality adjustment
                        canvas.toBlob(
                            (blob) => {
                                if (!blob) {
                                    reject(new Error('Failed to compress image'));
                                    return;
                                }

                                // Buat file baru dengan nama WebP
                                const compressedFile = new File(
                                    [blob], 
                                    file.name.replace(/\.(jpg|jpeg|png)$/i, '.webp'),
                                    { type: 'image/webp' }
                                );

                                console.log(`Compressed: ${file.name} (${(file.size/1024).toFixed(1)}KB) → ${compressedFile.name} (${(compressedFile.size/1024).toFixed(1)}KB)`);
                                
                                resolve(compressedFile);
                            },
                            'image/webp',
                            0.85 // Quality 85% untuk target 50-100KB
                        );
                    };
                    
                    img.onerror = () => reject(new Error('Failed to load image'));
                    img.src = e.target.result;
                };
                
                reader.onerror = () => reject(new Error('Failed to read file'));
                reader.readAsDataURL(file);
            });
        }

        function renderPreviews() {
            const container = document.getElementById('previewContainer');
            container.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative group';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="border-2 border-gray-200 rounded-lg w-full h-32 object-cover">
                        <button 
                            type="button"
                            onclick="removeFile(${index})"
                            class="top-2 right-2 absolute bg-red-600 opacity-0 group-hover:opacity-100 p-1 rounded-full text-white transition duration-150"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <p class="mt-1 text-gray-600 text-xs truncate">${file.name}</p>
                        <p class="text-gray-500 text-xs">${(file.size / 1024).toFixed(1)} KB</p>
                    `;
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeFile(index) {
            selectedFiles.splice(index, 1);
            renderPreviews();
            updateFormFiles();
        }

        function updateFormFiles() {
            const input = document.getElementById('foto');
            const dataTransfer = new DataTransfer();
            
            selectedFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            
            input.files = dataTransfer.files;
        }

        // Form submission handling
        const form = document.getElementById('formPengaduan');
        
        if (!form) {
            console.error('FORM NOT FOUND!');
        } else {
            console.log('Form found:', form);
            console.log('Form action URL:', form.action);
            console.log('Form method:', form.method);
            console.log('Form enctype:', form.enctype);
            
            form.addEventListener('submit', function(e) {
                console.log('=== FORM SUBMIT EVENT TRIGGERED ===');
                
                const btnSubmit = document.getElementById('btnSubmit');
                const judul = document.getElementById('judul').value.trim();
                const isiLaporan = document.getElementById('isi_laporan').value.trim();
                
                // Validasi minimal
                if (!judul) {
                    e.preventDefault();
                    alert('Judul pengaduan harus diisi');
                    console.warn('Validation failed: judul empty');
                    return false;
                }
                
                if (isiLaporan.length < 20) {
                    e.preventDefault();
                    alert('Isi laporan minimal 20 karakter');
                    console.warn('Validation failed: isi_laporan too short');
                    return false;
                }
                
                // Disable button dan ubah teks
                btnSubmit.disabled = true;
                btnSubmit.textContent = 'Mengirim...';
                
                console.log('Form validation passed:', {
                    judul: judul,
                    isi_laporan_length: isiLaporan.length,
                    foto_count: selectedFiles.length
                });
                
                console.log('Form akan disubmit ke:', form.action);
                
                // Let the form submit naturally
                return true;
            });
            
            console.log('Submit event listener attached successfully');
        }
    </script>
    @endpush
@endsection>
