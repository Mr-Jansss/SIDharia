<?php

namespace App\Helpers;

use App\Models\SiteSetting;

class SiteHelper
{
    /**
     * Mendapatkan nomor WA admin dengan format untuk URL wa.me
     * Convert 08... menjadi 628...
     */
    public static function getAdminWaUrl($message = '')
    {
        $number = SiteSetting::get('admin_wa_number', '081340089147');
        
        // Convert format Indonesia ke international
        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }
        
        // Hapus semua karakter non-digit
        $number = preg_replace('/[^0-9]/', '', $number);
        
        $url = "https://wa.me/{$number}";
        
        if (!empty($message)) {
            $url .= '?text=' . urlencode($message);
        }
        
        return $url;
    }

    /**
     * Mendapatkan teks setting berdasarkan key
     */
    public static function getText($key, $default = '')
    {
        return SiteSetting::get($key, $default);
    }

    /**
     * Mendapatkan nomor WA admin (raw format)
     */
    public static function getAdminWaNumber()
    {
        return SiteSetting::get('admin_wa_number', '081340089147');
    }
}
