<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'village_name',
        'profile_overview',
        'sejarah',
        'visi',
        'misi',
        'pemerintahan',
        'struktur_organisasi',
        'logo',
        'address',
        'phone',
        'email',
        'website',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
