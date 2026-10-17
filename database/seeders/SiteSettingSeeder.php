<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key_name' => 'admin_wa_number',
                'value' => '081340089147',
            ],
            [
                'key_name' => 'pengajuan_hero_text',
                'value' => 'Ajukan berbagai jenis surat administrasi desa secara online. Isi formulir di bawah ini, lalu kirim persyaratan melalui WhatsApp.',
            ],
            [
                'key_name' => 'pengajuan_instruction_text',
                'value' => 'Setelah mengisi formulir, Anda akan diarahkan untuk mengirim berkas persyaratan melalui WhatsApp Admin Negeri.',
            ],
            [
                'key_name' => 'pengaduan_hero_text',
                'value' => 'Sampaikan keluhan, aspirasi, atau laporan Anda kepada Pemerintah Negeri Haria. Login dengan akun Google untuk melanjutkan.',
            ],
            [
                'key_name' => 'pengaduan_instruction_text',
                'value' => 'Anda dapat melampirkan maksimal 5 foto sebagai bukti pendukung pengaduan. Foto akan otomatis dikompresi untuk menghemat penyimpanan.',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key_name' => $setting['key_name']],
                ['value' => $setting['value']]
            );
        }
    }
}
