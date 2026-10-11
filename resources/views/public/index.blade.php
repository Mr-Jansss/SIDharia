@extends('layouts.public')

@section('title', 'Beranda - Desa Wisata Haria')

@section('content')
<!-- Hero Section -->
<section class="bg-primary relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/50 to-transparent z-0"></div>
    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <h1 class="text-5xl font-bold mb-6 leading-tight">
                    Selamat Datang di<br>
                    <span class="text-secondary">Desa Wisata Haria</span>
                </h1>
                <p class="text-xl mb-8 text-gray-200">
                    Jelajahi keindahan alam, budaya lokal, dan produk unggulan dari masyarakat Haria di Kecamatan Sabu Barat.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('potentials') }}" class="bg-secondary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
                        Jelajahi Wisata
                    </a>
                    <a href="{{ route('products') }}" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Produk UMKM
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <i class="fas fa-mountain text-secondary text-9xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
@if($villageProfile)
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">{{ \App\Models\Potential::count() }}</div>
                <div class="text-gray-600">Potensi Wisata</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">{{ \App\Models\Product::count() }}</div>
                <div class="text-gray-600">Produk UMKM</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">{{ \App\Models\Facility::count() }}</div>
                <div class="text-gray-600">Fasilitas Umum</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">{{ \App\Models\Official::count() }}</div>
                <div class="text-gray-600">Perangkat Desa</div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Featured Potentials Section -->
@if($featuredPotentials->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary mb-4">Potensi Wisata Unggulan</h2>
            <p class="text-gray-600 text-lg">Temukan destinasi wisata menarik di Desa Haria</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredPotentials as $potential)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($potential->image)
                <img src="{{ Storage::url($potential->image) }}" alt="{{ $potential->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <span class="bg-secondary text-primary text-xs px-3 py-1 rounded-full font-semibold uppercase">
                        {{ $potential->category }}
                    </span>
                    <h3 class="text-xl font-bold text-primary mt-3 mb-2">{{ $potential->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($potential->description, 100) }}</p>
                    <a href="{{ route('potential.detail', $potential->id) }}" class="text-primary font-semibold hover:text-secondary transition">
                        Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('potentials') }}" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover-primary transition inline-block">
                Lihat Semua Wisata
            </a>
        </div>
    </div>
</section>
@endif

<!-- Products Section -->
@if($latestProducts->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary mb-4">Produk UMKM Terbaru</h2>
            <p class="text-gray-600 text-lg">Dukung produk lokal dari masyarakat Desa Haria</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latestProducts as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-box text-gray-400 text-4xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-2">{{ $product->name }}</h3>
                    <div class="text-2xl font-bold text-secondary mb-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                    @if($product->contact_phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->contact_phone) }}?text=Halo, saya tertarik dengan {{ $product->name }}" 
                       target="_blank" 
                       class="block text-center bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp mr-2"></i> Hubungi Penjual
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('products') }}" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover-primary transition inline-block">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Posts Section -->
@if($latestPosts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary mb-4">Berita & Kegiatan Terkini</h2>
            <p class="text-gray-600 text-lg">Update terbaru dari Desa Wisata Haria</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-newspaper text-gray-400 text-4xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <div class="text-gray-500 text-sm mb-2">
                        <i class="far fa-calendar mr-1"></i>
                        {{ $post->published_at->format('d M Y') }}
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                    <a href="{{ route('post.detail', $post->slug) }}" class="text-primary font-semibold hover:text-secondary transition">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('posts') }}" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover-primary transition inline-block">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-primary">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-white mb-4">Punya Pertanyaan atau Pengaduan?</h2>
        <p class="text-xl text-gray-200 mb-8">Kami siap mendengarkan dan membantu Anda</p>
        <button class="bg-secondary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
            <i class="fas fa-comment-alt mr-2"></i> Sampaikan Pengaduan
        </button>
        <p class="text-gray-300 mt-4 text-sm">Fitur pengaduan akan segera hadir!</p>
    </div>
</section>
@endsection
