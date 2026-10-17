<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;
use App\Models\TanggapanPengaduan;
use Illuminate\Support\Str;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengaduans = [
            [
                'nama_pelapor' => 'Bapak Agus Santoso',
                'google_email' => 'agus.santoso@gmail.com',
                'judul' => 'Jalan Rusak di Depan Balai Negeri',
                'isi_laporan' => 'Jalan di depan Balai Negeri mengalami kerusakan parah dengan banyak lubang. Kondisi ini sangat mengganggu aktivitas masyarakat dan berpotensi menyebabkan kecelakaan, terutama saat musim hujan.',
                'status' => 'selesai',
                'tanggapan' => 'Terima kasih atas laporannya. Perbaikan jalan di depan Balai Negeri telah selesai dilakukan. Kami juga telah melakukan penambalan pada lubang-lubang jalan dan pengaspalan ulang sepanjang 50 meter. Mohon partisipasi masyarakat untuk turut menjaga infrastruktur desa.',
            ],
            [
                'nama_pelapor' => 'Ibu Siti Aminah',
                'google_email' => 'siti.aminah@gmail.com',
                'judul' => 'Lampu Jalan Mati di Kampung Timur',
                'isi_laporan' => 'Lampu penerangan jalan di Kampung Timur sudah mati sejak seminggu yang lalu. Kondisi ini membuat jalan sangat gelap di malam hari dan mengganggu keamanan warga.',
                'status' => 'selesai',
                'tanggapan' => 'Terima kasih atas informasinya Bu Siti. Lampu jalan di Kampung Timur telah diperbaiki. Kerusakan disebabkan oleh kabel yang putus akibat angin kencang. Kami telah mengganti kabel dan memastikan semua lampu menyala dengan baik.',
            ],
            [
                'nama_pelapor' => 'Bapak Muhammad Yusuf',
                'google_email' => 'm.yusuf@gmail.com',
                'judul' => 'Sampah Menumpuk di Area Pasar',
                'isi_laporan' => 'Sampah di area pasar menumpuk dan tidak diangkut selama beberapa hari. Bau tidak sedap menyebar ke area pemukiman warga dan mengganggu kesehatan lingkungan.',
                'status' => 'selesai',
                'tanggapan' => 'Terima kasih Pak Yusuf. Sampah di area pasar sudah diangkut dan dibersihkan. Kami telah menambah frekuensi pengangkutan sampah menjadi 2 kali sehari. Himbauan kepada pedagang untuk membuang sampah pada tempat yang telah disediakan.',
            ],
            [
                'nama_pelapor' => 'Ibu Dewi Lestari',
                'google_email' => 'dewi.lestari88@gmail.com',
                'judul' => 'Saluran Air Tersumbat',
                'isi_laporan' => 'Saluran air di RT 03 tersumbat sampah dan tanah. Saat hujan deras, air meluap dan menggenang di jalan sehingga menyulitkan akses kendaraan.',
                'status' => 'selesai',
                'tanggapan' => 'Terima kasih Bu Dewi. Saluran air di RT 03 telah dibersihkan dari sampah dan lumpur. Kami juga telah melakukan pelebaran saluran air untuk meningkatkan daya tampung. Mohon kerja sama warga untuk tidak membuang sampah ke saluran air.',
            ],
            [
                'nama_pelapor' => 'Bapak Budi Setiawan',
                'google_email' => 'budi.setiawan@gmail.com',
                'judul' => 'Papan Informasi Desa Rusak',
                'isi_laporan' => 'Papan informasi desa di pertigaan jalan utama rusak dan tulisannya sudah tidak terbaca. Kondisi ini membuat wisatawan kesulitan menemukan informasi tentang desa.',
                'status' => 'selesai',
                'tanggapan' => 'Terima kasih Pak Budi. Papan informasi desa telah diganti dengan yang baru. Kami juga menambahkan informasi kontak dan QR code yang mengarah ke website desa untuk memudahkan wisatawan mendapatkan informasi.',
            ],
            [
                'nama_pelapor' => 'Ibu Rahma Wati',
                'google_email' => 'rahma.wati@gmail.com',
                'judul' => 'Fasilitas Toilet Umum Kurang Bersih',
                'isi_laporan' => 'Toilet umum di area wisata pantai kurang terawat dan tidak bersih. Kondisi ini menurunkan kenyamanan wisatawan yang berkunjung.',
                'status' => 'selesai',
                'tanggapan' => 'Terima kasih Bu Rahma. Toilet umum di area wisata pantai telah dibersihkan dan petugas kebersihan telah dijadwalkan untuk membersihkan 3 kali sehari. Kami juga menambah fasilitas sabun dan pengharum ruangan.',
            ],
            [
                'nama_pelapor' => 'Bapak Andi Wijaya',
                'google_email' => 'andi.wijaya92@gmail.com',
                'judul' => 'Permintaan Penambahan Tempat Sampah',
                'isi_laporan' => 'Di area wisata pantai masih kurang tempat sampah. Banyak pengunjung yang membuang sampah sembarangan karena tidak menemukan tempat sampah yang dekat.',
                'status' => 'selesai',
                'tanggapan' => 'Terima kasih Pak Andi atas masukannya. Kami telah menambahkan 10 tempat sampah baru di area wisata pantai dengan jarak sekitar 20 meter. Himbauan kepada pengunjung untuk menjaga kebersihan desa wisata.',
            ],
        ];

        foreach ($pengaduans as $index => $data) {
            // Generate nomor pengaduan
            $date = now()->subDays(rand(7, 30));
            $counter = str_pad($index + 1, 4, '0', STR_PAD_LEFT);
            $nomorPengaduan = 'PGD-' . $date->format('Ymd') . '-' . $counter;

            // Create pengaduan
            $pengaduan = Pengaduan::create([
                'nomor_pengaduan' => $nomorPengaduan,
                'nama_pelapor' => $data['nama_pelapor'],
                'google_email' => $data['google_email'],
                'judul' => $data['judul'],
                'isi_laporan' => $data['isi_laporan'],
                'status' => $data['status'],
                'created_at' => $date,
                'updated_at' => $date->copy()->addDays(rand(1, 5)),
            ]);

            // Create tanggapan
            TanggapanPengaduan::create([
                'pengaduan_id' => $pengaduan->id,
                'isi_tanggapan' => $data['tanggapan'],
                'created_at' => $pengaduan->updated_at,
                'updated_at' => $pengaduan->updated_at,
            ]);
        }

        // Create beberapa pengaduan yang masih diproses
        $ongoingPengaduans = [
            [
                'nama_pelapor' => 'Bapak Hendra Pratama',
                'google_email' => 'hendra.pratama@gmail.com',
                'judul' => 'Usulan Pembangunan Pos Keamanan',
                'isi_laporan' => 'Mohon dipertimbangkan pembangunan pos keamanan di area wisata untuk meningkatkan rasa aman pengunjung, terutama saat malam hari.',
                'status' => 'diproses',
            ],
            [
                'nama_pelapor' => 'Ibu Nina Marlina',
                'google_email' => 'nina.marlina@gmail.com',
                'judul' => 'Laporan Hewan Ternak Berkeliaran',
                'isi_laporan' => 'Beberapa hewan ternak sering berkeliaran di jalan umum dan mengganggu kenyamanan warga serta pengunjung wisata.',
                'status' => 'menunggu',
            ],
        ];

        foreach ($ongoingPengaduans as $index => $data) {
            $date = now()->subDays(rand(1, 7));
            $counter = str_pad(count($pengaduans) + $index + 1, 4, '0', STR_PAD_LEFT);
            $nomorPengaduan = 'PGD-' . $date->format('Ymd') . '-' . $counter;

            Pengaduan::create([
                'nomor_pengaduan' => $nomorPengaduan,
                'nama_pelapor' => $data['nama_pelapor'],
                'google_email' => $data['google_email'],
                'judul' => $data['judul'],
                'isi_laporan' => $data['isi_laporan'],
                'status' => $data['status'],
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }

        $this->command->info('✓ Pengaduan seeded successfully with ' . count($pengaduans) . ' resolved complaints and ' . count($ongoingPengaduans) . ' ongoing complaints');
    }
}
