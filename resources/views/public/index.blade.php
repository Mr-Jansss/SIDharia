@extends('layouts.public')

@section('title', 'Beranda - Negeri Haria')

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
                                Jelajahi Potensi Negeri
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
                    <span class="text-secondary">Negeri Haria</span>
                </h1>
                <p class="mb-8 text-gray-200 text-xl">
                    Jelajahi keindahan alam, budaya lokal, dan produk unggulan dari masyarakat Haria di Kecamatan Saparua, Maluku Tengah.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('potentials') }}" class="bg-secondary hover:bg-yellow-400 px-8 py-3 rounded-lg font-semibold text-primary transition">
                        Jelajahi Potensi
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

<!-- Leader Greeting Section -->
@if($leaderGreeting)
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-5xl">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="gap-0 grid grid-cols-1 md:grid-cols-3">
                    <!-- Photo Section -->
                    <div class="flex justify-center items-center md:col-span-1 bg-primary p-8">
                        @if($leaderGreeting->leader_photo)
                            <div class="relative">
                                <img src="{{ Storage::url($leaderGreeting->leader_photo) }}" 
                                     alt="{{ $leaderGreeting->leader_name }}" 
                                     class="shadow-xl border-4 border-white rounded-lg w-48 h-48 object-cover">
                            </div>
                        @else
                            <div class="flex justify-center items-center bg-white/20 rounded-lg w-48 h-48">
                                <i class="text-white text-6xl fas fa-user"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Greeting Content -->
                    <div class="md:col-span-2 p-8 md:p-10">
                        <div class="mb-4">
                            <h3 class="mb-2 font-bold text-primary text-2xl md:text-3xl">
                                {{ $leaderGreeting->leader_name }}
                            </h3>
                            <p class="font-semibold text-secondary text-lg">
                                {{ $leaderGreeting->leader_position }}
                            </p>
                        </div>
                        
                        <div class="relative">
                            <!-- Greeting Text -->
                            <div class="text-gray-700 text-base md:text-lg leading-relaxed">
                                <p class="italic">{{ $leaderGreeting->greeting_text }}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
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
            <h2 class="mb-4 font-bold text-primary text-4xl">Potensi Unggulan</h2>
            <p class="text-gray-600 text-lg">Temukan destinasi wisata menarik di Negeri Haria</p>
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
                Lihat Semua Potensi Negeri
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
            <p class="text-gray-600 text-lg">Dukung produk lokal dari masyarakat Negeri Haria</p>
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
            <p class="text-gray-600 text-lg">Update terbaru dari Negeri Haria</p>
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

<!-- Peta Negeri Haria Section -->
<section class="bg-white py-16">
    <div class="mx-auto px-4 container">
        <div class="mb-12 text-center">
            <h2 class="mb-4 font-bold text-primary text-4xl">Peta Wilayah Negeri Haria</h2>
            <p class="text-gray-600 text-lg">Lokasi Negeri Haria di Kecamatan Saparua, Maluku Tengah</p>
        </div>

        <div class="mx-auto max-w-4xl">
            <div class="relative bg-white shadow-2xl border border-gray-200 rounded-xl overflow-hidden" style="height: 600px;">
                <div id="village-map" style="width: 100%; height: 100%;"></div>
            </div>
            
            <div class="bg-blue-50 mt-6 p-4 border border-blue-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <i class="mt-1 text-blue-600 fas fa-info-circle"></i>
                    <div class="text-blue-800 text-sm">
                        <p class="mb-1 font-semibold">Informasi Peta</p>
                        <p>Peta menampilkan wilayah Negeri Haria dengan batas-batas geografisnya. Anda dapat menggeser dan zoom untuk melihat detail area.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Resolved Complaints / Testimonials Section -->
@if($resolvedComplaints->count() > 0)
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mb-12 text-center">
            <h2 class="mb-4 font-bold text-primary text-4xl">Pengaduan yang Telah Ditanggapi</h2>
            <p class="text-gray-600 text-lg">Transparansi pelayanan pengaduan masyarakat Negeri Haria</p>
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
                        {{ Str::limit($complaint->getDisplayName(), 20) }}
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

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
<style>
    #village-map {
        border-radius: 0.75rem;
        background: #1e3a8a;
        z-index: 0;
        min-height: 600px !important;
    }
    
    .leaflet-container {
        background: #1e3a8a !important;
        width: 100% !important;
        height: 100% !important;
        min-height: 600px !important;
        border-radius: 0.75rem;
    }
    
    .leaflet-control-attribution {
        display: none !important;
    }
    
    .leaflet-tile-pane {
        opacity: 1;
    }
    
    .leaflet-tile {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
    }
    
    /* Ensure map fills entire container */
    .leaflet-map-pane,
    .leaflet-tile-container,
    .leaflet-overlay-pane {
        width: 100% !important;
        height: 100% !important;
    }
    
    /* Zoom control buttons styling */
    .leaflet-control-zoom {
        margin: 10px !important;
        border: 2px solid rgba(0,0,0,0.2) !important;
        border-radius: 4px !important;
        box-shadow: 0 1px 5px rgba(0,0,0,0.4) !important;
    }
    
    .leaflet-control-zoom a {
        width: 30px !important;
        height: 30px !important;
        line-height: 30px !important;
        font-size: 18px !important;
        font-weight: bold !important;
        text-align: center !important;
        text-decoration: none !important;
        color: #333 !important;
        background-color: white !important;
        display: block !important;
        border-bottom: 1px solid #ccc !important;
    }
    
    .leaflet-control-zoom a:hover {
        background-color: #f4f4f4 !important;
        color: #000 !important;
    }
    
    .leaflet-control-zoom a:last-child {
        border-bottom: none !important;
        border-radius: 0 0 2px 2px !important;
    }
    
    .leaflet-control-zoom a:first-child {
        border-radius: 2px 2px 0 0 !important;
    }
    
    .leaflet-control-zoom-in,
    .leaflet-control-zoom-out {
        cursor: pointer !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Small delay to ensure container is fully rendered
    setTimeout(function() {
        const mapEl = document.getElementById('village-map');
        
        // Koordinat batas Negeri Haria
        const center = [-3.582491, 128.619344]; // Tengah negeri
        
        // Init map with explicit size
        const map = L.map('village-map', {
            center: center,
            zoom: 16,
            minZoom: 14,
            maxZoom: 18,
            scrollWheelZoom: false,  // Disable scroll wheel zoom
            doubleClickZoom: false,  // Disable double click zoom
            dragging: true,          // Enable dragging/panning
            zoomControl: true,       // Keep +/- buttons
            attributionControl: false
        });

        // Satellite tile layer from ArcGIS
        const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            minZoom: 14,
            tileSize: 256,
            updateWhenIdle: false,
            keepBuffer: 4,
            crossOrigin: true
        });
        
        satelliteLayer.addTo(map);

        // Label overlay from CartoDB
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
            maxZoom: 18,
            subdomains: 'abcd',
            updateWhenIdle: false
        }).addTo(map);

        // Force map to recalculate size and fill container properly
        setTimeout(function() {
            map.invalidateSize(true);
            map.setView(center, 16); // Re-center after invalidate
        }, 250);

        // Marker untuk titik tengah Negeri Haria
        const centerIcon = L.divIcon({
            html: `<div style="background:#00529B;width:40px;height:40px;border-radius:50%;border:3px solid white;box-shadow:0 4px 12px rgba(0,82,155,0.5);display:flex;align-items:center;justify-content:center;"><i class="fas fa-home" style="color:white;font-size:16px;"></i></div>`,
            className: '',
            iconSize: [40, 40],
            iconAnchor: [20, 20]
        });

        const marker = L.marker(center, {icon: centerIcon})
            .addTo(map)
            .bindPopup(`
                <div style="text-align:center;padding:8px;">
                    <h3 style="margin:0 0 8px 0;color:#00529B;font-weight:bold;font-size:16px;">Negeri Haria</h3>
                    <p style="margin:0;font-size:12px;color:#666;">Kecamatan Saparua<br>Kabupaten Maluku Tengah</p>
                </div>
            `);
    }, 100);
});
</script>
@endpush
