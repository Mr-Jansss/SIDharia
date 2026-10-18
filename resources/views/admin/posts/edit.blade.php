<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-gray-800 text-xl leading-tight">Edit Postingan</h2></x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-3xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block mb-2 font-medium text-gray-700 text-sm">Judul</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('title')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                            <p class="mt-1 text-gray-500 text-xs">Slug saat ini: {{ $post->slug }}</p>
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block mb-2 font-medium text-gray-700 text-sm">Kategori</label>
                            <select name="category" id="category" required class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                                <option value="berita" {{ old('category', $post->category) === 'berita' ? 'selected' : '' }}>Berita</option>
                                <option value="kegiatan" {{ old('category', $post->category) === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            </select>
                            @error('category')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block mb-2 font-medium text-gray-700 text-sm">Gambar</label>
                            @if($post->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="border rounded w-auto h-32">
                                    <p class="mt-1 text-gray-500 text-xs">Gambar saat ini (upload baru untuk mengganti)</p>
                                </div>
                            @endif
                            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/webp" class="block hover:file:bg-blue-100 file:bg-blue-50 mt-1 file:mr-4 file:px-4 file:py-2 file:border-0 file:rounded w-full file:font-semibold text-gray-500 file:text-blue-700 text-sm file:text-sm">
                            <p class="mt-1 text-gray-500 text-xs">Format: JPEG, PNG, JPG, WEBP (Max: 2MB)</p>
                            @error('image')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block mb-2 font-medium text-gray-700 text-sm">Konten</label>
                            <textarea name="content" id="content" rows="12" required class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">{{ old('content', $post->content) }}</textarea>
                            @error('content')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block mb-2 font-medium text-gray-700 text-sm">Status</label>
                            <select name="status" id="status" required class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                                <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="published_at" class="block mb-2 font-medium text-gray-700 text-sm">Tanggal Publikasi</label>
                            <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}" class="block shadow-sm mt-1 border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('published_at')<p class="mt-1 text-red-500 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex justify-end items-center space-x-3 mt-6">
                            <a href="{{ route('admin.posts.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded font-bold text-gray-800">Batal</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
