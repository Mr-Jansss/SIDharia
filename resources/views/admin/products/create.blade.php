<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">Tambah Produk UMKM</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-3xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Produk -->
                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-medium text-gray-700 text-sm">
                                Nama Produk <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   value="{{ old('name') }}" 
                                   required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                                   placeholder="Contoh: Kue Sagu Haria">
                            @error('name')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama Kontak/Pemilik -->
                        <div class="mb-4">
                            <label for="contact_name" class="block mb-2 font-medium text-gray-700 text-sm">
                                Nama Pemilik/Produsen <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="contact_name" 
                                   id="contact_name" 
                                   value="{{ old('contact_name') }}" 
                                   required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('contact_name') border-red-500 @enderror" 
                                   placeholder="Contoh: Ibu Rosita">
                            @error('contact_name')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-4">
                            <label for="price" class="block mb-2 font-medium text-gray-700 text-sm">
                                Harga (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   name="price" 
                                   id="price" 
                                   value="{{ old('price') }}" 
                                   required 
                                   min="0" 
                                   step="1000" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('price') border-red-500 @enderror" 
                                   placeholder="25000">
                            @error('price')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Kontak -->
                        <div class="mb-4">
                            <label for="contact_phone" class="block mb-2 font-medium text-gray-700 text-sm">
                                Nomor WhatsApp/Telepon
                            </label>
                            <input type="text" 
                                   name="contact_phone" 
                                   id="contact_phone" 
                                   value="{{ old('contact_phone') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('contact_phone') border-red-500 @enderror" 
                                   placeholder="081340089147">
                            <p class="mt-1 text-gray-500 text-xs">
                                <i class="fas fa-info-circle"></i> Format: 081xxx atau 628xxx (tanpa spasi)
                            </p>
                            @error('contact_phone')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="description" class="block mb-2 font-medium text-gray-700 text-sm">
                                Deskripsi Produk <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      rows="5" 
                                      required 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-500 @enderror" 
                                      placeholder="Jelaskan detail produk: bahan, ukuran, keunggulan, dll...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Foto Produk -->
                        <div class="mb-6">
                            <label for="image" class="block mb-2 font-medium text-gray-700 text-sm">
                                Foto Produk
                            </label>
                            <input type="file" 
                                   name="image" 
                                   id="image" 
                                   accept="image/jpeg,image/png,image/jpg,image/webp" 
                                   class="mt-1 block w-full text-sm text-gray-500 
                                          file:mr-4 file:py-2 file:px-4 
                                          file:rounded file:border-0 
                                          file:text-sm file:font-semibold 
                                          file:bg-blue-50 file:text-blue-700 
                                          hover:file:bg-blue-100 
                                          @error('image') border-red-500 @enderror">
                            <p class="mt-1 text-gray-500 text-xs">
                                <i class="fas fa-info-circle"></i> Format: JPG, PNG, WebP. Maksimal: 2MB
                            </p>
                            @error('image')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-end items-center space-x-3 pt-4 border-t">
                            <a href="{{ route('admin.products.index') }}" class="bg-gray-300 hover:bg-gray-400 px-6 py-2 rounded font-bold text-gray-800 transition">
                                <i class="mr-1 fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded font-bold text-white transition">
                                <i class="mr-1 fas fa-save"></i> Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
