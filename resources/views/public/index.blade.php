@extends('layouts.public')

@section('title', 'Beranda - Desa Wisata Haria')

@section('content')
<!-- Hero Slider Section -->
@if($heroSliders->count() > 0)
<section class="relative overflow-hidden">
    <div class="hero-slider">
        @foreach($heroSliders as $index => $slider)
        <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ Storage::url($slider->image) }}');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent"></div>
            <div class="z-10 relative mx-auto px-4 h-full container">
                <div class="flex items-center h-full">
                    <div class="max-w-2xl text-white">
                        @if($slider->title)
                        <h1 class="mb-6 font-bold text-5xl md:text-6xl leading-tight animate-fade-in-up">
                            {{ $slider->title }}
                        </h1>
                        @endif
                        @if($slider->description)
                        <p class="mb-8 text-gray-200 text-xl md:text-2xl animate-fade-in-up animation-delay-200">
                            {{ $slider->description }}
                        </p>
                        @endif
                        <div class="flex flex-wrap gap-4 animate-fade-in-up animation-delay-400">
                            <a href="{{ route('potentials') }}" class="bg-secondary hover:bg-yellow-400 px-8 py-3 rounded-lg font-semibold text-primary transition">
                                Jelajahi Wisata
                            </a>
                            <a href="{{ route('products') }}" class="bg-white hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold text-primary transition">
                                Produk UMKM
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Slider Controls & Indicators -->
    @if($heroSliders->count() > 1)
    <!-- Navigation Buttons (Bottom Right) -->
    <div class="slider-controls">
        <button class="slider-btn" onclick="changeSlide(-1)" title="Previous">
            <i class="fa-chevron-left fas"></i>
        </button>
        <button class="slider-btn" onclick="changeSlide(1)" title="Next">
            <i class="fa-chevron-right fas"></i>
        </button>
    </div>

    <!-- Slider Indicators (Bottom Center) -->
    <div class="slider-indicators">
        @foreach($heroSliders as $index => $slider)
        <button class="indicator {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></button>
        @endforeach
    </div>
    @endif
</section>
@else
<!-- Default Hero Section (if no sliders) -->
<section class="relative bg-primary overflow-hidden">
    <div class="z-0 absolute inset-0 bg-gradient-to-r from-blue-900/50 to-transparent"></div>
    <div class="z-10 relative mx-auto px-4 py-20 container">
        <div class="items-center gap-12 grid grid-cols-1 lg:grid-cols-2">
            <div class="text-white">
                <h1 class="mb-6 font-bold text-5xl leading-tight">
                    Selamat Datang di<br>
                    <span class="text-secondary">Desa Wisata Haria</span>
                </h1>
                <p class="mb-8 text-gray-200 text-xl">
                    Jelajahi keindahan alam, budaya lokal, dan produk unggulan dari masyarakat Haria di Kecamatan Sabu Barat.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('potentials') }}" class="bg-secondary hover:bg-yellow-400 px-8 py-3 rounded-lg font-semibold text-primary transition">
                        Jelajahi Wisata
                    </a>
                    <a href="{{ route('products') }}" class="bg-white hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold text-primary transition">
                        Produk UMKM
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl">
                    <i class="text-secondary text-9xl fas fa-mountain"></i>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Stats Section -->
@if($villageProfile)
<section class="bg-white py-12">
    <div class="mx-auto px-4 container">
        <div class="gap-6 grid grid-cols-2 md:grid-cols-4">
            <div class="text-center">
                <div class="mb-2 font-bold text-primary text-4xl">{{ \App\Models\Potential::count() }}</div>
                <div class="text-gray-600">Potensi Wisata</div>
            </div>
            <div class="text-center">
                <div class="mb-2 font-bold text-primary text-4xl">{{ \App\Models\Product::count() }}</div>
                <div class="text-gray-600">Produk UMKM</div>
            </div>
            <div class="text-center">
                <div class="mb-2 font-bold text-primary text-4xl">{{ \App\Models\Facility::count() }}</div>
                <div class="text-gray-600">Fasilitas Umum</div>
            </div>
            <div class="text-center">
                <div class="mb-2 font-bold text-primary text-4xl">{{ \App\Models\Official::count() }}</div>
                <div class="text-gray-600">Perangkat Desa</div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Featured Potentials Section -->
@if($featuredPotentials->count() > 0)
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mb-12 text-center">
            <h2 class="mb-4 font-bold text-primary text-4xl">Potensi Wisata Unggulan</h2>
            <p class="text-gray-600 text-lg">Temukan destinasi wisata menarik di Desa Haria</p>
        </div>

        <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            @foreach($featuredPotentials as $potential)
            <div class="bg-white shadow-lg hover:shadow-xl rounded-lg overflow-hidden transition">
                @if($potential->image)
                <img src="{{ Storage::url($potential->image) }}" alt="{{ $potential->name }}" class="w-full h-48 object-cover">
                @else
                <div class="flex justify-center items-center bg-gray-200 w-full h-48">
                    <i class="text-gray-400 text-4xl fas fa-image"></i>
                </div>
                @endif
                <div class="p-6">
                    <span class="bg-secondary px-3 py-1 rounded-full font-semibold text-primary text-xs uppercase">
                        {{ $potential->category }}
                    </span>
                    <h3 class="mt-3 mb-2 font-bold text-primary text-xl">{{ $potential->name }}</h3>
                    <p class="mb-4 text-gray-600 text-sm line-clamp-2">{{ Str::limit($potential->description, 100) }}</p>
                    <a href="{{ route('potential.detail', $potential->id) }}" class="font-semibold text-primary hover:text-secondary transition">
                        Selengkapnya <i class="fa-arrow-right ml-1 fas"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('potentials') }}" class="inline-block bg-primary px-8 py-3 rounded-lg font-semibold text-white transition hover-primary">
                Lihat Semua Wisata
            </a>
        </div>
    </div>
</section>
@endif

<!-- Products Section -->
@if($latestProducts->count() > 0)
<section class="bg-white py-16">
    <div class="mx-auto px-4 container">
        <div class="mb-12 text-center">
            <h2 class="mb-4 font-bold text-primary text-4xl">Produk UMKM Terbaru</h2>
            <p class="text-gray-600 text-lg">Dukung produk lokal dari masyarakat Desa Haria</p>
        </div>

        <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($latestProducts as $product)
            <div class="bg-white shadow-lg hover:shadow-xl rounded-lg overflow-hidden transition">
                @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                <div class="flex justify-center items-center bg-gray-200 w-full h-48">
                    <i class="text-gray-400 text-4xl fas fa-box"></i>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="mb-2 font-bold text-primary text-xl">{{ $product->name }}</h3>
                    <div class="mb-3 font-bold text-secondary text-2xl">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    <p class="mb-4 text-gray-600 text-sm line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                    @if($product->contact_phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->contact_phone) }}?text=Halo, saya tertarik dengan {{ $product->name }}" 
                       target="_blank" 
                       class="block bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg font-semibold text-white text-center transition">
                        <i class="mr-2 fab fa-whatsapp"></i> Hubungi Penjual
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('products') }}" class="inline-block bg-primary px-8 py-3 rounded-lg font-semibold text-white transition hover-primary">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Posts Section -->
@if($latestPosts->count() > 0)
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mb-12 text-center">
            <h2 class="mb-4 font-bold text-primary text-4xl">Berita & Kegiatan Terkini</h2>
            <p class="text-gray-600 text-lg">Update terbaru dari Desa Wisata Haria</p>
        </div>

        <div class="gap-6 grid grid-cols-1 md:grid-cols-3">
            @foreach($latestPosts as $post)
            <div class="bg-white shadow-lg hover:shadow-xl rounded-lg overflow-hidden transition">
                @if($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                <div class="flex justify-center items-center bg-gray-200 w-full h-48">
                    <i class="text-gray-400 text-4xl fas fa-newspaper"></i>
                </div>
                @endif
                <div class="p-6">
                    <div class="mb-2 text-gray-500 text-sm">
                        <i class="mr-1 far fa-calendar"></i>
                        {{ $post->published_at->format('d M Y') }}
                    </div>
                    <h3 class="mb-3 font-bold text-primary text-xl line-clamp-2">{{ $post->title }}</h3>
                    <p class="mb-4 text-gray-600 text-sm line-clamp-3">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                    <a href="{{ route('post.detail', $post->slug) }}" class="font-semibold text-primary hover:text-secondary transition">
                        Baca Selengkapnya <i class="fa-arrow-right ml-1 fas"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('posts') }}" class="inline-block bg-primary px-8 py-3 rounded-lg font-semibold text-white transition hover-primary">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>
@endif

<!-- Resolved Complaints / Testimonials Section -->
@if($resolvedComplaints->count() > 0)
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mb-12 text-center">
            <h2 class="mb-4 font-bold text-primary text-4xl">Pengaduan yang Telah Ditanggapi</h2>
            <p class="text-gray-600 text-lg">Transparansi pelayanan pengaduan masyarakat Desa Haria</p>
        </div>

        <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($resolvedComplaints as $complaint)
            <div class="bg-white shadow-lg hover:shadow-xl p-6 rounded-lg transition">
                <!-- Header Pengaduan -->
                <div class="flex justify-between items-start mb-4 pb-4 border-gray-200 border-b">
                    <div>
                        <div class="mb-1 font-semibold text-gray-500 text-xs">{{ $complaint->nomor_pengaduan }}</div>
                        <h3 class="font-bold text-primary text-lg line-clamp-2">{{ $complaint->judul }}</h3>
                    </div>
                    <span class="bg-green-100 px-3 py-1 rounded-full font-semibold text-green-800 text-xs whitespace-nowrap">
                        Selesai
                    </span>
                </div>

                <!-- Isi Pengaduan -->
                <div class="mb-4">
                    <p class="text-gray-600 text-sm line-clamp-3">{{ $complaint->isi_laporan }}</p>
                </div>

                <!-- Tanggapan Admin -->
                @if($complaint->tanggapans->count() > 0)
                <div class="bg-blue-50 p-4 border-blue-500 border-l-4 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 bg-blue-500 mt-1 p-2 rounded-full text-white">
                            <i class="text-sm fa-reply fas"></i>
                        </div>
                        <div class="flex-1">
                            <div class="mb-1 font-semibold text-blue-900 text-sm">Tanggapan Perangkat Desa</div>
                            <p class="text-blue-800 text-sm line-clamp-3">{{ $complaint->tanggapans->first()->isi_tanggapan }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Footer -->
                <div class="flex justify-between items-center mt-4 pt-4 border-gray-200 border-t text-gray-500 text-xs">
                    <div>
                        <i class="mr-1 far fa-user"></i>
                        {{ Str::limit($complaint->nama_pelapor, 20) }}
                    </div>
                    <div>
                        <i class="mr-1 far fa-calendar"></i>
                        {{ $complaint->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <p class="mb-4 text-gray-600">
                <i class="mr-2 text-green-500 fas fa-check-circle"></i>
                <strong>{{ \App\Models\Pengaduan::where('status', 'selesai')->count() }}</strong> pengaduan telah diselesaikan
            </p>
            <a href="{{ route('pengaduan.create') }}" class="inline-block bg-primary hover:bg-blue-700 px-8 py-3 rounded-lg font-semibold text-white transition">
                <i class="mr-2 fas fa-comment-alt"></i> Sampaikan Pengaduan Anda
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="bg-primary py-16">
    <div class="mx-auto px-4 text-center container">
        <h2 class="mb-4 font-bold text-white text-4xl">Punya Pertanyaan atau Pengaduan?</h2>
        <p class="mb-8 text-gray-200 text-xl">Kami siap mendengarkan dan membantu Anda</p>
        <a href="{{ route('pengaduan.create') }}" class="inline-block bg-secondary hover:bg-yellow-400 px-8 py-3 rounded-lg font-semibold text-primary transition">
            <i class="mr-2 fas fa-comment-alt"></i> Sampaikan Pengaduan
        </a>
        <p class="mt-4 text-gray-300 text-sm">Login dengan Google untuk mengajukan pengaduan</p>
    </div>
</section>
@endsection
