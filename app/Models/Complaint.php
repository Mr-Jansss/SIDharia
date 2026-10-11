<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complaint extends Model
{
    protected $fillable = [
        'reporter_name',
        'reporter_email',
        'title',
        'description',
        'status',
        'admin_reply',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ComplaintImage::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessed($query)
    {
        return $query->where('status', 'processed');
    }

    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu',
            'processed' => 'Diproses',
            'resolved' => 'Selesai',
            default => 'Tidak Diketahui',
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'processed' => 'blue',
            'resolved' => 'green',
            default => 'gray',
        };
    }
}
