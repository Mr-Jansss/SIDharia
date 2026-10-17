@extends('layouts.public')

@section('title', 'Struktur Organisasi - Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Struktur Organisasi</h1>
            <p class="text-xl text-gray-200">{{ $villageProfile->village_name ?? 'Negeri Haria' }}</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            @if($villageProfile && $villageProfile->struktur_organisasi)
                <div class="prose prose-lg max-w-none mb-12">
                    <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">{{ $villageProfile->struktur_organisasi }}</p>
                </div>
            @else
                <p class="text-gray-500 italic text-center text-lg mb-12">Informasi struktur organisasi belum tersedia.</p>
            @endif

            <!-- Display Officials -->
            @if($officials && $officials->count() > 0)
            <div class="mt-12">
                <h2 class="text-3xl font-bold text-primary mb-8 text-center">Perangkat Desa</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($officials as $official)
                    <div class="text-center bg-gray-50 p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        @if($official->photo)
                        <img src="{{ Storage::url($official->photo) }}" alt="{{ $official->name }}" class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-primary shadow-lg">
                        @else
                        <div class="w-28 h-28 rounded-full mx-auto mb-4 bg-gray-200 flex items-center justify-center border-4 border-primary shadow-lg">
                            <i class="fas fa-user text-gray-400 text-4xl"></i>
                        </div>
                        @endif
                        <h3 class="font-bold text-gray-900 text-lg mb-1">{{ $official->name }}</h3>
                        <p class="text-sm text-primary font-semibold">{{ $official->position }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
