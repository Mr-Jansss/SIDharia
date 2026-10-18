<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-gray-800 text-xl leading-tight">Edit Fasilitas</h2></x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-3xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.facilities.update', $facility) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-medium text-gray-700 text-sm">Nama Fasilitas</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $facility->name) }}" required class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('name')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block mb-2 font-medium text-gray-700 text-sm">Gambar Fasilitas</label>
                            @if($facility->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $facility->image) }}" alt="Current Image" class="border rounded w-auto h-40">
                                    <p class="mt-1 text-gray-500 text-xs">Gambar saat ini (upload baru untuk mengganti)</p>
                                </div>
                            @endif
                            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/webp" class="block hover:file:bg-blue-100 file:bg-blue-50 mt-1 file:mr-4 file:px-4 file:py-2 file:border-0 file:rounded w-full file:font-semibold text-gray-500 file:text-blue-700 text-sm file:text-sm">
                            <p class="mt-1 text-gray-500 text-xs">Format: JPEG, PNG, JPG, WEBP (Max: 2MB)</p>
                            @error('image')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-2 font-medium text-gray-700 text-sm">Deskripsi</label>
                            <textarea name="description" id="description" rows="4" class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">{{ old('description', $facility->description) }}</textarea>
                            @error('description')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="bg-blue-50 mb-4 p-4 border border-blue-200 rounded-lg">
                            <div class="flex items-start mb-2">
                                <i class="mt-1 mr-2 text-blue-600 fas fa-info-circle"></i>
                                <div>
                                    <p class="mb-1 font-semibold text-blue-800 text-sm">Koordinat GPS</p>
                                    <p class="text-blue-700 text-xs">Masukkan koordinat lokasi fasilitas untuk ditampilkan di peta interaktif.</p>
                                </div>
                            </div>
                        </div>

                        <div class="gap-4 grid grid-cols-2 mb-4">
                            <div>
                                <label for="latitude" class="block mb-2 font-medium text-gray-700 text-sm">Latitude</label>
                                <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $facility->latitude ?? '-3.582142') }}" class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                                @error('latitude')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="longitude" class="block mb-2 font-medium text-gray-700 text-sm">Longitude</label>
                                <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $facility->longitude ?? '128.624756') }}" class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                                @error('longitude')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="flex justify-end items-center space-x-3 mt-6">
                            <a href="{{ route('admin.facilities.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded font-bold text-gray-800">Batal</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
