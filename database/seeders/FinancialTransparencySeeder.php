<?php

namespace Database\Seeders;

use App\Models\FinancialTransparency;
use Illuminate\Database\Seeder;

class FinancialTransparencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;

        // 1. APB Negeri Data
        FinancialTransparency::create([
            'title' => 'APB Negeri Haria Tahun ' . $currentYear,
            'category' => 'apb_negeri',
            'fiscal_year' => $currentYear,
            'description' => 'Anggaran Pendapatan dan Belanja Negeri Haria untuk tahun anggaran ' . $currentYear . ' yang telah disahkan oleh Saniri Negeri.',
            'budget_amount' => 2850000000, // 2.85 Miliar
            'is_published' => true,
            'additional_data' => [
                'type' => 'pendapatan',
                'breakdown' => [
                    'Dana Desa' => 1500000000,
                    'Alokasi Dana Negeri' => 800000000,
                    'Pendapatan Asli Negeri' => 350000000,
                    'Bantuan Keuangan Provinsi' => 200000000,
                ]
            ]
        ]);

        FinancialTransparency::create([
            'title' => 'Belanja Pembangunan Infrastruktur',
            'category' => 'apb_negeri',
            'fiscal_year' => $currentYear,
            'description' => 'Alokasi anggaran untuk pembangunan dan perbaikan infrastruktur negeri seperti jalan, jembatan, dan fasilitas umum.',
            'budget_amount' => 1200000000,
            'is_published' => true,
            'additional_data' => [
                'type' => 'belanja',
                'projects' => [
                    'Pembangunan Jalan Negeri' => 500000000,
                    'Perbaikan Jembatan' => 300000000,
                    'Renovasi Balai Negeri' => 250000000,
                    'Sarana Air Bersih' => 150000000,
                ]
            ]
        ]);

        FinancialTransparency::create([
            'title' => 'Belanja Operasional Pemerintahan',
            'category' => 'apb_negeri',
            'fiscal_year' => $currentYear,
            'description' => 'Anggaran untuk operasional pemerintahan negeri, termasuk gaji aparatur, ATK, dan kegiatan administrasi.',
            'budget_amount' => 650000000,
            'is_published' => true,
            'additional_data' => [
                'type' => 'belanja'
            ]
        ]);

        // 2. Laporan Realisasi Anggaran
        FinancialTransparency::create([
            'title' => 'Realisasi Anggaran Semester 1 Tahun ' . $currentYear,
            'category' => 'realisasi_anggaran',
            'fiscal_year' => $currentYear,
            'semester' => '1',
            'description' => 'Laporan realisasi penyerapan anggaran untuk periode Januari - Juni ' . $currentYear . '.',
            'budget_amount' => 2850000000,
            'realization_amount' => 1368000000, // 48%
            'percentage' => 48.00,
            'is_published' => true,
        ]);

        FinancialTransparency::create([
            'title' => 'Realisasi Anggaran Semester 2 Tahun ' . $lastYear,
            'category' => 'realisasi_anggaran',
            'fiscal_year' => $lastYear,
            'semester' => '2',
            'description' => 'Laporan realisasi penyerapan anggaran untuk periode Juli - Desember ' . $lastYear . '.',
            'budget_amount' => 2650000000,
            'realization_amount' => 2279000000, // 86%
            'percentage' => 86.00,
            'is_published' => true,
        ]);

        FinancialTransparency::create([
            'title' => 'Realisasi Anggaran Tahunan ' . $lastYear,
            'category' => 'realisasi_anggaran',
            'fiscal_year' => $lastYear,
            'semester' => 'tahunan',
            'description' => 'Laporan realisasi penyerapan anggaran keseluruhan tahun anggaran ' . $lastYear . '.',
            'budget_amount' => 2650000000,
            'realization_amount' => 2438500000, // 92%
            'percentage' => 92.00,
            'is_published' => true,
        ]);

        // 3. Penyaluran BLT & Bansos
        FinancialTransparency::create([
            'title' => 'BLT Dana Desa Tahun ' . $currentYear,
            'category' => 'blt_bansos',
            'fiscal_year' => $currentYear,
            'description' => 'Bantuan Langsung Tunai dari Dana Desa untuk keluarga terdampak ekonomi dan keluarga miskin di Negeri Haria.',
            'budget_amount' => 360000000, // 360 juta
            'beneficiary_count' => 120, // 120 KPM
            'is_published' => true,
            'additional_data' => [
                'type' => 'BLT-DD',
                'amount_per_kpm' => 3000000, // 3 juta per KPM
                'breakdown' => [
                    'Soa Pattimura' => 35,
                    'Soa Matakau' => 28,
                    'Soa Sopacua' => 32,
                    'Soa Rehatta' => 25,
                ]
            ]
        ]);

        FinancialTransparency::create([
            'title' => 'Bantuan Sosial Lansia dan Disabilitas',
            'category' => 'blt_bansos',
            'fiscal_year' => $currentYear,
            'description' => 'Bantuan sosial khusus untuk warga lanjut usia (60 tahun ke atas) dan penyandang disabilitas di Negeri Haria.',
            'budget_amount' => 48000000, // 48 juta
            'beneficiary_count' => 32, // 32 orang
            'is_published' => true,
            'additional_data' => [
                'type' => 'Bansos Lansia & Disabilitas',
                'amount_per_person' => 1500000, // 1.5 juta per orang
                'breakdown' => [
                    'Lansia (60+)' => 24,
                    'Penyandang Disabilitas' => 8,
                ]
            ]
        ]);

        FinancialTransparency::create([
            'title' => 'Bantuan Pendidikan Anak Kurang Mampu',
            'category' => 'blt_bansos',
            'fiscal_year' => $currentYear,
            'description' => 'Program bantuan biaya pendidikan untuk anak-anak dari keluarga kurang mampu, mulai dari SD hingga SMA.',
            'budget_amount' => 75000000, // 75 juta
            'beneficiary_count' => 50, // 50 siswa
            'is_published' => true,
            'additional_data' => [
                'type' => 'Bantuan Pendidikan',
                'amount_per_student' => 1500000, // 1.5 juta per siswa
                'breakdown' => [
                    'SD/Sederajat' => 20,
                    'SMP/Sederajat' => 18,
                    'SMA/Sederajat' => 12,
                ]
            ]
        ]);

        // 4. LPPD / LKPPD
        FinancialTransparency::create([
            'title' => 'LPPD Negeri Haria Tahun ' . $lastYear,
            'category' => 'lppd',
            'fiscal_year' => $lastYear,
            'description' => 'Laporan Penyelenggaraan Pemerintahan Negeri Haria yang mencakup aspek penyelenggaraan pemerintahan, pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat.',
            'is_published' => true,
            'additional_data' => [
                'sections' => [
                    [
                        'title' => 'Penyelenggaraan Pemerintahan',
                        'description' => 'Laporan kinerja administrasi pemerintahan dan pelayanan publik',
                        'icon' => 'fas fa-building'
                    ],
                    [
                        'title' => 'Pembangunan Infrastruktur',
                        'description' => 'Realisasi proyek pembangunan dan pemeliharaan infrastruktur',
                        'icon' => 'fas fa-road'
                    ],
                    [
                        'title' => 'Pembinaan Kemasyarakatan',
                        'description' => 'Program pembinaan dan pengembangan SDM masyarakat',
                        'icon' => 'fas fa-users'
                    ],
                    [
                        'title' => 'Pemberdayaan Ekonomi',
                        'description' => 'Kegiatan pemberdayaan ekonomi masyarakat dan UMKM',
                        'icon' => 'fas fa-hand-holding-usd'
                    ],
                ],
                'statistics' => [
                    ['label' => 'Proyek Selesai', 'value' => '24'],
                    ['label' => 'Program Sosial', 'value' => '15'],
                    ['label' => 'Pelatihan UMKM', 'value' => '8'],
                    ['label' => 'Penerima Manfaat', 'value' => '450+'],
                ]
            ]
        ]);

        FinancialTransparency::create([
            'title' => 'LKPPD kepada Saniri Negeri Tahun ' . $lastYear,
            'category' => 'lppd',
            'fiscal_year' => $lastYear,
            'description' => 'Laporan Keterangan Pertanggungjawaban Pemerintah Negeri yang disampaikan kepada Saniri Negeri Haria sebagai bentuk akuntabilitas kinerja pemerintahan.',
            'is_published' => true,
            'additional_data' => [
                'presented_to' => 'Saniri Negeri Haria',
                'presentation_date' => $lastYear . '-12-28',
                'sections' => [
                    [
                        'title' => 'Pelaksanaan APB Negeri',
                        'description' => 'Pertanggungjawaban realisasi anggaran dan keuangan negeri',
                        'icon' => 'fas fa-coins'
                    ],
                    [
                        'title' => 'Capaian Program Kerja',
                        'description' => 'Evaluasi pencapaian program dan kegiatan pemerintahan',
                        'icon' => 'fas fa-tasks'
                    ],
                    [
                        'title' => 'Aset dan Inventaris Negeri',
                        'description' => 'Daftar aset dan inventaris milik pemerintah negeri',
                        'icon' => 'fas fa-warehouse'
                    ],
                    [
                        'title' => 'Rencana Kerja Mendatang',
                        'description' => 'Rencana program dan kegiatan untuk tahun berikutnya',
                        'icon' => 'fas fa-calendar-alt'
                    ],
                ]
            ]
        ]);

        FinancialTransparency::create([
            'title' => 'Daftar Inventaris Aset Negeri ' . $currentYear,
            'category' => 'lppd',
            'fiscal_year' => $currentYear,
            'description' => 'Daftar lengkap inventaris aset dan barang milik Pemerintah Negeri Haria, termasuk tanah, bangunan, kendaraan, dan peralatan kantor.',
            'is_published' => true,
            'additional_data' => [
                'asset_types' => [
                    'Tanah' => '12 bidang',
                    'Bangunan' => '8 unit',
                    'Kendaraan' => '5 unit',
                    'Peralatan Kantor' => '150+ item',
                ],
                'total_value' => 4500000000 // 4.5 Miliar
            ]
        ]);
    }
}
