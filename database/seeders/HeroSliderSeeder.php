<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create hero-sliders directory if it doesn't exist
        if (!Storage::disk('public')->exists('hero-sliders')) {
            Storage::disk('public')->makeDirectory('hero-sliders');
        }

        $sliders = [
            [
                'title' => 'Selamat Datang di Desa Wisata Haria',
                'description' => 'Jelajahi keindahan alam, budaya lokal, dan produk unggulan dari masyarakat Haria di Kecamatan Sabu Barat.',
                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920&h=600&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Keindahan Alam yang Memukau',
                'description' => 'Nikmati pemandangan alam yang menakjubkan dan udara segar pegunungan.',
                'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=1920&h=600&fit=crop',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Budaya dan Tradisi Lokal',
                'description' => 'Kenali budaya dan tradisi masyarakat Haria yang kaya dan beragam.',
                'image' => 'https://images.unsplash.com/photo-1533105079780-92b9be482077?w=1920&h=600&fit=crop',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Produk UMKM Unggulan',
                'description' => 'Dukung produk lokal berkualitas dari pengrajin dan pelaku usaha di Desa Haria.',
                'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=1920&h=600&fit=crop',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $index => $sliderData) {
            // Download image from URL and save it
            try {
                $imageContent = @file_get_contents($sliderData['image']);
                if ($imageContent) {
                    $filename = 'hero-sliders/slider-' . ($index + 1) . '.jpg';
                    Storage::disk('public')->put($filename, $imageContent);
                    $sliderData['image'] = $filename;
                } else {
                    // Fallback to a placeholder path if download fails
                    $sliderData['image'] = 'hero-sliders/placeholder.jpg';
                }
            } catch (\Exception $e) {
                // Fallback to a placeholder path if download fails
                $sliderData['image'] = 'hero-sliders/placeholder.jpg';
            }

            HeroSlider::create($sliderData);
        }
    }
}
