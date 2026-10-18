@extends('layouts.public')

@section('title', 'Fasilitas Umum - Negeri Haria')

@push('styles')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    /* Remove Leaflet watermark */
    .leaflet-control-attribution {
        display: none !important;
    }
    
    /* MAP KECIL - 350px ONLY */
    #facilitiesMap {
        width: 100%;
        height: 350px;
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.2);
        border: 1px solid rgba(14, 165, 233, 0.2);
    }
    
    @media (max-width: 768px) {
        #facilitiesMap {
            height: 300px;
        }
    }
    
    /* Loading state */
    #facilitiesMap.loading {
        background: linear-gradient(135deg, #0EA5E9, #06B6D4, #14B8A6);
        background-size: 200% 200%;
        animation: shimmer 2s infinite;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    #facilitiesMap.loading::after {
        content: '🌊 Loading...';
        color: white;
        font-size: 1rem;
        font-weight: 600;
    }
    
    @keyframes shimmer {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    /* Marker hover */
    .custom-marker {
        transition: transform 0.2s;
        cursor: pointer;
    }
    
    .custom-marker:hover {
        transform: scale(1.15);
    }
    
    /* Popup compact */
    .leaflet-popup-content-wrapper {
        padding: 0;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(14, 165, 233, 0.2);
        border: 1px solid rgba(14, 165, 233, 0.3);
    }
    
    .leaflet-popup-content {
        margin: 0 !important;
        width: 250px !important;
    }
    
    .popup-header {
        background: linear-gradient(135deg, #0EA5E9, #06B6D4);
        padding: 0.75rem;
    }
    
    .popup-body {
        padding: 0.75rem;
        background: white;
    }
    
    .popup-footer {
        padding: 0 0.75rem 0.75rem;
        background: white;
    }
    
    .leaflet-popup-tip {
        background: #06B6D4 !important;
    }
    
    .leaflet-popup-close-button {
        color: white !important;
        font-size: 20px !important;
        padding: 6px 10px !important;
    }
    
    /* Controls compact */
    .leaflet-control-layers {
        border-radius: 0.5rem !important;
        box-shadow: 0 2px 8px rgba(14, 165, 233, 0.2) !important;
        border: 1px solid rgba(14, 165, 233, 0.2) !important;
        font-size: 0.85rem !important;
    }
    
    .leaflet-control-zoom {
        border-radius: 0.5rem !important;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(14, 165, 233, 0.2) !important;
        border: 1px solid rgba(14, 165, 233, 0.2) !important;
    }
    
    .leaflet-control-zoom a {
        width: 32px !important;
        height: 32px !important;
        line-height: 32px !important;
        font-size: 18px !important;
        background: white !important;
        color: #0EA5E9 !important;
        border-bottom: 1px solid rgba(14, 165, 233, 0.1) !important;
    }
    
    .leaflet-control-zoom a:hover {
        background: #0EA5E9 !important;
        color: white !important;
    }
    
    /* Info badge */
    .map-info-badge {
        background: rgba(255, 255, 255, 0.95);
        padding: 0.5rem 0.75rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(14, 165, 233, 0.2);
        border: 1px solid rgba(14, 165, 233, 0.2);
        font-size: 0.75rem;
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
                @if($facility->image)
                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" class="w-full h-56 object-cover">
                @else
                    <div class="flex justify-center items-center bg-gray-200 w-full h-56">
                        <i class="text-gray-400 text-5xl fas fa-building"></i>
                    </div>
                @endif

                <div class="p-6">
                    <h3 class="mb-4 font-bold text-primary text-2xl">{{ $facility->name }}</h3>

                    @if($facility->description)
                    <p class="mb-6 text-gray-600 leading-relaxed">
                        {{ $facility->description }}
                    </p>
                    @endif

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
                           class="block bg-primary hover:bg-blue-700 px-4 py-2 rounded-lg font-semibold text-white text-center transition">
                            <i class="mr-2 fas fa-directions"></i> Lihat di Google Maps
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

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
            <!-- Map Container -->
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

@endsection

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mapEl = document.getElementById('facilitiesMap');
    if (!mapEl) return;
    
    mapEl.classList.add('loading');

    try {
        // Init map - Negeri Haria center
        const map = L.map('facilitiesMap', {
            zoomControl: true,
            scrollWheelZoom: true,
            preferCanvas: true
        }).setView([-3.582142, 128.624756], 14);

        // OpenStreetMap (DEFAULT - ALWAYS WORKS)
        const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: ''
        });

        // CartoDB Voyager (Street map with ocean colors)
        const street = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
            attribution: ''
        });

        // Stamen Terrain (Topographic with coastal detail)
        const terrain = L.tileLayer('https://tiles.stadiamaps.com/tiles/stamen_terrain/{z}/{x}/{y}.jpg', {
            maxZoom: 18,
            attribution: ''
        });

        // Add default layer (OSM - most reliable)
        osm.addTo(map);
        
        setTimeout(() => mapEl.classList.remove('loading'), 1500);

        // Layer control - 3 FREE options
        L.control.layers({
            "🗺️ Standar": osm,
            "🌊 Pesisir": street,
            "⛰️ Terrain": terrain
        }, null, {
            position: 'topright',
            collapsed: false
        }).addTo(map);

        // Marker icons
        const icons = {
            blue: L.divIcon({
                html: '<div style="background:#3B82F6;width:32px;height:32px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 2px 8px rgba(59,130,246,0.4);border:2px solid white;display:flex;align-items:center;justify-content:center"><i class="fas fa-landmark" style="color:white;font-size:12px;transform:rotate(45deg)"></i></div>',
                className: 'custom-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            green: L.divIcon({
                html: '<div style="background:#10B981;width:32px;height:32px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 2px 8px rgba(16,185,129,0.4);border:2px solid white;display:flex;align-items:center;justify-content:center"><i class="fas fa-hospital" style="color:white;font-size:12px;transform:rotate(45deg)"></i></div>',
                className: 'custom-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            orange: L.divIcon({
                html: '<div style="background:#F59E0B;width:32px;height:32px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 2px 8px rgba(245,158,11,0.4);border:2px solid white;display:flex;align-items:center;justify-content:center"><i class="fas fa-school" style="color:white;font-size:12px;transform:rotate(45deg)"></i></div>',
                className: 'custom-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            cyan: L.divIcon({
                html: '<div style="background:#06B6D4;width:32px;height:32px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 2px 8px rgba(6,182,212,0.4);border:2px solid white;display:flex;align-items:center;justify-content:center"><i class="fas fa-fish" style="color:white;font-size:12px;transform:rotate(45deg)"></i></div>',
                className: 'custom-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            purple: L.divIcon({
                html: '<div style="background:#8B5CF6;width:32px;height:32px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 2px 8px rgba(139,92,246,0.4);border:2px solid white;display:flex;align-items:center;justify-content:center"><i class="fas fa-mosque" style="color:white;font-size:12px;transform:rotate(45deg)"></i></div>',
                className: 'custom-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            pink: L.divIcon({
                html: '<div style="background:#EC4899;width:32px;height:32px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 2px 8px rgba(236,72,153,0.4);border:2px solid white;display:flex;align-items:center;justify-content:center"><i class="fas fa-map-marker-alt" style="color:white;font-size:12px;transform:rotate(45deg)"></i></div>',
                className: 'custom-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            })
        };

        function getIcon(name) {
            const n = name.toLowerCase();
            if (n.includes('kantor') || n.includes('balai') || n.includes('pemerintah')) return icons.blue;
            if (n.includes('puskesmas') || n.includes('klinik') || n.includes('kesehatan')) return icons.green;
            if (n.includes('sekolah') || n.includes('sd') || n.includes('smp') || n.includes('sma')) return icons.orange;
            if (n.includes('pelabuhan') || n.includes('dermaga') || n.includes('nelayan') || n.includes('perikanan')) return icons.cyan;
            if (n.includes('masjid') || n.includes('gereja') || n.includes('musholla')) return icons.purple;
            return icons.pink;
        }

        // Add facilities
        const facilities = @json($facilities->filter(function($f) { return $f->latitude && $f->longitude; })->values());
        const bounds = [];
        
        facilities.forEach(f => {
            const marker = L.marker([f.latitude, f.longitude], {
                icon: getIcon(f.name),
                riseOnHover: true
            }).addTo(map);

            bounds.push([f.latitude, f.longitude]);

            const popup = `
                <div class="popup-header">
                    <h3 style="margin:0;font-size:0.9rem;font-weight:700;color:white">${f.name}</h3>
                </div>
                <div class="popup-body">
                    ${f.image ? `<img src="/storage/${f.image}" alt="${f.name}" style="width:100%;height:100px;object-fit:cover;border-radius:0.5rem;margin-bottom:0.5rem">` : ''}
                    ${f.description ? `<p style="font-size:0.75rem;color:#374151;margin-bottom:0.5rem;line-height:1.3">${f.description.substring(0, 80)}...</p>` : ''}
                </div>
                <div class="popup-footer">
                    <div style="font-size:0.7rem;color:#6B7280;margin-bottom:0.4rem">
                        <i class="fas fa-map-marker-alt" style="color:#0EA5E9"></i> ${f.latitude}, ${f.longitude}
                    </div>
                    <a href="https://www.google.com/maps/search/?api=1&query=${f.latitude},${f.longitude}" 
                       target="_blank"
                       style="display:block;background:linear-gradient(135deg,#0EA5E9,#06B6D4);color:white;padding:0.4rem 0.6rem;border-radius:0.4rem;text-decoration:none;font-size:0.75rem;font-weight:600;text-align:center">
                        <i class="fas fa-directions"></i> Navigasi
                    </a>
                </div>
            `;

            marker.bindPopup(popup, { maxWidth: 250 });
        });

        // Fit bounds
        if (bounds.length > 0) {
            map.fitBounds(bounds, { padding: [30, 30], maxZoom: 14 });
        }

        // Info badge
        const info = L.control({ position: 'bottomleft' });
        info.onAdd = function() {
            const div = L.DomUtil.create('div', 'map-info-badge');
            div.innerHTML = `
                <div style="display:flex;align-items:center">
                    <i class="fas fa-map-marked-alt" style="color:#0EA5E9;font-size:1rem;margin-right:0.4rem"></i>
                    <div>
                        <strong style="color:#0EA5E9;font-size:0.75rem">Negeri Haria</strong>
                        <span style="color:#6B7280;font-size:0.65rem;display:block">${facilities.length} Fasilitas</span>
                    </div>
                </div>
            `;
            return div;
        };
        info.addTo(map);

    } catch (error) {
        console.error('Map error:', error);
        mapEl.classList.remove('loading');
        mapEl.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#6B7280"><p>Error loading map</p></div>';
    }
});
</script>
@endpush
