<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nomor_pengaduan',
        'google_email',
        'nama_pelapor',
        'judul',
        'isi_laporan',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke FotoPengaduan
     */
    public function fotos(): HasMany
    {
        return $this->hasMany(FotoPengaduan::class, 'pengaduan_id', 'id');
    }

    /**
     * Relasi ke TanggapanPengaduan (satu pengaduan bisa punya banyak tanggapan)
     */
    public function tanggapans(): HasMany
    {
        return $this->hasMany(TanggapanPengaduan::class, 'pengaduan_id', 'id');
    }

    /**
     * Relasi untuk ambil tanggapan terakhir
     */
    public function latestTanggapan()
    {
        return $this->hasOne(TanggapanPengaduan::class, 'pengaduan_id', 'id')->latestOfMany();
    }

    /**
     * Generate nomor pengaduan otomatis
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pengaduan) {
            // Format: PGD-YYYYMMDD-ID
            $date = now()->format('Ymd');
            $lastId = $pengaduan->id ?? (static::max('id') + 1);
            $pengaduan->nomor_pengaduan = 'PGD-' . $date . '-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
        });
    }

    /**
     * Helper untuk label status
     */
    public function getStatusLabel(): string
    {
        return match($this->status) {
            'menunggu' => 'Menunggu Ditanggapi',
            'diproses' => 'Sedang Diproses',
            'selesai' => 'Selesai Ditanggapi',
            default => 'Tidak Diketahui',
        };
    }

    /**
     * Helper untuk warna status badge
     */
    public function getStatusColor(): string
    {
        return match($this->status) {
            'menunggu' => 'yellow',
            'diproses' => 'blue',
            'selesai' => 'green',
            default => 'gray',
        };
    }
}
