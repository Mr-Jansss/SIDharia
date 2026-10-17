<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaderGreeting extends Model
{
    protected $fillable = [
        'leader_name',
        'leader_position',
        'greeting_text',
        'leader_photo',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
