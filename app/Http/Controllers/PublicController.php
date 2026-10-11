<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use App\Models\Official;
use App\Models\Potential;
use App\Models\Facility;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Homepage
    public function index()
    {
        $villageProfile = VillageProfile::first();
        $featuredPotentials = Potential::latest()->take(4)->get();
        $latestProducts = Product::latest()->take(6)->get();
        $latestPosts = Post::where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.index', compact(
            'villageProfile',
            'featuredPotentials',
            'latestProducts',
            'latestPosts'
        ));
    }

    // Profil Desa
    public function profile()
    {
        $villageProfile = VillageProfile::first();
        $officials = Official::orderBy('order')->get();

        return view('public.profile', compact('villageProfile', 'officials'));
    }

    // Potensi Wisata
    public function potentials(Request $request)
    {
        $query = Potential::query();

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $potentials = $query->latest()->paginate(12);

        return view('public.potentials', compact('potentials'));
    }

    // Detail Potensi Wisata
    public function potentialDetail($id)
    {
        $potential = Potential::findOrFail($id);
        $relatedPotentials = Potential::where('category', $potential->category)
            ->where('id', '!=', $potential->id)
            ->take(3)
            ->get();

        return view('public.potential-detail', compact('potential', 'relatedPotentials'));
    }

    // Produk UMKM
    public function products()
    {
        $products = Product::latest()->paginate(12);

        return view('public.products', compact('products'));
    }

    // Berita & Kegiatan
    public function posts()
    {
        $posts = Post::where('status', 'published')
            ->latest('published_at')
            ->paginate(9);

        return view('public.posts', compact('posts'));
    }

    // Detail Berita
    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.post-detail', compact('post', 'relatedPosts'));
    }

    // Fasilitas Umum
    public function facilities()
    {
        $facilities = Facility::latest()->paginate(12);

        return view('public.facilities', compact('facilities'));
    }
}
