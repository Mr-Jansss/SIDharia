<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageStatistic extends Model
{
    protected $fillable = [
        'total_kk',
        'total_penduduk',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'pendidikan_paud',
        'pendidikan_tk',
        'pendidikan_sd',
        'pendidikan_smp',
        'pendidikan_sma',
        'pendidikan_s1',
        'pekerjaan_petani',
        'pekerjaan_nelayan',
        'pekerjaan_pedagang',
        'pekerjaan_pns',
        'pekerjaan_guru',
        'pekerjaan_wiraswasta',
        'pekerjaan_buruh',
        'pekerjaan_lainnya',
    ];

    protected $casts = [
        'total_kk' => 'integer',
        'total_penduduk' => 'integer',
        'jumlah_laki_laki' => 'integer',
        'jumlah_perempuan' => 'integer',
        'pendidikan_paud' => 'integer',
        'pendidikan_tk' => 'integer',
        'pendidikan_sd' => 'integer',
        'pendidikan_smp' => 'integer',
        'pendidikan_sma' => 'integer',
        'pendidikan_s1' => 'integer',
        'pekerjaan_petani' => 'integer',
        'pekerjaan_nelayan' => 'integer',
        'pekerjaan_pedagang' => 'integer',
        'pekerjaan_pns' => 'integer',
        'pekerjaan_guru' => 'integer',
        'pekerjaan_wiraswasta' => 'integer',
        'pekerjaan_buruh' => 'integer',
        'pekerjaan_lainnya' => 'integer',
    ];
}
