<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use App\Models\Official;
use App\Models\Potential;
use App\Models\Facility;
use App\Models\Product;
use App\Models\Post;
use App\Models\HeroSlider;
use App\Models\VillageStatistic;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Homepage
    public function index()
    {
        $heroSliders = HeroSlider::where('is_active', true)
            ->orderBy('order')
            ->get();
        $villageProfile = VillageProfile::first();
        $featuredPotentials = Potential::latest()->take(4)->get();
        $latestProducts = Product::latest()->take(6)->get();
        $latestPosts = Post::where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();
        
        // Ambil pengaduan yang sudah selesai dan ada tanggapan (untuk testimoni)
        $resolvedComplaints = Pengaduan::where('status', 'selesai')
            ->whereHas('tanggapans') // hanya yang ada tanggapan
            ->with(['tanggapans' => function($query) {
                $query->latest()->limit(1); // ambil tanggapan terakhir
            }])
            ->latest()
            ->take(6)
            ->get();

        return view('public.index', compact(
            'heroSliders',
            'villageProfile',
            'featuredPotentials',
            'latestProducts',
            'latestPosts',
            'resolvedComplaints'
        ));
    }

    // Profil Desa
    public function profile()
    {
        $villageProfile = VillageProfile::first();
        $officials = Official::orderBy('order')->get();

        return view('public.profile', compact('villageProfile', 'officials'));
    }

    // Profil Desa - Sejarah
    public function profileSejarah()
    {
        $villageProfile = VillageProfile::first();
        return view('public.profile-sejarah', compact('villageProfile'));
    }

    // Profil Desa - Visi & Misi
    public function profileVisiMisi()
    {
        $villageProfile = VillageProfile::first();
        return view('public.profile-visi-misi', compact('villageProfile'));
    }

    // Profil Desa - Pemerintahan
    public function profilePemerintahan()
    {
        $villageProfile = VillageProfile::first();
        return view('public.profile-pemerintahan', compact('villageProfile'));
    }

    // Profil Desa - Struktur Organisasi
    public function profileStrukturOrganisasi()
    {
        $villageProfile = VillageProfile::first();
        $officials = Official::orderBy('order')->get();
        return view('public.profile-struktur-organisasi', compact('villageProfile', 'officials'));
    }

    // Statistik Desa
    public function statistics()
    {
        $statistic = VillageStatistic::firstOrCreate([]);
        return view('public.statistics', compact('statistic'));
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
