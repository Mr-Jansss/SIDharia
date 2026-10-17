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
            'village_name' => 'Negeri Haria',
            
            'profile_overview' => 'Negeri Haria adalah destinasi wisata yang terletak di Kecamatan Sabu Barat, Kabupaten Sabu Raijua, Provinsi Nusa Tenggara Timur. Desa ini menawarkan keindahan alam yang memukau, budaya lokal yang kaya, serta keramahan masyarakatnya.

Dengan luas wilayah sekitar 25 km², Negeri Haria memiliki berbagai potensi wisata mulai dari pantai, perbukitan, hingga situs budaya. Masyarakat desa yang mayoritas bekerja sebagai petani dan nelayan, kini juga aktif mengembangkan sektor pariwisata dan UMKM.',

            'sejarah' => 'Negeri Haria adalah salah satu desa yang terletak di Kecamatan Sabu Barat, Kabupaten Sabu Raijua, Provinsi Nusa Tenggara Timur. Desa ini memiliki sejarah panjang yang dimulai sejak zaman penjajahan Belanda. Masyarakat Negeri Haria dikenal dengan kearifan lokalnya yang masih terjaga hingga saat ini.

Nama "Haria" sendiri berasal dari bahasa lokal yang memiliki makna filosofis mendalam bagi masyarakat setempat. Desa ini telah berkembang dari waktu ke waktu, namun tetap mempertahankan nilai-nilai budaya dan tradisi nenek moyang.

Pada tahun 2020, Negeri Haria ditetapkan sebagai Desa Wisata oleh Pemerintah Kabupaten Sabu Raijua. Penetapan ini didasarkan pada potensi alam yang indah, budaya yang unik, serta kesiapan masyarakat dalam mengembangkan pariwisata berkelanjutan.

Sejak ditetapkan sebagai desa wisata, Negeri Haria terus berkembang dan menjadi salah satu destinasi unggulan di Kabupaten Sabu Raijua. Berbagai program pemberdayaan masyarakat dan pengembangan infrastruktur terus dilakukan untuk meningkatkan kualitas layanan wisata.',

            'visi' => 'Mewujudkan Negeri Haria sebagai desa wisata yang mandiri, sejahtera, dan lestari dengan mengedepankan kearifan lokal dan pembangunan berkelanjutan untuk kesejahteraan masyarakat.',

            'misi' => 'Mengembangkan potensi wisata alam dan budaya secara berkelanjutan
Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan
Mendorong pertumbuhan ekonomi masyarakat melalui UMKM dan sektor pariwisata
Menjaga kelestarian lingkungan hidup dan kearifan lokal
Meningkatkan infrastruktur dan fasilitas publik untuk mendukung pariwisata
Membangun kemitraan dengan berbagai pihak untuk pengembangan desa',

            'pemerintahan' => 'Pemerintahan Negeri Haria menjalankan sistem pemerintahan desa sesuai dengan Undang-Undang Nomor 6 Tahun 2014 tentang Desa. Kepala Desa selaku pimpinan pemerintahan desa bertanggung jawab atas penyelenggaraan pemerintahan, pembangunan, dan pemberdayaan masyarakat.

Pemerintah Negeri Haria didukung oleh perangkat desa yang terdiri dari Sekretaris Desa, Kepala Seksi (Kasi), dan staf teknis lainnya. Dalam menjalankan tugasnya, Kepala Desa dibantu oleh Badan Permusyawaratan Desa (BPD) yang berfungsi sebagai lembaga pengawas dan penyalur aspirasi masyarakat.

Masa jabatan Kepala Desa adalah 6 tahun dan dapat dipilih kembali untuk satu kali masa jabatan berikutnya. Pemilihan Kepala Desa dilakukan secara demokratis melalui Pemilihan Kepala Desa (Pilkades) yang diikuti oleh seluruh warga desa yang memenuhi syarat sebagai pemilih.',

            'struktur_organisasi' => 'Struktur Organisasi Pemerintahan Negeri Haria terdiri dari:

1. Kepala Desa
   Memimpin penyelenggaraan pemerintahan desa, pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat.

2. Sekretaris Desa
   Membantu Kepala Desa dalam bidang administrasi pemerintahan, menyiapkan bahan penyusunan laporan, dan melaksanakan tugas lain yang diberikan oleh Kepala Desa.

3. Kepala Seksi Pemerintahan
   Melaksanakan manajemen tata praja pemerintahan, menyusun rancangan regulasi desa, dan pembinaan masalah pertanahan.

4. Kepala Seksi Kesejahteraan
   Melaksanakan pengembangan usaha ekonomi masyarakat, pembinaan ketenagakerjaan, pembinaan sosial budaya, keagamaan, dan ketentraman.

5. Kepala Seksi Pelayanan
   Melaksanakan penyuluhan dan motivasi terhadap masyarakat di bidang budaya, ekonomi, dan politik, serta menggali potensi sumber daya alam.

6. Kepala Dusun
   Membantu Kepala Desa dalam pelaksanaan tugasnya di wilayah dusun masing-masing.

7. Badan Permusyawaratan Desa (BPD)
   Lembaga yang melaksanakan fungsi pemerintahan yang anggotanya merupakan wakil dari penduduk desa berdasarkan keterwakilan wilayah dan ditetapkan secara demokratis.',

            'address' => 'Negeri Haria, Kecamatan Sabu Barat, Kabupaten Sabu Raijua, Provinsi Nusa Tenggara Timur',
            'phone' => '+62 380 xxxx',
            'email' => 'info@desaharia.id',
            'website' => 'https://desaharia.id',
        ]);
    }
}
