@extends('layouts.public')

@section('title', 'Visi & Misi - Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Visi & Misi</h1>
            <p class="text-xl text-gray-200">{{ $villageProfile->village_name ?? 'Negeri Haria' }}</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            @if($villageProfile && $villageProfile->visi)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-primary mb-6 flex items-center">
                        <i class="fas fa-eye mr-3"></i> Visi
                    </h2>
                    <div class="bg-blue-50 border-l-4 border-primary p-6 rounded-r-lg">
                        <p class="text-gray-800 text-lg leading-relaxed whitespace-pre-line">{{ $villageProfile->visi }}</p>
                    </div>
                </div>
            @endif

            @if($villageProfile && $villageProfile->misi)
                <div>
                    <h2 class="text-3xl font-bold text-primary mb-6 flex items-center">
                        <i class="fas fa-list-check mr-3"></i> Misi
                    </h2>
                    <div class="space-y-4">
                        @foreach(explode("\n", $villageProfile->misi) as $index => $misi)
                            @if(trim($misi))
                                <div class="flex items-start bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                                    <span class="flex-shrink-0 w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">{{ $index + 1 }}</span>
                                    <p class="text-gray-700 text-lg leading-relaxed pt-2">{{ trim($misi) }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!$villageProfile || (!$villageProfile->visi && !$villageProfile->misi))
                <p class="text-gray-500 italic text-center text-lg">Informasi visi & misi belum tersedia.</p>
            @endif
        </div>
    </div>
</section>
@endsection
