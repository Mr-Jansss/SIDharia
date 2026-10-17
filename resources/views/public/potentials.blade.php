@extends('layouts.public')

@section('title', 'Potensi Wisata - Negeri Haria')

@section('content')
<!-- Page Header -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Potensi Wisata</h1>
        <p class="text-xl text-gray-200">Jelajahi keindahan alam dan budaya Negeri Haria</p>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-white border-b">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('potentials') }}" 
               class="px-6 py-2 rounded-full font-semibold transition {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Semua
            </a>
            <a href="{{ route('potentials', ['category' => 'wisata']) }}" 
               class="px-6 py-2 rounded-full font-semibold transition {{ request('category') == 'wisata' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Wisata
            </a>
            <a href="{{ route('potentials', ['category' => 'alam']) }}" 
               class="px-6 py-2 rounded-full font-semibold transition {{ request('category') == 'alam' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Alam
            </a>
            <a href="{{ route('potentials', ['category' => 'budaya']) }}" 
               class="px-6 py-2 rounded-full font-semibold transition {{ request('category') == 'budaya' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Budaya
            </a>
        </div>
    </div>
</section>

<!-- Potentials Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($potentials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($potentials as $potential)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($potential->image)
                <img src="{{ Storage::url($potential->image) }}" alt="{{ $potential->name }}" class="w-full h-64 object-cover">
                @else
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-5xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <span class="bg-secondary text-primary text-xs px-3 py-1 rounded-full font-semibold uppercase">
                        {{ $potential->category }}
                    </span>
                    <h3 class="text-2xl font-bold text-primary mt-3 mb-3">{{ $potential->name }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($potential->description, 150) }}</p>
                    <a href="{{ route('potential.detail', $potential->id) }}" 
                       class="inline-block bg-primary text-white px-6 py-2 rounded-lg font-semibold hover-primary transition">
                        Lihat Detail <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $potentials->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-mountain text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-xl">Belum ada potensi wisata yang ditampilkan</p>
        </div>
        @endif
    </div>
</section>
@endsection
