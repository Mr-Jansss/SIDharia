<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageProfile;

class PeraturanNegeriSeeder extends Seeder
{
    public function run(): void
    {
        $profile = VillageProfile::first();
        
        if ($profile) {
            $profile->update([
                'peraturan_negeri' => "PERATURAN NEGERI HARIA
Kabupaten Maluku Tengah, Provinsi Maluku

Berdasarkan musyawarah Saniri Negeri dan kesepakatan seluruh masyarakat Negeri Haria, dengan ini ditetapkan Peraturan Negeri yang mengatur kehidupan bermasyarakat, berbangsa, dan bernegara di wilayah Negeri Haria.

═══════════════════════════════════════

BAB I
KETENTUAN UMUM

Pasal 1 - Pengertian
Dalam Peraturan Negeri ini yang dimaksud dengan:
a. Negeri adalah kesatuan masyarakat hukum adat yang memiliki batas wilayah, berwenang mengatur dan mengurus kepentingan masyarakat setempat berdasarkan asal-usul dan adat istiadat setempat
b. Pemerintah Negeri adalah Kepala Negeri dan Perangkat Negeri
c. Saniri Negeri adalah lembaga legislatif yang anggotanya merupakan wakil dari masing-masing Soa/marga
d. Masohi adalah kegiatan gotong-royong yang dilakukan bersama untuk kepentingan umum
e. Sasi adalah larangan untuk mengambil hasil laut atau darat dalam jangka waktu tertentu

═══════════════════════════════════════

BAB II
PEMERINTAHAN NEGERI

Pasal 2 - Kepemimpinan
1. Negeri Haria dipimpin oleh seorang Kepala Negeri yang dipilih langsung oleh rakyat melalui pemilihan yang demokratis
2. Masa jabatan Kepala Negeri adalah 6 (enam) tahun dan dapat dipilih kembali untuk 1 (satu) periode berikutnya
3. Kepala Negeri bertanggung jawab kepada masyarakat dan Saniri Negeri

Pasal 3 - Saniri Negeri
1. Saniri Negeri terdiri dari perwakilan setiap Soa yang ada di Negeri Haria
2. Saniri Negeri berfungsi mengawasi jalannya pemerintahan dan memberikan persetujuan atas kebijakan penting
3. Keputusan Saniri Negeri diambil melalui musyawarah untuk mufakat

═══════════════════════════════════════

BAB III
KEHIDUPAN BERMASYARAKAT

Pasal 4 - Masohi (Gotong Royong)
1. Setiap kepala keluarga wajib mengikuti kegiatan masohi yang diselenggarakan untuk kepentingan bersama
2. Masohi dilaksanakan pada hari yang telah ditentukan oleh Pemerintah Negeri
3. Bagi yang tidak dapat hadir dalam masohi tanpa alasan yang sah akan dikenakan denda sesuai kesepakatan
4. Masohi merupakan wujud solidaritas dan persaudaraan masyarakat Negeri Haria

Pasal 5 - Pela dan Gandong
1. Hubungan Pela (persekutuan antar negeri) dan Gandong (persaudaraan) harus dijaga dan dilestarikan
2. Setiap warga negeri wajib menghormati dan memelihara hubungan baik dengan negeri-negeri yang memiliki ikatan Pela dan Gandong
3. Perkara yang melibatkan negeri Pela diselesaikan secara kekeluargaan dengan melibatkan tokoh adat dari kedua negeri

Pasal 6 - Upacara Adat
1. Upacara adat seperti Panas Negeri, Panas Sasi, dan upacara adat lainnya wajib diikuti oleh seluruh warga
2. Pelaksanaan upacara adat diatur dan dipimpin oleh Kepala Adat dan Saniri Negeri
3. Biaya upacara adat besar ditanggung bersama oleh seluruh masyarakat sesuai kemampuan

═══════════════════════════════════════

BAB IV
PENGELOLAAN SUMBER DAYA ALAM

Pasal 7 - Hutan Negeri
1. Hutan negeri merupakan milik bersama yang harus dijaga kelestariannya
2. Penebangan pohon di hutan negeri hanya boleh dilakukan dengan izin Kepala Negeri dan Saniri
3. Setiap penebangan pohon wajib disertai dengan penanaman kembali minimal 3 (tiga) batang pohon

Pasal 8 - Sasi Laut
1. Wilayah laut Negeri Haria diberlakukan sistem Sasi untuk menjaga kelestarian biota laut
2. Sasi laut dibuka dan ditutup berdasarkan keputusan Kepala Negeri setelah bermusyawarah dengan Saniri dan Kewang (petugas keamanan laut)
3. Selama masa Sasi berlaku, dilarang keras:
   - Mengambil hasil laut tanpa izin
   - Menggunakan bahan peledak atau racun untuk menangkap ikan
   - Merusak terumbu karang
4. Pelanggaran terhadap Sasi akan dikenakan sanksi adat dan denda sesuai ketentuan

Pasal 9 - Tanah Negeri
1. Tanah negeri yang belum dimiliki secara pribadi merupakan tanah bersama (dati)
2. Pemanfaatan tanah dati untuk perkebunan atau pembangunan harus seizin Kepala Negeri
3. Jual beli tanah kepada pihak luar negeri harus melalui persetujuan Saniri Negeri

═══════════════════════════════════════

BAB V
KETERTIBAN DAN KEAMANAN

Pasal 10 - Ketertiban Umum
1. Setiap warga wajib menjaga ketenangan dan ketertiban lingkungan
2. Kegiatan yang menimbulkan kebisingan setelah pukul 22.00 WIT wajib seizin Kepala Negeri atau Kepala Soa
3. Perkelahian atau tindak kekerasan di dalam negeri diselesaikan secara adat

Pasal 11 - Pelanggaran dan Sanksi
1. Pelanggaran ringan diselesaikan oleh Kepala Soa secara kekeluargaan
2. Pelanggaran sedang dibawa ke Saniri Negeri untuk mendapatkan keputusan
3. Pelanggaran berat (tindak pidana) diserahkan kepada pihak kepolisian sesuai hukum yang berlaku

═══════════════════════════════════════

BAB VI
PEMBANGUNAN NEGERI

Pasal 12 - Musyawarah Perencanaan
1. Perencanaan pembangunan negeri dilakukan melalui Musrenbang (Musyawarah Perencanaan Pembangunan) yang melibatkan seluruh elemen masyarakat
2. Musrenbang dilaksanakan minimal 1 (satu) kali dalam setahun
3. Prioritas pembangunan ditentukan berdasarkan kebutuhan dan aspirasi masyarakat

Pasal 13 - Partisipasi Masyarakat
1. Setiap pembangunan fasilitas umum melibatkan partisipasi aktif masyarakat
2. Partisipasi dapat berupa tenaga, material, atau dana sesuai kemampuan
3. Transparansi dan akuntabilitas pengelolaan pembangunan harus dijaga oleh Pemerintah Negeri

═══════════════════════════════════════

BAB VII
PENUTUP

Pasal 14 - Perubahan Peraturan
Perubahan terhadap Peraturan Negeri ini hanya dapat dilakukan melalui musyawarah Saniri Negeri dengan persetujuan minimal 2/3 (dua per tiga) jumlah anggota yang hadir.

Pasal 15 - Ketentuan Penutup
Peraturan Negeri ini mulai berlaku sejak tanggal ditetapkan dan mengikat seluruh warga Negeri Haria.

Ditetapkan di Negeri Haria
Pada tanggal 1 Januari 2025

Mengetahui,
SANIRI NEGERI HARIA                    KEPALA NEGERI HARIA


[Ketua Saniri]                                [Nama Kepala Negeri]"
            ]);
            
            $this->command->info('✓ Dummy Peraturan Negeri (upgraded) berhasil ditambahkan!');
        } else {
            $this->command->error('✗ Village Profile tidak ditemukan!');
        }
    }
}
