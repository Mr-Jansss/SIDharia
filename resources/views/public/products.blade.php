@extends('layouts.public')

@section('title', 'Produk UMKM - Desa Wisata Haria')

@section('content')
<!-- Page Header -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Produk UMKM</h1>
        <p class="text-xl text-gray-200">Dukung produk lokal dari masyarakat Desa Haria</p>
    </div>
</section>

<!-- Products Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover">
                @else
                <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-box text-gray-400 text-5xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-2 line-clamp-2">{{ $product->name }}</h3>
                    
                    <div class="text-3xl font-bold text-secondary mb-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $product->description }}</p>

                    @if($product->contact_name || $product->contact_phone)
                    <div class="border-t pt-4 mb-4">
                        @if($product->contact_name)
                        <p class="text-gray-700 text-sm mb-1">
                            <i class="fas fa-user text-gray-400 mr-2"></i>
                            <span class="font-semibold">{{ $product->contact_name }}</span>
                        </p>
                        @endif
                        @if($product->contact_phone)
                        <p class="text-gray-700 text-sm">
                            <i class="fas fa-phone text-gray-400 mr-2"></i>
                            {{ $product->contact_phone }}
                        </p>
                        @endif
                    </div>
                    @endif

                    @if($product->contact_phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->contact_phone) }}?text=Halo, saya tertarik dengan produk {{ $product->name }}" 
                       target="_blank" 
                       class="block text-center bg-green-500 text-white px-4 py-3 rounded-lg font-semibold hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp mr-2"></i> Hubungi via WhatsApp
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-box text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-xl">Belum ada produk UMKM yang ditampilkan</p>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-primary mb-4">Ingin Menjual Produk Anda?</h2>
            <p class="text-gray-600 text-lg mb-8">
                Bergabunglah dengan UMKM Desa Haria dan promosikan produk lokal Anda di platform ini
            </p>
            <a href="https://wa.me/62xxx?text=Saya ingin mendaftarkan produk UMKM saya" 
               target="_blank"
               class="inline-block bg-primary text-white px-8 py-3 rounded-lg font-semibold hover-primary transition">
                <i class="fab fa-whatsapp mr-2"></i> Hubungi Admin
            </a>
        </div>
    </div>
</section>
@endsection
