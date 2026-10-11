<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User untuk Dashboard
        User::create([
            'name' => 'Admin Desa Haria',
            'email' => 'admin@desaharia.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Profil Desa
        \App\Models\VillageProfile::create([
            'title' => 'Sejarah Desa Haria',
            'content' => 'Desa Haria merupakan salah satu desa di Kecamatan Saparua, Kabupaten Maluku Tengah, Provinsi Maluku. Desa ini memiliki sejarah panjang sebagai kampung pesisir yang kaya akan budaya dan tradisi masyarakat lokal.',
            'type' => 'sejarah',
        ]);

        \App\Models\VillageProfile::create([
            'title' => 'Visi Desa Haria',
            'content' => 'Menjadikan Desa Haria sebagai desa wisata berbasis kearifan lokal yang mandiri, sejahtera, dan berkelanjutan.',
            'type' => 'visi',
        ]);

        \App\Models\VillageProfile::create([
            'title' => 'Misi Desa Haria',
            'content' => '1. Mengembangkan potensi wisata alam dan budaya\n2. Meningkatkan kesejahteraan masyarakat melalui UMKM lokal\n3. Melestarikan kearifan lokal dan tradisi\n4. Membangun infrastruktur desa yang modern',
            'type' => 'misi',
        ]);

        // Perangkat Desa
        \App\Models\Official::create([
            'name' => 'Bapak Johannes Sahetapy',
            'position' => 'Kepala Desa',
            'order_number' => 1,
        ]);

        \App\Models\Official::create([
            'name' => 'Ibu Maria Latuconsina',
            'position' => 'Sekretaris Desa',
            'order_number' => 2,
        ]);

        \App\Models\Official::create([
            'name' => 'Bapak Thomas Siwabessy',
            'position' => 'Bendahara Desa',
            'order_number' => 3,
        ]);

        // Potensi Wisata
        \App\Models\Potential::create([
            'title' => 'Pantai Haria',
            'description' => 'Pantai berpasir putih dengan air laut yang jernih dan pemandangan matahari terbenam yang indah.',
            'category' => 'wisata',
        ]);

        \App\Models\Potential::create([
            'title' => 'Hutan Sagu',
            'description' => 'Kawasan hutan sagu yang masih alami dan menjadi sumber penghidupan masyarakat lokal.',
            'category' => 'alam',
        ]);

        \App\Models\Potential::create([
            'title' => 'Tari Cakalele',
            'description' => 'Tarian perang tradisional Maluku yang masih dilestarikan oleh masyarakat Desa Haria.',
            'category' => 'budaya',
        ]);

        // Fasilitas Umum
        \App\Models\Facility::create([
            'name' => 'Balai Desa Haria',
            'description' => 'Pusat pemerintahan dan pelayanan masyarakat',
            'icon' => 'building',
        ]);

        \App\Models\Facility::create([
            'name' => 'Puskesmas Pembantu',
            'description' => 'Fasilitas kesehatan masyarakat',
            'icon' => 'hospital',
        ]);

        \App\Models\Facility::create([
            'name' => 'Dermaga Haria',
            'description' => 'Akses transportasi laut menuju desa',
            'icon' => 'anchor',
        ]);

        // Produk UMKM
        \App\Models\Product::create([
            'name' => 'Kue Sagu Haria',
            'owner_name' => 'Ibu Rosita',
            'description' => 'Kue tradisional berbahan dasar sagu asli Maluku dengan berbagai varian rasa.',
            'price' => 25000,
            'whatsapp_number' => '6281234567890',
        ]);

        \App\Models\Product::create([
            'name' => 'Ikan Asap Khas Haria',
            'owner_name' => 'Bapak Herman',
            'description' => 'Ikan cakalang asap dengan bumbu rempah tradisional, tahan hingga 1 bulan.',
            'price' => 75000,
            'whatsapp_number' => '6281234567891',
        ]);

        \App\Models\Product::create([
            'name' => 'Anyaman Bambu',
            'owner_name' => 'Kelompok Tani Makmur',
            'description' => 'Produk anyaman bambu berupa keranjang, tas, dan hiasan dinding.',
            'price' => 50000,
            'whatsapp_number' => '6281234567892',
        ]);

        // Berita/Kegiatan
        \App\Models\Post::create([
            'title' => 'Pembukaan Festival Pesisir Haria 2026',
            'slug' => 'pembukaan-festival-pesisir-haria-2026',
            'content' => 'Festival Pesisir Haria 2026 resmi dibuka oleh Bupati Maluku Tengah. Festival ini menampilkan berbagai atraksi budaya, kuliner lokal, dan lomba tradisional yang meriah.',
            'category' => 'kegiatan',
            'published_at' => now()->subDays(7),
        ]);

        \App\Models\Post::create([
            'title' => 'Peningkatan Infrastruktur Jalan Desa',
            'slug' => 'peningkatan-infrastruktur-jalan-desa',
            'content' => 'Pemerintah Desa Haria bersama Dinas PUPR melaksanakan pembangunan jalan desa sepanjang 2 kilometer untuk meningkatkan akses menuju lokasi wisata.',
            'category' => 'berita',
            'published_at' => now()->subDays(3),
        ]);
    }
}
