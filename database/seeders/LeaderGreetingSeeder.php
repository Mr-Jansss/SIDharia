<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeaderGreeting;

class LeaderGreetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeaderGreeting::create([
            'leader_name' => 'Bapak John Doe',
            'leader_position' => 'Kepala Negeri Haria',
            'greeting_text' => 'Selamat datang di website resmi Negeri Haria. Kami berkomitmen untuk terus meningkatkan pelayanan kepada masyarakat dan mengembangkan potensi daerah. Melalui platform digital ini, kami berharap dapat memberikan informasi yang transparan dan memudahkan masyarakat dalam mengakses berbagai layanan administrasi. Mari kita bersama-sama membangun Negeri Haria yang lebih maju, sejahtera, dan bermartabat.',
            'is_active' => true,
        ]);
    }
}
