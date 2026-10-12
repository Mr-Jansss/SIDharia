<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'key_name',
        'value',
    ];

    /**
     * Helper method untuk mendapatkan setting berdasarkan key
     */
    public static function get($key, $default = null)
    {
        $setting = self::where('key_name', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Helper method untuk set setting
     */
    public static function set($key, $value)
    {
        return self::updateOrCreate(
            ['key_name' => $key],
            ['value' => $value]
        );
    }
}
