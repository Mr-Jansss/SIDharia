<?php

namespace Database\Seeders;

use App\Models\VillageStatistic;
use Illuminate\Database\Seeder;

class VillageStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        VillageStatistic::truncate();

        // Create dummy statistics data
        VillageStatistic::create([
            // Data Statistik Umum
            'total_kk' => 450,
            'total_penduduk' => 1850,
            
            // Data Jenis Kelamin
            'jumlah_laki_laki' => 920,
            'jumlah_perempuan' => 930,
            
            // Data Pendidikan
            'pendidikan_paud' => 85,
            'pendidikan_tk' => 120,
            'pendidikan_sd' => 280,
            'pendidikan_smp' => 210,
            'pendidikan_sma' => 180,
            'pendidikan_s1' => 95,
            
            // Data Pekerjaan
            'pekerjaan_petani' => 320,
            'pekerjaan_nelayan' => 280,
            'pekerjaan_pedagang' => 150,
            'pekerjaan_pns' => 85,
            'pekerjaan_guru' => 65,
            'pekerjaan_wiraswasta' => 180,
            'pekerjaan_buruh' => 220,
            'pekerjaan_lainnya' => 120,
        ]);
    }
}
