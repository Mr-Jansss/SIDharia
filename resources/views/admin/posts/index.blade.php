<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">Kelola Berita & Kegiatan</h2>
            <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">Tambah Postingan</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            @if (session('success'))
                <div class="relative bg-green-100 mb-4 px-4 py-3 border border-green-400 rounded text-green-700" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <table class="divide-y divide-gray-200 min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Gambar</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Judul</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Kategori</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Status</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Tanggal</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="Thumbnail" class="rounded w-12 h-12 object-cover">
                                        @else
                                            <div class="flex justify-center items-center bg-gray-200 rounded w-12 h-12">
                                                <i class="text-gray-400 fas fa-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900 text-sm">{{ $post->title }}</div>
                                        <div class="text-gray-500 text-xs">{{ Str::limit($post->content, 60) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($post->category === 'berita') bg-blue-100 text-blue-800
                                            @else bg-purple-100 text-purple-800 @endif">
                                            {{ ucfirst($post->category) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($post->status === 'published')
                                            <span class="inline-flex bg-green-100 px-2 rounded-full font-semibold text-green-800 text-xs leading-5">Published</span>
                                        @else
                                            <span class="inline-flex bg-gray-100 px-2 rounded-full font-semibold text-gray-800 text-xs leading-5">Draft</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 text-sm whitespace-nowrap">
                                        {{ $post->published_at ? $post->published_at->format('d M Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-sm whitespace-nowrap">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="mr-3 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="px-6 py-4 text-gray-500 text-center">Belum ada postingan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
