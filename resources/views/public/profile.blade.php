@extends('layouts.public')

@section('title', 'Profil Desa - Desa Wisata Haria')

@section('content')
<!-- Page Header -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Profil Desa Haria</h1>
        <p class="text-xl text-gray-200">Mengenal lebih dekat Desa Wisata Haria</p>
    </div>
</section>

@if($villageProfile)
<!-- Village History -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-primary mb-6 flex items-center">
                    <i class="fas fa-book text-secondary mr-3"></i>
                    Sejarah Desa
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($villageProfile->history)) !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            <!-- Vision -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-eye text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-primary">Visi</h2>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed">
                    {{ $villageProfile->vision }}
                </p>
            </div>

            <!-- Mission -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-bullseye text-primary text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-primary">Misi</h2>
                </div>
                <div class="text-gray-700 text-lg leading-relaxed">
                    {!! nl2br(e($villageProfile->mission)) !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Village Officials -->
@if($officials->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary mb-4">Perangkat Desa</h2>
            <p class="text-gray-600 text-lg">Tim penggerak pembangunan Desa Haria</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            @foreach($officials as $official)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition text-center">
                @if($official->photo)
                <img src="{{ Storage::url($official->photo) }}" alt="{{ $official->name }}" class="w-full h-64 object-cover">
                @else
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-user text-gray-400 text-6xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-2">{{ $official->name }}</h3>
                    <p class="text-secondary font-semibold mb-2">{{ $official->position }}</p>
                    @if($official->phone)
                    <p class="text-gray-600 text-sm">
                        <i class="fas fa-phone mr-1"></i> {{ $official->phone }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Location Map -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary mb-4">Lokasi Desa</h2>
            <p class="text-gray-600 text-lg">Kecamatan Sabu Barat, Kabupaten Sabu Raijua</p>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-4">
            <!-- Placeholder for Google Maps -->
            <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-600">Peta lokasi akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info -->
<section class="py-16 bg-primary text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Informasi Kontak</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Alamat</h3>
                    <p class="text-gray-200">Desa Haria, Kec. Sabu Barat<br>Kab. Sabu Raijua, NTT</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Telepon</h3>
                    <p class="text-gray-200">+62 xxx xxxx xxxx</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Email</h3>
                    <p class="text-gray-200">info@desaharia.id</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
