@extends('layouts.public')

@section('title', 'Profil Negeri - Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="bg-primary py-16">
    <div class="mx-auto px-4 container">
        <div class="text-white text-center">
            <h1 class="mb-4 font-bold text-4xl md:text-5xl">Profil Negeri</h1>
            <p class="text-gray-200 text-xl">{{ $villageProfile->village_name ?? 'Negeri Haria' }}</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-white py-16">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-4xl">
            @if($villageProfile && $villageProfile->profile_overview)
                <div class="mb-8 max-w-none prose">
                    <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">{{ $villageProfile->profile_overview }}</p>
                </div>
            @else
                <p class="mb-8 text-gray-500 italic">Informasi Profil Negeri belum tersedia.</p>
            @endif

            @if($villageProfile)
            <div class="gap-6 grid grid-cols-1 md:grid-cols-2 mt-10">
                @if($villageProfile->address)
                <div class="flex items-start bg-gray-50 shadow-sm p-6 rounded-lg">
                    <i class="mt-1 mr-4 text-primary text-2xl fas fa-map-marker-alt"></i>
                    <div>
                        <p class="mb-2 font-bold text-gray-900 text-lg">Alamat</p>
                        <p class="text-gray-700">{{ $villageProfile->address }}</p>
                    </div>
                </div>
                @endif
                
                @if($villageProfile->phone)
                <div class="flex items-start bg-gray-50 shadow-sm p-6 rounded-lg">
                    <i class="mt-1 mr-4 text-primary text-2xl fas fa-phone"></i>
                    <div>
                        <p class="mb-2 font-bold text-gray-900 text-lg">Telepon</p>
                        <p class="text-gray-700">{{ $villageProfile->phone }}</p>
                    </div>
                </div>
                @endif
                
                @if($villageProfile->email)
                <div class="flex items-start bg-gray-50 shadow-sm p-6 rounded-lg">
                    <i class="mt-1 mr-4 text-primary text-2xl fas fa-envelope"></i>
                    <div>
                        <p class="mb-2 font-bold text-gray-900 text-lg">Email</p>
                        <p class="text-gray-700">{{ $villageProfile->email }}</p>
                    </div>
                </div>
                @endif
                
                @if($villageProfile->website)
                <div class="flex items-start bg-gray-50 shadow-sm p-6 rounded-lg">
                    <i class="mt-1 mr-4 text-primary text-2xl fas fa-globe"></i>
                    <div>
                        <p class="mb-2 font-bold text-gray-900 text-lg">Website</p>
                        <a href="{{ $villageProfile->website }}" target="_blank" class="text-blue-600 text-lg hover:underline">{{ $villageProfile->website }}</a>
                    </div>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
