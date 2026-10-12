<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSurat = [
            [
                'nama_surat' => 'Surat Keterangan Domisili',
                'persyaratan' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat Pengantar RT/RW',
                ],
                'urutan' => 1,
            ],
            [
                'nama_surat' => 'Surat Keterangan Usaha',
                'persyaratan' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Foto tempat usaha',
                    'Surat keterangan dari RT/RW',
                ],
                'urutan' => 2,
            ],
            [
                'nama_surat' => 'Surat Keterangan Tidak Mampu',
                'persyaratan' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat Pengantar RT/RW',
                    'Foto kondisi rumah (tampak depan)',
                ],
                'urutan' => 3,
            ],
            [
                'nama_surat' => 'Surat Pengantar KTP',
                'persyaratan' => [
                    'Fotokopi KTP lama (jika perpanjangan)',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Pas foto 4x6 (2 lembar, background merah)',
                ],
                'urutan' => 4,
            ],
            [
                'nama_surat' => 'Surat Pengantar KK',
                'persyaratan' => [
                    'Fotokopi KTP Kepala Keluarga',
                    'Fotokopi KTP anggota keluarga',
                    'Fotokopi Surat Nikah/Akta Kelahiran',
                    'Fotokopi KK lama (jika ada)',
                ],
                'urutan' => 5,
            ],
            [
                'nama_surat' => 'Surat Keterangan Kelahiran',
                'persyaratan' => [
                    'Fotokopi KTP kedua orang tua',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Fotokopi Surat Nikah orang tua',
                    'Surat keterangan lahir dari Bidan/Rumah Sakit',
                ],
                'urutan' => 6,
            ],
            [
                'nama_surat' => 'Surat Keterangan Kematian',
                'persyaratan' => [
                    'Fotokopi KTP yang meninggal',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat keterangan kematian dari RT/RW',
                    'Fotokopi KTP pelapor',
                ],
                'urutan' => 7,
            ],
            [
                'nama_surat' => 'Surat Keterangan Pindah',
                'persyaratan' => [
                    'Fotokopi KTP seluruh anggota keluarga yang pindah',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat Pengantar RT/RW',
                    'Surat keterangan pindah dari desa asal (jika pindah masuk)',
                ],
                'urutan' => 8,
            ],
            [
                'nama_surat' => 'Lainnya',
                'persyaratan' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Dokumen pendukung lainnya (sesuai keperluan)',
                ],
                'urutan' => 99,
            ],
        ];

        foreach ($jenisSurat as $data) {
            JenisSurat::create($data);
        }
    }
}
