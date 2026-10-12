<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FotoPengaduan extends Model
{
    protected $table = 'foto_pengaduan';

    protected $fillable = [
        'pengaduan_id',
        'file_path',
    ];

    /**
     * Relasi ke Pengaduan
     */
    public function pengaduan(): BelongsTo
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
