<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">
                {{ __('Kelola Perangkat Desa') }}
            </h2>
            <a href="{{ route('admin.officials.create') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                Tambah Perangkat
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
                        @forelse ($officials as $official)
                            <div class="hover:shadow-lg p-6 border border-gray-200 rounded-lg transition">
                                <div class="flex flex-col items-center text-center">
                                    <!-- Foto Perangkat -->
                                    <div class="bg-gray-200 mb-4 rounded-full w-32 h-32 overflow-hidden">
                                        @if($official->photo)
                                            <img src="{{ Storage::url($official->photo) }}" alt="{{ $official->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="flex justify-center items-center bg-blue-100 w-full h-full">
                                                <svg class="w-16 h-16 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Info -->
                                    <h3 class="mb-1 font-bold text-gray-900 text-lg">{{ $official->name }}</h3>
                                    <p class="mb-2 text-gray-600 text-sm">{{ $official->position }}</p>
                                    <span class="bg-blue-100 mb-4 px-2 py-1 rounded-full text-blue-800 text-xs">
                                        Urutan: {{ $official->order }}
                                    </span>

                                    <!-- Actions -->
                                    <div class="flex space-x-2 mt-4">
                                        <a href="{{ route('admin.officials.edit', $official) }}" class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded text-white text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.officials.destroy', $official) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus perangkat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-12 text-center">
                                <svg class="mx-auto w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <p class="mt-4 text-gray-500">Belum ada data perangkat desa.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
