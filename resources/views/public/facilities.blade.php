@extends('layouts.public')

@section('title', 'Fasilitas Umum - Negeri Haria')

@section('content')
<!-- Page Header -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Fasilitas Umum</h1>
        <p class="text-xl text-gray-200">Berbagai fasilitas publik yang tersedia di Negeri Haria</p>
    </div>
</section>

<!-- Facilities Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($facilities->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($facilities as $facility)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                <div class="p-8">
                    <!-- Icon -->
                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mb-6 mx-auto">
                        @if($facility->icon)
                            <i class="{{ $facility->icon }} text-secondary text-4xl"></i>
                        @else
                            <i class="fas fa-map-marker-alt text-secondary text-4xl"></i>
                        @endif
                    </div>

                    <!-- Name -->
                    <h3 class="text-2xl font-bold text-primary mb-4 text-center">{{ $facility->name }}</h3>

                    <!-- Description -->
                    @if($facility->description)
                    <p class="text-gray-600 mb-6 text-center leading-relaxed">
                        {{ $facility->description }}
                    </p>
                    @endif

                    <!-- Location (GPS) -->
                    @if($facility->latitude && $facility->longitude)
                    <div class="border-t pt-4 mt-4">
                        <div class="flex items-center justify-center text-gray-600 mb-3">
                            <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                            <span class="font-semibold">Koordinat GPS</span>
                        </div>
                        <div class="text-center text-sm text-gray-500 mb-3">
                            {{ $facility->latitude }}, {{ $facility->longitude }}
                        </div>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $facility->latitude }},{{ $facility->longitude }}" 
                           target="_blank"
                           class="block text-center bg-primary text-white px-4 py-2 rounded-lg font-semibold hover-primary transition">
                            <i class="fas fa-directions mr-2"></i> Lihat di Google Maps
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
        <div class="text-center py-16">
            <i class="fas fa-building text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-xl">Belum ada fasilitas yang ditampilkan</p>
        </div>
        @endif
    </div>
</section>

<!-- Map Section (Optional) -->
@if($facilities->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary mb-4">Peta Fasilitas</h2>
            <p class="text-gray-600 text-lg">Lokasi fasilitas umum di Negeri Haria</p>
        </div>

        <div class="max-w-6xl mx-auto bg-gray-200 rounded-lg p-4">
            <!-- Placeholder for interactive map -->
            <div class="w-full h-96 bg-gray-300 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-600">Peta interaktif akan ditampilkan di sini</p>
                    <p class="text-gray-500 text-sm mt-2">Integrasi Google Maps akan ditambahkan</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
