@extends('layouts.public')

@section('title', 'Berita & Kegiatan - Negeri Haria')

@section('content')
<!-- Page Header -->
<section class="bg-primary py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Berita & Kegiatan</h1>
        <p class="text-xl text-gray-200">Update terbaru dari Negeri Haria</p>
    </div>
</section>

<!-- Posts Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover">
                @else
                <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-newspaper text-gray-400 text-5xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <i class="far fa-calendar mr-2"></i>
                        {{ $post->published_at->format('d F Y') }}
                    </div>
                    
                    <h2 class="text-2xl font-bold text-primary mb-3 line-clamp-2 hover:text-secondary transition">
                        <a href="{{ route('post.detail', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    
                    <p class="text-gray-600 mb-4 line-clamp-4">
                        {{ Str::limit(strip_tags($post->content), 200) }}
                    </p>
                    
                    <a href="{{ route('post.detail', $post->slug) }}" 
                       class="inline-block text-primary font-semibold hover:text-secondary transition">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-newspaper text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-xl">Belum ada berita yang dipublikasikan</p>
        </div>
        @endif
    </div>
</section>
@endsection
