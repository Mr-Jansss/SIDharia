<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Edit Potensi Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-3xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.potentials.update', $potential) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if($potential->image)
                            <div class="mb-4">
                                <label class="block mb-2 font-medium text-gray-700 text-sm">Gambar Saat Ini</label>
                                <img src="{{ Storage::url($potential->image) }}" alt="{{ $potential->name }}" class="rounded w-48 h-32 object-cover">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-medium text-gray-700 text-sm">Nama Potensi</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $potential->name) }}" required 
                                class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('name')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block mb-2 font-medium text-gray-700 text-sm">Kategori</label>
                            <select name="category" id="category" required class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                                <option value="wisata" {{ old('category', $potential->category) === 'wisata' ? 'selected' : '' }}>Wisata</option>
                                <option value="alam" {{ old('category', $potential->category) === 'alam' ? 'selected' : '' }}>Alam</option>
                                <option value="budaya" {{ old('category', $potential->category) === 'budaya' ? 'selected' : '' }}>Budaya</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-2 font-medium text-gray-700 text-sm">Deskripsi</label>
                            <textarea name="description" id="description" rows="6" required 
                                class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">{{ old('description', $potential->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block mb-2 font-medium text-gray-700 text-sm">Gambar Baru (Opsional)</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="block hover:file:bg-blue-100 file:bg-blue-50 mt-1 file:mr-4 file:px-4 file:py-2 file:border-0 file:rounded w-full file:font-semibold text-gray-500 file:text-blue-700 text-sm file:text-sm">
                            @error('image')
                                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end items-center space-x-3 mt-6">
                            <a href="{{ route('admin.potentials.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded font-bold text-gray-800">
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
