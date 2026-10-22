@extends('layouts.public')

@section('title', 'Peraturan Negeri - Negeri Haria')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="z-10 relative mx-auto px-4 container">
        <div class="text-white text-center">
            <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm mb-4 px-6 py-2 rounded-full">
                <i class="mr-2 fas fa-gavel"></i>
                <span class="font-semibold text-sm uppercase tracking-wider">Tata Tertib & Peraturan</span>
            </div>
            <h1 class="mb-4 font-bold text-4xl md:text-5xl">Peraturan Negeri Haria</h1>
            <p class="mx-auto max-w-2xl text-blue-100 text-xl">
                Panduan dan aturan yang mengatur kehidupan masyarakat Negeri Haria
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-16">
    <div class="mx-auto px-4 container">
        <div class="mx-auto max-w-5xl">
            @if($villageProfile && $villageProfile->peraturan_negeri)
                <!-- Introduction Card -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 shadow-md mb-8 p-6 border-blue-600 border-l-4 rounded-lg">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex justify-center items-center bg-blue-600 rounded-full w-12 h-12 text-white">
                                <i class="text-xl fas fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="mb-2 font-bold text-blue-900 text-lg">Tentang Peraturan Ini</h3>
                            <p class="text-blue-800 text-sm leading-relaxed">
                                Peraturan Negeri Haria disusun berdasarkan musyawarah masyarakat dan nilai-nilai adat istiadat yang telah diwariskan secara turun-temurun. Setiap warga negeri diharapkan memahami dan mentaati peraturan ini demi keharmonisan bersama.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content with Better Typography -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="p-8 md:p-12">
                        <div class="max-w-none prose prose-lg peraturan-content">
                            {!! nl2br(e($villageProfile->peraturan_negeri)) !!}
                        </div>
                    </div>
                </div>

                <!-- Footer Info -->
                <div class="bg-white shadow-md mt-8 p-6 rounded-lg">
                    <div class="flex md:flex-row flex-col justify-between items-center">
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="flex justify-center items-center bg-green-100 mr-3 rounded-full w-10 h-10 text-green-600">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 text-sm">Berlaku sejak</p>
                                <p class="text-gray-500 text-xs">1 Januari 2025</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex justify-center items-center bg-blue-100 mr-3 rounded-full w-10 h-10 text-blue-600">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 text-sm">Disahkan oleh</p>
                                <p class="text-gray-500 text-xs">Saniri Negeri Haria</p>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <!-- Empty State -->
                <div class="bg-white shadow-lg p-12 rounded-xl text-center">
                    <div class="mx-auto max-w-md">
                        <div class="inline-flex justify-center items-center bg-gray-100 mb-6 rounded-full w-20 h-20">
                            <i class="text-gray-400 text-4xl fas fa-file-alt"></i>
                        </div>
                        <h3 class="mb-3 font-bold text-gray-800 text-2xl">Peraturan Belum Tersedia</h3>
                        <p class="mb-6 text-gray-600">
                            Peraturan Negeri saat ini sedang dalam proses penyusunan dan akan segera dipublikasikan.
                        </p>
                        <a href="{{ route('profile') }}" class="inline-flex items-center font-semibold text-blue-600 hover:text-blue-700">
                            <i class="fa-arrow-left mr-2 fas"></i>
                            Kembali ke Profil Negeri
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@push('styles')
<style>
    /* Custom Styling for Peraturan Content */
    .peraturan-content {
        color: #374151;
        line-height: 1.8;
    }
    
    .peraturan-content strong,
    .peraturan-content b {
        color: #1e40af;
        font-weight: 700;
        font-size: 1.1em;
        display: block;
        margin-top: 2rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #dbeafe;
    }
    
    /* Style for section dividers (====) */
    .peraturan-content br + br {
        display: block;
        content: "";
        margin-top: 1.5rem;
    }
    
    /* Better list styling */
    .peraturan-content ol,
    .peraturan-content ul {
        margin-left: 1.5rem;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .peraturan-content li {
        margin-bottom: 0.5rem;
        padding-left: 0.5rem;
    }
    
    /* Print styles */
    @media print {
        .peraturan-content {
            color: #000;
        }
        nav, footer, button {
            display: none !important;
        }
    }
</style>
@endpush

@endsection
