@extends('layouts.public')

@section('title', $post->title . ' - Desa Wisata Haria')

@section('content')
<!-- Hero Image -->
<section class="relative h-96 bg-gray-900">
    @if($post->image)
    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-80">
    @else
    <div class="w-full h-full bg-gray-700 flex items-center justify-center">
        <i class="fas fa-newspaper text-gray-500 text-8xl"></i>
    </div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
</section>

<!-- Content Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <article class="max-w-4xl mx-auto">
            <!-- Post Header -->
            <div class="mb-8">
                <div class="flex items-center text-gray-500 mb-4">
                    <i class="far fa-calendar mr-2"></i>
                    {{ $post->published_at->format('d F Y') }}
                    <span class="mx-3">•</span>
                    <i class="far fa-clock mr-2"></i>
                    {{ $post->published_at->format('H:i') }} WIT
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4 leading-tight">
                    {{ $post->title }}
                </h1>
            </div>

            <!-- Post Content -->
            <div class="prose prose-lg max-w-none">
                <div class="text-gray-700 leading-relaxed text-justify">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="mt-12 pt-8 border-t">
                <h3 class="text-xl font-bold text-primary mb-4">Bagikan Berita Ini</h3>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post.detail', $post->slug)) }}" 
                       target="_blank"
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f mr-2"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('post.detail', $post->slug)) }}&text={{ urlencode($post->title) }}" 
                       target="_blank"
                       class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . route('post.detail', $post->slug)) }}" 
                       target="_blank"
                       class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                    </a>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-12">
                <a href="{{ route('posts') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-lg font-semibold hover-primary transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Berita
                </a>
            </div>
        </article>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-primary mb-8 text-center">Berita Lainnya</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @foreach($relatedPosts as $related)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($related->image)
                <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-newspaper text-gray-400 text-4xl"></i>
                </div>
                @endif
                <div class="p-6">
                    <div class="text-gray-500 text-sm mb-2">
                        <i class="far fa-calendar mr-1"></i>
                        {{ $related->published_at->format('d M Y') }}
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2 line-clamp-2">{{ $related->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit(strip_tags($related->content), 80) }}</p>
                    <a href="{{ route('post.detail', $related->slug) }}" class="text-primary font-semibold hover:text-secondary transition">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
