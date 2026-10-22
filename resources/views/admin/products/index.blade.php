<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">Kelola Produk UMKM</h2>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                <i class="mr-2 fas fa-plus"></i>Tambah Produk
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
                        @forelse ($products as $product)
                            <div class="hover:shadow-lg border border-gray-200 rounded-lg overflow-hidden transition">
                                <!-- Product Image -->
                                <div class="bg-gray-200 h-48">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="flex justify-center items-center bg-gradient-to-br from-green-100 to-green-200 w-full h-full">
                                            <svg class="w-20 h-20 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Product Info -->
                                <div class="p-4">
                                    <h3 class="mb-1 font-bold text-gray-900 text-lg">{{ $product->name }}</h3>
                                    <p class="mb-2 text-gray-600 text-sm">
                                        <i class="mr-1 fas fa-user"></i>{{ $product->contact_name }}
                                    </p>
                                    <p class="mb-2 font-bold text-green-600 text-xl">
                                        {{ $product->formatted_price }}
                                    </p>
                                    <p class="mb-3 text-gray-600 text-sm line-clamp-2">
                                        {{ Str::limit($product->description, 80) }}
                                    </p>
                                    
                                    @if($product->contact_phone)
                                        <p class="mb-3 text-gray-500 text-xs">
                                            <i class="text-green-500 fab fa-whatsapp"></i>
                                            {{ $product->contact_phone }}
                                        </p>
                                    @endif

                                    <!-- Actions -->
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded font-semibold text-white text-sm text-center transition">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded w-full font-semibold text-white text-sm transition">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-12 text-center">
                                <svg class="mx-auto w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <p class="mt-4 text-gray-500 text-lg">Belum ada produk UMKM.</p>
                                <a href="{{ route('admin.products.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 mt-4 px-6 py-2 rounded font-bold text-white">
                                    Tambah Produk Pertama
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
