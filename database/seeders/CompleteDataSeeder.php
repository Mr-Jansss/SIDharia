<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageProfile;
use App\Models\Official;
use App\Models\Potential;
use App\Models\Facility;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompleteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        Post::truncate();
        Product::truncate();
        Facility::truncate();
        Potential::truncate();
        Official::truncate();

        // Create dummy images using placeholder service
        $this->createDummyImages();

        // Seed Village Profile
        $this->seedVillageProfile();

        // Seed Officials
        $this->seedOfficials();

        // Seed Potentials
        $this->seedPotentials();

        // Seed Facilities
        $this->seedFacilities();

        // Seed Products
        $this->seedProducts();

        // Seed Posts
        $this->seedPosts();

        $this->command->info('✅ Complete data seeded successfully!');
    }

    private function createDummyImages()
    {
        // Create storage directories if not exist
        Storage::disk('public')->makeDirectory('officials');
        Storage::disk('public')->makeDirectory('potentials');
        Storage::disk('public')->makeDirectory('products');
        Storage::disk('public')->makeDirectory('posts');
    }

    private function seedVillageProfile()
    {
        VillageProfile::updateOrCreate(
            ['id' => 1],
            [
                'history' => 'Desa Haria adalah salah satu desa yang terletak di Kecamatan Sabu Barat, Kabupaten Sabu Raijua, Provinsi Nusa Tenggara Timur. Desa ini memiliki sejarah panjang yang dimulai sejak zaman penjajahan Belanda. 

Masyarakat Desa Haria dikenal dengan kearifan lokalnya yang masih terjaga hingga saat ini. Nama "Haria" sendiri berasal dari bahasa lokal yang memiliki makna filosofis mendalam bagi masyarakat setempat.

Desa ini telah berkembang dari waktu ke waktu, namun tetap mempertahankan nilai-nilai budaya dan tradisi nenek moyang. Pada tahun 2020, Desa Haria ditetapkan sebagai Desa Wisata oleh Pemerintah Kabupaten Sabu Raijua.',

                'vision' => 'Mewujudkan Desa Haria sebagai desa wisata yang mandiri, sejahtera, dan lestari dengan mengedepankan kearifan lokal dan pembangunan berkelanjutan untuk kesejahteraan masyarakat.',

                'mission' => 'Mengembangkan potensi wisata alam dan budaya secara berkelanjutan.

Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan.

Mendorong pertumbuhan ekonomi masyarakat melalui UMKM dan sektor pariwisata.

Menjaga kelestarian lingkungan hidup dan kearifan lokal.

Meningkatkan infrastruktur dan fasilitas publik untuk mendukung pariwisata.'
            ]
        );

        $this->command->info('✓ Village Profile seeded');
    }

    private function seedOfficials()
    {
        $officials = [
            ['name' => 'Bapak Yohanes Ndara', 'position' => 'Kepala Desa', 'phone' => '0812-3456-7890', 'order' => 1],
            ['name' => 'Ibu Maria Sari', 'position' => 'Sekretaris Desa', 'phone' => '0813-4567-8901', 'order' => 2],
            ['name' => 'Bapak Thomas Dolu', 'position' => 'Bendahara Desa', 'phone' => '0814-5678-9012', 'order' => 3],
            ['name' => 'Bapak Petrus Haba', 'position' => 'Kepala Urusan Pemerintahan', 'phone' => '0815-6789-0123', 'order' => 4],
            ['name' => 'Ibu Ruth Talu', 'position' => 'Kepala Urusan Pembangunan', 'phone' => '0816-7890-1234', 'order' => 5],
            ['name' => 'Bapak Marthen Lobo', 'position' => 'Kepala Urusan Kesejahteraan', 'phone' => '0817-8901-2345', 'order' => 6],
        ];

        foreach ($officials as $data) {
            // Create placeholder image
            $imageName = 'officials/official-' . $data['order'] . '.jpg';
            $imageContent = file_get_contents('https://i.pravatar.cc/300?img=' . $data['order']);
            Storage::disk('public')->put($imageName, $imageContent);

            Official::create([
                'name' => $data['name'],
                'position' => $data['position'],
                'phone' => $data['phone'],
                'photo' => $imageName,
                'order' => $data['order'],
            ]);
        }

        $this->command->info('✓ Officials seeded with images');
    }

    private function seedPotentials()
    {
        $potentials = [
            [
                'name' => 'Pantai Haria',
                'description' => 'Pantai Haria merupakan pantai yang indah dengan pasir putih dan air laut yang jernih. Lokasi ini sangat cocok untuk berenang, snorkeling, dan menikmati sunset yang memukau.',
                'category' => 'wisata'
            ],
            [
                'name' => 'Bukit Savana',
                'description' => 'Bukit Savana menawarkan pemandangan padang rumput yang luas dengan latar belakang laut biru. Spot yang sempurna untuk camping dan fotografi.',
                'category' => 'alam'
            ],
            [
                'name' => 'Rumah Adat Haria',
                'description' => 'Rumah adat tradisional yang masih terjaga dengan baik. Pengunjung dapat mempelajari arsitektur tradisional dan budaya masyarakat Sabu.',
                'category' => 'budaya'
            ],
            [
                'name' => 'Air Terjun Batu Putih',
                'description' => 'Air terjun tersembunyi dengan ketinggian sekitar 15 meter. Air yang jernih dan suasana yang sejuk menjadikan tempat ini ideal untuk refreshing.',
                'category' => 'alam'
            ],
            [
                'name' => 'Taman Laut Haria',
                'description' => 'Kawasan konservasi terumbu karang dengan keanekaragaman hayati laut yang tinggi. Tempat yang sempurna untuk diving dan snorkeling.',
                'category' => 'wisata'
            ],
            [
                'name' => 'Upacara Adat Hemba',
                'description' => 'Upacara adat tradisional yang diadakan setiap tahun untuk menghormati leluhur. Wisatawan dapat menyaksikan tarian tradisional dan ritual khas Sabu.',
                'category' => 'budaya'
            ],
        ];

        foreach ($potentials as $index => $data) {
            $imageName = 'potentials/potential-' . ($index + 1) . '.jpg';
            $imageContent = file_get_contents('https://picsum.photos/800/600?random=' . ($index + 1));
            Storage::disk('public')->put($imageName, $imageContent);

            Potential::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'category' => $data['category'],
                'image' => $imageName,
            ]);
        }

        $this->command->info('✓ Potentials seeded with images');
    }

    private function seedFacilities()
    {
        $facilities = [
            ['name' => 'Kantor Desa Haria', 'description' => 'Kantor pusat pelayanan administrasi desa', 'icon' => 'fas fa-building', 'lat' => -10.5167, 'lng' => 121.8500],
            ['name' => 'Puskesmas Haria', 'description' => 'Pusat kesehatan masyarakat dengan layanan 24 jam', 'icon' => 'fas fa-hospital', 'lat' => -10.5170, 'lng' => 121.8510],
            ['name' => 'SD Negeri Haria', 'description' => 'Sekolah dasar negeri dengan fasilitas lengkap', 'icon' => 'fas fa-school', 'lat' => -10.5165, 'lng' => 121.8505],
            ['name' => 'Masjid Al-Ikhlas', 'description' => 'Masjid utama Desa Haria', 'icon' => 'fas fa-mosque', 'lat' => -10.5168, 'lng' => 121.8495],
            ['name' => 'Balai Desa', 'description' => 'Tempat pertemuan dan acara masyarakat', 'icon' => 'fas fa-users', 'lat' => -10.5172, 'lng' => 121.8502],
            ['name' => 'Lapangan Olahraga', 'description' => 'Lapangan serbaguna untuk berbagai kegiatan olahraga', 'icon' => 'fas fa-futbol', 'lat' => -10.5175, 'lng' => 121.8515],
        ];

        foreach ($facilities as $data) {
            Facility::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'icon' => $data['icon'],
                'latitude' => $data['lat'],
                'longitude' => $data['lng'],
            ]);
        }

        $this->command->info('✓ Facilities seeded');
    }

    private function seedProducts()
    {
        $products = [
            ['name' => 'Kain Tenun Ikat Sabu', 'contact_name' => 'Ibu Maria', 'price' => 350000, 'phone' => '0812-3456-7890', 'desc' => 'Kain tenun ikat khas Sabu dengan motif tradisional. Dibuat dengan pewarna alami dan teknik tenun manual.'],
            ['name' => 'Madu Hutan Asli', 'contact_name' => 'Bapak Yohanes', 'price' => 150000, 'phone' => '0813-4567-8901', 'desc' => 'Madu murni dari lebah hutan Sabu. Dikemas dalam botol 500ml, kaya manfaat untuk kesehatan.'],
            ['name' => 'Keripik Ubi Lokal', 'contact_name' => 'Ibu Ruth', 'price' => 25000, 'phone' => '0814-5678-9012', 'desc' => 'Keripik ubi renyah dengan rasa original dan balado. Dibuat dari ubi lokal pilihan.'],
            ['name' => 'Ikan Asin Khas Sabu', 'contact_name' => 'Bapak Thomas', 'price' => 75000, 'phone' => '0815-6789-0123', 'desc' => 'Ikan asin kualitas premium hasil tangkapan nelayan lokal. Dijemur dengan cara tradisional.'],
            ['name' => 'Anyaman Bambu', 'contact_name' => 'Ibu Sari', 'price' => 125000, 'phone' => '0816-7890-1234', 'desc' => 'Keranjang dan wadah dari anyaman bambu. Cocok untuk dekorasi rumah dan cindera mata.'],
            ['name' => 'Kopi Robusta Haria', 'contact_name' => 'Bapak Petrus', 'price' => 85000, 'phone' => '0817-8901-2345', 'desc' => 'Kopi robusta berkualitas dari kebun warga. Aroma khas dan rasa yang nikmat. Kemasan 250gr.'],
        ];

        foreach ($products as $index => $data) {
            $imageName = 'products/product-' . ($index + 1) . '.jpg';
            $imageContent = file_get_contents('https://picsum.photos/400/400?random=' . (100 + $index));
            Storage::disk('public')->put($imageName, $imageContent);

            Product::create([
                'name' => $data['name'],
                'contact_name' => $data['contact_name'],
                'description' => $data['desc'],
                'price' => $data['price'],
                'contact_phone' => $data['phone'],
                'image' => $imageName,
            ]);
        }

        $this->command->info('✓ Products seeded with images');
    }

    private function seedPosts()
    {
        $posts = [
            [
                'title' => 'Desa Haria Raih Penghargaan Desa Wisata Terbaik 2026',
                'content' => 'Desa Haria berhasil meraih penghargaan sebagai Desa Wisata Terbaik tingkat Provinsi NTT tahun 2026. Penghargaan ini diberikan atas keberhasilan desa dalam mengembangkan potensi wisata alam dan budaya dengan tetap menjaga kelestarian lingkungan.

Kepala Desa Haria, Bapak Yohanes Ndara, menyampaikan rasa syukur dan terima kasih kepada seluruh masyarakat yang telah berpartisipasi aktif dalam pengembangan desa wisata.

"Penghargaan ini adalah hasil kerja keras bersama seluruh elemen masyarakat. Kami akan terus berkomitmen untuk mengembangkan desa wisata yang berkelanjutan," ujar Kepala Desa.',
                'category' => 'berita',
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Festival Budaya Sabu 2026 Akan Digelar di Desa Haria',
                'content' => 'Pemerintah Kabupaten Sabu Raijua akan menggelar Festival Budaya Sabu 2026 di Desa Haria pada tanggal 15-17 November 2026. Festival ini akan menampilkan berbagai atraksi budaya, pameran kerajinan, dan kuliner khas Sabu.

Acara ini diharapkan dapat menarik wisatawan domestik dan mancanegara untuk mengenal lebih dekat budaya Sabu. Seluruh masyarakat desa diajak untuk berpartisipasi aktif dalam mensukseskan acara ini.',
                'category' => 'kegiatan',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Pelatihan UMKM Digital Marketing untuk Warga Desa',
                'content' => 'Pemerintah Desa Haria bekerja sama dengan Dinas Koperasi dan UKM mengadakan pelatihan digital marketing bagi pelaku UMKM desa. Pelatihan ini diikuti oleh 30 peserta yang merupakan pemilik usaha kecil dan menengah di desa.

Materi pelatihan mencakup cara memasarkan produk melalui media sosial, membuat konten menarik, dan strategi penjualan online. Diharapkan setelah mengikuti pelatihan ini, para pelaku UMKM dapat meningkatkan penjualan produk mereka.',
                'category' => 'kegiatan',
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Gotong Royong Pembersihan Pantai Haria',
                'content' => 'Masyarakat Desa Haria mengadakan kegiatan gotong royong pembersihan Pantai Haria yang diikuti oleh sekitar 100 warga. Kegiatan ini bertujuan untuk menjaga kebersihan dan kelestarian pantai sebagai salah satu destinasi wisata unggulan desa.

Kegiatan yang berlangsung selama 3 jam ini berhasil mengumpulkan sampah sebanyak 200 kg. Kepala Desa mengapresiasi partisipasi masyarakat dan mengimbau agar seluruh warga menjaga kebersihan lingkungan.',
                'category' => 'kegiatan',
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Pembangunan Dermaga Baru untuk Akses Wisata Bahari',
                'content' => 'Pemerintah desa tengah membangun dermaga baru di pesisir Desa Haria untuk mempermudah akses wisata bahari. Dermaga ini diharapkan dapat menampung kapal-kapal wisata dan mempermudah aktivitas nelayan.

Pembangunan dermaga ini merupakan bagian dari program pengembangan infrastruktur desa wisata yang didanai oleh Dana Desa dan APBD Kabupaten. Target penyelesaian pembangunan adalah akhir tahun 2026.',
                'category' => 'berita',
                'status' => 'draft',
                'published_at' => now(),
            ],
        ];

        foreach ($posts as $index => $data) {
            $imageName = 'posts/post-' . ($index + 1) . '.jpg';
            $imageContent = file_get_contents('https://picsum.photos/1200/630?random=' . (200 + $index));
            Storage::disk('public')->put($imageName, $imageContent);

            Post::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'content' => $data['content'],
                'category' => $data['category'],
                'status' => $data['status'],
                'published_at' => $data['published_at'],
                'image' => $imageName,
            ]);
        }

        $this->command->info('✓ Posts seeded with images');
    }
}
