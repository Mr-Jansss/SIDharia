<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">Edit Data Transparansi Keuangan</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-4xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.transparency.update', $transparency) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul -->
                        <div class="mb-4">
                            <label for="title" class="block mb-2 font-medium text-gray-700 text-sm">
                                Judul Laporan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   value="{{ old('title', $transparency->title) }}" 
                                   required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('title') border-red-500 @enderror" 
                                   placeholder="Contoh: APB Negeri Haria Tahun 2026">
                            @error('title')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori & Tahun -->
                        <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mb-4">
                            <div>
                                <label for="category" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select name="category" 
                                        id="category" 
                                        required 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('category') border-red-500 @enderror">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="apb_negeri" {{ old('category', $transparency->category) == 'apb_negeri' ? 'selected' : '' }}>APB Negeri</option>
                                    <option value="realisasi_anggaran" {{ old('category', $transparency->category) == 'realisasi_anggaran' ? 'selected' : '' }}>Laporan Realisasi Anggaran</option>
                                    <option value="blt_bansos" {{ old('category', $transparency->category) == 'blt_bansos' ? 'selected' : '' }}>Penyaluran BLT & Bansos</option>
                                    <option value="lppd" {{ old('category', $transparency->category) == 'lppd' ? 'selected' : '' }}>LPPD / LKPPD</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="fiscal_year" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Tahun Anggaran <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                       name="fiscal_year" 
                                       id="fiscal_year" 
                                       value="{{ old('fiscal_year', $transparency->fiscal_year) }}" 
                                       required 
                                       min="2020" 
                                       max="2100" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('fiscal_year') border-red-500 @enderror">
                                @error('fiscal_year')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="description" class="block mb-2 font-medium text-gray-700 text-sm">
                                Deskripsi
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      rows="4" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-500 @enderror" 
                                      placeholder="Jelaskan detail laporan...">{{ old('description', $transparency->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Anggaran & Realisasi -->
                        <div class="gap-4 grid grid-cols-1 md:grid-cols-3 mb-4">
                            <div>
                                <label for="budget_amount" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Nominal Anggaran (Rp)
                                </label>
                                <input type="number" 
                                       name="budget_amount" 
                                       id="budget_amount" 
                                       value="{{ old('budget_amount', $transparency->budget_amount) }}" 
                                       min="0" 
                                       step="1000" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('budget_amount') border-red-500 @enderror" 
                                       placeholder="0">
                                @error('budget_amount')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="realization_amount" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Nominal Realisasi (Rp)
                                </label>
                                <input type="number" 
                                       name="realization_amount" 
                                       id="realization_amount" 
                                       value="{{ old('realization_amount', $transparency->realization_amount) }}" 
                                       min="0" 
                                       step="1000" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('realization_amount') border-red-500 @enderror" 
                                       placeholder="0">
                                <p class="mt-1 text-gray-500 text-xs">Untuk Realisasi Anggaran</p>
                                @error('realization_amount')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="percentage" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Persentase (%)
                                </label>
                                <input type="number" 
                                       name="percentage" 
                                       id="percentage" 
                                       value="{{ old('percentage', $transparency->percentage) }}" 
                                       min="0" 
                                       max="100" 
                                       step="0.01" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('percentage') border-red-500 @enderror" 
                                       placeholder="0">
                                <p class="mt-1 text-gray-500 text-xs">Untuk Realisasi Anggaran</p>
                                @error('percentage')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Semester & Jumlah Penerima -->
                        <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mb-4">
                            <div>
                                <label for="semester" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Semester/Periode
                                </label>
                                <select name="semester" 
                                        id="semester" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('semester') border-red-500 @enderror">
                                    <option value="">-- Tidak Ada --</option>
                                    <option value="1" {{ old('semester', $transparency->semester) == '1' ? 'selected' : '' }}>Semester 1</option>
                                    <option value="2" {{ old('semester', $transparency->semester) == '2' ? 'selected' : '' }}>Semester 2</option>
                                    <option value="tahunan" {{ old('semester', $transparency->semester) == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                                </select>
                                <p class="mt-1 text-gray-500 text-xs">Untuk Realisasi Anggaran</p>
                                @error('semester')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="beneficiary_count" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Jumlah Penerima Manfaat (KPM)
                                </label>
                                <input type="number" 
                                       name="beneficiary_count" 
                                       id="beneficiary_count" 
                                       value="{{ old('beneficiary_count', $transparency->beneficiary_count) }}" 
                                       min="0" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('beneficiary_count') border-red-500 @enderror" 
                                       placeholder="0">
                                <p class="mt-1 text-gray-500 text-xs">Untuk BLT & Bansos</p>
                                @error('beneficiary_count')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- File Uploads -->
                        <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mb-4">
                            <div>
                                <label for="pdf_file" class="block mb-2 font-medium text-gray-700 text-sm">
                                    File PDF Laporan
                                </label>
                                @if($transparency->pdf_file)
                                    <div class="flex items-center gap-2 bg-red-50 mb-2 p-2 border border-red-200 rounded text-sm">
                                        <i class="text-red-600 fas fa-file-pdf"></i>
                                        <span class="flex-1 text-gray-700">File PDF sudah ada</span>
                                        <a href="{{ asset('storage/' . $transparency->pdf_file) }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                @endif
                                <input type="file" 
                                       name="pdf_file" 
                                       id="pdf_file" 
                                       accept="application/pdf" 
                                       class="mt-1 block w-full text-sm text-gray-500 
                                              file:mr-4 file:py-2 file:px-4 
                                              file:rounded file:border-0 
                                              file:text-sm file:font-semibold 
                                              file:bg-red-50 file:text-red-700 
                                              hover:file:bg-red-100 
                                              @error('pdf_file') border-red-500 @enderror">
                                <p class="mt-1 text-gray-500 text-xs">
                                    <i class="fas fa-info-circle"></i> Upload file baru untuk mengganti yang lama. Maksimal: 10MB
                                </p>
                                @error('pdf_file')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="infographic_image" class="block mb-2 font-medium text-gray-700 text-sm">
                                    Gambar Infografis
                                </label>
                                @if($transparency->infographic_image)
                                    <div class="flex items-center gap-2 bg-blue-50 mb-2 p-2 border border-blue-200 rounded text-sm">
                                        <i class="text-blue-600 fas fa-image"></i>
                                        <span class="flex-1 text-gray-700">Gambar sudah ada</span>
                                        <a href="{{ asset('storage/' . $transparency->infographic_image) }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                @endif
                                <input type="file" 
                                       name="infographic_image" 
                                       id="infographic_image" 
                                       accept="image/jpeg,image/png,image/jpg,image/webp" 
                                       class="mt-1 block w-full text-sm text-gray-500 
                                              file:mr-4 file:py-2 file:px-4 
                                              file:rounded file:border-0 
                                              file:text-sm file:font-semibold 
                                              file:bg-blue-50 file:text-blue-700 
                                              hover:file:bg-blue-100 
                                              @error('infographic_image') border-red-500 @enderror">
                                <p class="mt-1 text-gray-500 text-xs">
                                    <i class="fas fa-info-circle"></i> Upload gambar baru untuk mengganti yang lama. Maksimal: 5MB
                                </p>
                                @error('infographic_image')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Data (JSON) -->
                        <div class="mb-4">
                            <label for="additional_data" class="block mb-2 font-medium text-gray-700 text-sm">
                                Data Tambahan (JSON)
                            </label>
                            <textarea name="additional_data" 
                                      id="additional_data" 
                                      rows="5" 
                                      class="mt-1 block font-mono w-full rounded-md border-gray-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 @error('additional_data') border-red-500 @enderror" 
                                      placeholder='{"breakdown": {"Soa Pattimura": 35, "Soa Matakau": 28}}'>{!! old('additional_data', $transparency->additional_data ? json_encode($transparency->additional_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') !!}</textarea>
                            <p class="mt-1 text-gray-500 text-xs">
                                <i class="fas fa-info-circle"></i> Format JSON untuk data tambahan seperti breakdown per RT/Soa, sections, dll. (Opsional)
                            </p>
                            @error('additional_data')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Publikasi -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_published" 
                                       id="is_published" 
                                       value="1" 
                                       {{ old('is_published', $transparency->is_published) ? 'checked' : '' }}
                                       class="rounded border-gray-300 shadow-sm text-blue-600 focus:border-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700 text-sm">Publikasikan data ini ke halaman publik</span>
                            </label>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-end items-center space-x-3 pt-4 border-t">
                            <a href="{{ route('admin.transparency.index') }}" class="bg-gray-300 hover:bg-gray-400 px-6 py-2 rounded font-bold text-gray-800 transition">
                                <i class="mr-1 fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded font-bold text-white transition">
                                <i class="mr-1 fas fa-save"></i> Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
