@extends('layouts.public')

@section('title', 'Fasilitas Umum - Negeri Haria')

@push('styles')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    /* Remove Leaflet watermark/attribution */
    .leaflet-control-attribution {
        display: none !important;
    }
    
    /* Compact map - smaller height */
    #facilitiesMap {
        width: 100%;
        height: 400px; /* Reduced from 650px */
        border-radius: 0.75rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
    }
    
    @media (max-width: 768px) {
        #facilitiesMap {
            height: 350px; /* Even smaller on mobile */
            border-radius: 0.5rem;
        }
    }
    
    /* Faster loading skeleton */
    #facilitiesMap.loading {
        background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 50%, #e5e7eb 75%);
        background-size: 200% 100%;
        animation: loading 1.5s ease-in-out infinite;
    }
    
    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
    
    /* Compact marker */
    .custom-marker {
        transition: transform 0.2s ease;
    }
    
    .custom-marker:hover {
        transform: scale(1.15);
    }
    
    /* Smaller popup */
    .leaflet-popup-content-wrapper {
        border-radius: 0.75rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        border: 1px solid #3b82f6;
    }
    
    .leaflet-popup-content {
        margin: 0.75rem;
        font-family: inherit;
    }
    
    .leaflet-popup-tip {
        border-top-color: #3b82f6 !important;
    }
    
    /* Compact controls */
    .leaflet-control-layers {
        border-radius: 0.5rem !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
        border: 1px solid #e5e7eb !important;
        font-size: 0.875rem !important;
    }
    
    .leaflet-control-zoom {
        border-radius: 0.5rem !important;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
        border: none !important;
    }
    
    .leaflet-control-zoom a {
        font-size: 16px !important;
        font-weight: bold !important;
        background-color: white !important;
        color: #1e40af !important;
        width: 28px !important;
        height: 28px !important;
        line-height: 28px !important;
        border: none !important;
    }
    
    .leaflet-control-zoom a:hover {
        background-color: #1e40af !important;
        color: white !important;
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<section class="bg-primary py-16">
    <div class="mx-auto px-4 text-center container">
        <h1 class="mb-4 font-bold text-white text-4xl md:text-5xl">Fasilitas Umum</h1>
        <p class="text-gray-200 text-xl">Berbagai fasilitas publik yang tersedia di Negeri Haria</p>
    </div>
</section>

<!-- Facilities Grid -->
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        @if($facilities->count() > 0)
        <div class="gap-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($facilities as $facility)
            <div class="bg-white shadow-lg hover:shadow-xl rounded-lg overflow-hidden transition">
                <!-- Image -->
                @if($facility->image)
                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" class="w-full h-56 object-cover">
                @else
                    <div class="flex justify-center items-center bg-gray-200 w-full h-56">
                        <i class="text-gray-400 text-5xl fas fa-building"></i>
                    </div>
                @endif

                <div class="p-6">
                    <!-- Name -->
                    <h3 class="mb-4 font-bold text-primary text-2xl">{{ $facility->name }}</h3>

                    <!-- Description -->
                    @if($facility->description)
                    <p class="mb-6 text-gray-600 leading-relaxed">
                        {{ $facility->description }}
                    </p>
                    @endif

                    <!-- Location (GPS) -->
                    @if($facility->latitude && $facility->longitude)
                    <div class="mt-4 pt-4 border-t">
                        <div class="flex items-center mb-3 text-gray-600">
                            <i class="mr-2 text-primary fas fa-map-marker-alt"></i>
                            <span class="font-semibold">Lokasi GPS</span>
                        </div>
                        <div class="mb-3 text-gray-500 text-sm">
                            {{ $facility->latitude }}, {{ $facility->longitude }}
                        </div>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $facility->latitude }},{{ $facility->longitude }}" 
                           target="_blank"
                           class="block bg-primary px-4 py-2 rounded-lg font-semibold text-white text-center transition hover-primary">
                            <i class="mr-2 fas fa-directions"></i> Lihat di Google Maps
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $facilities->links() }}
        </div>
        @else
        <div class="py-16 text-center">
            <i class="mb-4 text-gray-300 text-6xl fas fa-building"></i>
            <p class="text-gray-500 text-xl">Belum ada fasilitas yang ditampilkan</p>
        </div>
        @endif
    </div>
</section>

<!-- Interactive Map Section -->
@if($facilities->count() > 0)
<section class="bg-white py-16">
    <div class="mx-auto px-4 container">
        <div class="mb-12 text-center">
            <h2 class="mb-4 font-bold text-primary text-4xl">Peta Interaktif Fasilitas</h2>
            <p class="text-gray-600 text-lg">Lokasi fasilitas umum di Negeri Haria</p>
        </div>

        <div class="mx-auto max-w-6xl">
            <!-- Leaflet Map -->
            <div class="shadow-2xl rounded-lg overflow-hidden">
                <div id="facilitiesMap"></div>
            </div>

            <!-- Map Info -->
            <div class="bg-blue-50 mt-6 p-4 border border-blue-200 rounded-lg">
                <div class="flex items-start">
                    <i class="mt-1 mr-3 text-blue-600 fas fa-info-circle"></i>
                    <div>
                        <p class="mb-1 font-semibold text-blue-800 text-sm">Informasi Peta</p>
                        <p class="text-blue-700 text-xs">
                            Klik pada marker <i class="text-blue-600 fas fa-map-marker-alt"></i> untuk melihat detail fasilitas. Anda dapat zoom in/out dan drag peta untuk melihat area sekitar.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Facility List with Quick Access -->
            <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mt-8">
                @foreach($facilities->take(6) as $facility)
                    @if($facility->latitude && $facility->longitude)
                    <a href="https://www.google.com/maps/search/?api=1&query={{ $facility->latitude }},{{ $facility->longitude }}" 
                       target="_blank"
                       class="flex items-center bg-white hover:shadow-md p-4 border border-gray-200 hover:border-primary rounded-lg transition">
                        <div class="flex flex-shrink-0 justify-center items-center bg-primary mr-4 rounded-full w-12 h-12">
                            <i class="text-white fas fa-map-marker-alt"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 text-sm truncate">{{ $facility->name }}</p>
                            <p class="text-gray-500 text-xs">{{ $facility->latitude }}, {{ $facility->longitude }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="text-gray-400 fas fa-external-link-alt"></i>
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mapElement = document.getElementById('facilitiesMap');
        mapElement.classList.add('loading');

        // Initialize map with better performance settings
        const map = L.map('facilitiesMap', {
            zoomControl: true,
            scrollWheelZoom: true,
            doubleClickZoom: true,
            touchZoom: true,
            zoomAnimation: true,
            fadeAnimation: true,
            markerZoomAnimation: true,
            preferCanvas: true // Better performance
        }).setView([-3.582142, 128.624756], 14);

        // Satellite View - Default (faster loading)
        const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            attribution: '',
            updateWhenIdle: true, // Load tiles only when map stops moving
            keepBuffer: 2 // Reduce memory usage
        });

        // Street View
        const streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '',
            updateWhenIdle: true
        });

        // Add default layer
        satelliteLayer.addTo(map);
        
        // Remove loading state when tiles load
        satelliteLayer.on('load', function() {
            mapElement.classList.remove('loading');
        });

        // Layer Control - Collapsed to save space
        const baseMaps = {
            "🛰️ Satelit": satelliteLayer,
            "🗺️ Peta": streetLayer
        };

        L.control.layers(baseMaps, null, {
            position: 'topright',
            collapsed: true // Collapsed by default to save space
        }).addTo(map);

        // Compact marker icon (smaller, no animation)
        const customIcon = L.divIcon({
            html: '<i class="fas fa-map-marker-alt" style="font-size: 32px; color: #3b82f6; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));"></i>',
            className: 'custom-marker',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        // Add markers
        const facilities = @json($facilities->filter(function($f) { return $f->latitude && $f->longitude; })->values());
        const markers = [];
        
        facilities.forEach(facility => {
            const marker = L.marker([facility.latitude, facility.longitude], {
                icon: customIcon
            }).addTo(map);

            markers.push([facility.latitude, facility.longitude]);

            // Compact popup
            let popupContent = `
                <div style="min-width: 200px; max-width: 280px;">
                    ${facility.image ? `
                        <img src="/storage/${facility.image}" 
                             alt="${facility.name}" 
                             style="width: 100%; height: 100px; object-fit: cover; border-radius: 0.5rem; margin-bottom: 0.5rem;">
                    ` : ''}
                    <h3 style="font-weight: 700; font-size: 1rem; color: #1e40af; margin-bottom: 0.375rem;">${facility.name}</h3>
                    ${facility.description ? `<p style="font-size: 0.8rem; color: #4b5563; margin-bottom: 0.5rem; line-height: 1.4;">${facility.description.substring(0, 80)}${facility.description.length > 80 ? '...' : ''}</p>` : ''}
                    <a href="https://www.google.com/maps/search/?api=1&query=${facility.latitude},${facility.longitude}" 
                       target="_blank"
                       style="display: block; background: #1e40af; color: white; padding: 0.5rem; border-radius: 0.375rem; text-decoration: none; font-size: 0.8rem; font-weight: 600; text-align: center;">
                        <i class="fas fa-directions"></i> Navigasi
                    </a>
                </div>
            `;

            marker.bindPopup(popupContent, {
                maxWidth: 280,
                className: 'custom-popup'
            });
        });

        // Auto-fit with better performance
        if (markers.length > 1) {
            map.fitBounds(L.latLngBounds(markers), { 
                padding: [30, 30],
                maxZoom: 15,
                animate: false // Faster initial load
            });
        } else if (markers.length === 1) {
            map.setView(markers[0], 15, { animate: false });
        }

        // Compact info badge
        const info = L.control({position: 'bottomleft'});
        info.onAdd = function() {
            const div = L.DomUtil.create('div', 'info');
            div.style.cssText = `
                background: rgba(255, 255, 255, 0.95);
                padding: 0.5rem 0.75rem;
                border-radius: 0.5rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                font-size: 0.75rem;
                color: #4b5563;
                border: 1px solid #e5e7eb;
            `;
            div.innerHTML = `<strong style="color: #1e40af;">📍 ${facilities.length}</strong> Fasilitas`;
            return div;
        };
        info.addTo(map);
    });
</script>
@endpush
@endsection
