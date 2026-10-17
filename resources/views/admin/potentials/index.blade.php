<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">
                {{ __('Kelola Potensi Desa') }}
            </h2>
            <a href="{{ route('admin.potentials.create') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                Tambah Potensi
            </a>
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
                    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @forelse ($potentials as $potential)
                            <div class="hover:shadow-lg border border-gray-200 rounded-lg overflow-hidden transition">
                                <!-- Gambar -->
                                <div class="bg-gray-200 h-48">
                                    @if($potential->image)
                                        <img src="{{ Storage::url($potential->image) }}" alt="{{ $potential->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="flex justify-center items-center bg-gradient-to-br from-blue-100 to-blue-200 w-full h-full">
                                            <svg class="w-20 h-20 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-bold text-gray-900 text-lg">{{ $potential->name }}</h3>
                                        <span class="text-xs px-2 py-1 rounded-full
                                            @if($potential->category === 'wisata') bg-blue-100 text-blue-800
                                            @elseif($potential->category === 'alam') bg-green-100 text-green-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ ucfirst($potential->category) }}
                                        </span>
                                    </div>
                                    <p class="mb-4 text-gray-600 text-sm">{{ Str::limit($potential->description, 100) }}</p>

                                    <!-- Actions -->
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.potentials.edit', $potential) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded text-white text-sm text-center">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.potentials.destroy', $potential) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus potensi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded w-full text-white text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-12 text-center">
                                <svg class="mx-auto w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="mt-4 text-gray-500">Belum ada data potensi desa.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
