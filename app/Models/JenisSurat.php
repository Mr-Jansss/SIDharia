<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $table = 'jenis_surat';

    protected $fillable = [
        'nama_surat',
        'persyaratan',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'persyaratan' => 'array', // Auto-convert JSON ke array
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Scope untuk hanya ambil yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk sorting berdasarkan urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('nama_surat', 'asc');
    }
}
