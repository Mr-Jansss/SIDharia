@extends('layouts.public')

@section('title', 'Pemerintahan - Desa Wisata Haria')

@section('content')
<!-- Hero Section -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Pemerintahan</h1>
            <p class="text-xl text-gray-200">{{ $villageProfile->village_name ?? 'Desa Wisata Haria' }}</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            @if($villageProfile && $villageProfile->pemerintahan)
                <div class="prose prose-lg max-w-none">
                    <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">{{ $villageProfile->pemerintahan }}</p>
                </div>
            @else
                <p class="text-gray-500 italic text-center text-lg">Informasi pemerintahan desa belum tersedia.</p>
            @endif
        </div>
    </div>
</section>
@endsection
