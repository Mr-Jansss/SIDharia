@extends('layouts.public')

@section('title', 'Fasilitas Umum - Negeri Haria')

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

@endsection
