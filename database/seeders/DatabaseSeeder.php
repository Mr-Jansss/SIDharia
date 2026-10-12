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

        // Call seeders with complete data including images
        $this->call([
            VillageProfileSeeder::class,
            CompleteDataSeeder::class,
            HeroSliderSeeder::class,
            SiteSettingSeeder::class,
            JenisSuratSeeder::class,
            PengaduanSeeder::class,
        ]);
    }
}
