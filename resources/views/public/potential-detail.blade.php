@extends('layouts.public')

@section('title', $potential->name . ' - Negeri Haria')

@section('content')
<!-- Hero Image -->
<section class="relative h-96 bg-gray-900">
    @if($potential->image)
    <img src="{{ Storage::url($potential->image) }}" alt="{{ $potential->name }}" class="w-full h-full object-cover opacity-80">
    @else
    <div class="w-full h-full bg-gray-700 flex items-center justify-center">
        <i class="fas fa-image text-gray-500 text-8xl"></i>
    </div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 p-8">
        <div class="container mx-auto">
            <span class="bg-secondary text-primary text-sm px-4 py-2 rounded-full font-semibold uppercase">
                {{ $potential->category }}
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mt-4">{{ $potential->name }}</h1>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Description -->
            <div class="prose prose-lg max-w-none mb-8">
                <h2 class="text-3xl font-bold text-primary mb-4">Deskripsi</h2>
                <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($potential->description)) !!}
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-12">
                <a href="{{ route('potentials') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-lg font-semibold hover-primary transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Wisata
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Potentials -->
@if($relatedPotentials->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-primary mb-8 text-center">Wisata Lainnya</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @foreach($relatedPotentials as $related)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($related->image)
                <img src="{{ Storage::url($related->image) }}" alt="{{ $related->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-2">{{ $related->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($related->description, 80) }}</p>
                    <a href="{{ route('potential.detail', $related->id) }}" class="text-primary font-semibold hover:text-secondary transition">
                        Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
