<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">Kelola Fasilitas Umum</h2>
            <a href="{{ route('admin.facilities.create') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">Tambah Fasilitas</a>
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
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Nama Fasilitas</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Deskripsi</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Koordinat</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($facilities as $facility)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($facility->image)
                                            <img src="{{ asset('storage/' . $facility->image) }}" alt="Thumbnail" class="rounded w-16 h-16 object-cover">
                                        @else
                                            <div class="flex justify-center items-center bg-gray-200 rounded w-16 h-16">
                                                <i class="text-gray-400 fas fa-building"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-900 text-sm">{{ $facility->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><div class="text-gray-500 text-sm">{{ Str::limit($facility->description, 50) }}</div></td>
                                    <td class="px-6 py-4 text-gray-500 text-sm whitespace-nowrap">
                                        @if($facility->latitude && $facility->longitude)
                                            <a href="https://www.google.com/maps/search/?api=1&query={{ $facility->latitude }},{{ $facility->longitude }}" 
                                               target="_blank" 
                                               class="flex items-center text-blue-600 hover:text-blue-800">
                                                <i class="mr-1 fas fa-map-marker-alt"></i>
                                                Lihat Map
                                            </a>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-sm whitespace-nowrap">
                                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="mr-3 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('admin.facilities.destroy', $facility) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="px-6 py-4 text-gray-500 text-center">Belum ada data fasilitas.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
