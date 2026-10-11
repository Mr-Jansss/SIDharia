<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageProfile;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        VillageProfile::truncate();

        // Create single village profile
        VillageProfile::create([
            'history' => 'Desa Haria adalah salah satu desa yang terletak di Kecamatan Sabu Barat, Kabupaten Sabu Raijua, Provinsi Nusa Tenggara Timur. Desa ini memiliki sejarah panjang yang dimulai sejak zaman penjajahan Belanda. Masyarakat Desa Haria dikenal dengan kearifan lokalnya yang masih terjaga hingga saat ini.

Nama "Haria" sendiri berasal dari bahasa lokal yang memiliki makna filosofis mendalam bagi masyarakat setempat. Desa ini telah berkembang dari waktu ke waktu, namun tetap mempertahankan nilai-nilai budaya dan tradisi nenek moyang.

Pada tahun 2020, Desa Haria ditetapkan sebagai Desa Wisata oleh Pemerintah Kabupaten Sabu Raijua. Penetapan ini didasarkan pada potensi alam yang indah, budaya yang unik, serta kesiapan masyarakat dalam mengembangkan pariwisata berkelanjutan.',

            'vision' => 'Mewujudkan Desa Haria sebagai desa wisata yang mandiri, sejahtera, dan lestari dengan mengedepankan kearifan lokal dan pembangunan berkelanjutan untuk kesejahteraan masyarakat.',

            'mission' => 'Mengembangkan potensi wisata alam dan budaya secara berkelanjutan.

Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan.

Mendorong pertumbuhan ekonomi masyarakat melalui UMKM dan sektor pariwisata.

Menjaga kelestarian lingkungan hidup dan kearifan lokal.

Meningkatkan infrastruktur dan fasilitas publik untuk mendukung pariwisata.

Membangun kemitraan dengan berbagai pihak untuk pengembangan desa.'
        ]);
    }
}
