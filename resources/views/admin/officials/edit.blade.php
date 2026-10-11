<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Edit Perangkat Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-3xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.officials.update', $official) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Foto Saat Ini -->
                        @if($official->photo)
                            <div class="mb-4">
                                <label class="block mb-2 font-medium text-gray-700 text-sm">Foto Saat Ini</label>
                                <div class="flex items-center space-x-4">
                                    <img src="{{ Storage::url($official->photo) }}" alt="{{ $official->name }}" class="rounded-full w-24 h-24 object-cover">
                                    <p class="text-gray-500 text-sm">Upload foto baru untuk mengganti</p>
                                </div>
                            </div>
                        @endif

                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-medium text-gray-700 text-sm">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $official->name) }}" required 
                                class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full"
                                placeholder="Contoh: Bapak Johannes Sahetapy">
                            @error('name')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jabatan -->
                        <div class="mb-4">
                            <label for="position" class="block mb-2 font-medium text-gray-700 text-sm">Jabatan</label>
                            <input type="text" name="position" id="position" value="{{ old('position', $official->position) }}" required 
                                class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full"
                                placeholder="Contoh: Kepala Desa">
                            @error('position')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Urut -->
                        <div class="mb-4">
                            <label for="order" class="block mb-2 font-medium text-gray-700 text-sm">Nomor Urut</label>
                            <input type="number" name="order" id="order" value="{{ old('order', $official->order) }}" required min="0"
                                class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full"
                                placeholder="0">
                            <p class="mt-1 text-gray-500 text-xs">Semakin kecil nomor, semakin atas urutannya</p>
                            @error('order')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Foto Baru -->
                        <div class="mb-4">
                            <label for="photo" class="block mb-2 font-medium text-gray-700 text-sm">Foto Baru (Opsional)</label>
                            <input type="file" name="photo" id="photo" accept="image/jpeg,image/png,image/jpg,image/webp"
                                class="block hover:file:bg-blue-100 file:bg-blue-50 mt-1 file:mr-4 file:px-4 file:py-2 file:border-0 file:rounded w-full file:font-semibold text-gray-500 file:text-blue-700 text-sm file:text-sm">
                            <p class="mt-1 text-gray-500 text-xs">Format: JPG, PNG, WebP. Maks: 2MB</p>
                            @error('image')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end items-center space-x-3 mt-6">
                            <a href="{{ route('admin.officials.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded font-bold text-gray-800">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
