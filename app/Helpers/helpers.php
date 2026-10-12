<?php

use App\Helpers\SiteHelper;

if (!function_exists('site_setting')) {
    /**
     * Helper function untuk mendapatkan site setting
     */
    function site_setting($key, $default = null)
    {
        return \App\Models\SiteSetting::get($key, $default);
    }
}

if (!function_exists('admin_wa_url')) {
    /**
     * Helper function untuk generate URL WhatsApp Admin
     */
    function admin_wa_url($message = '')
    {
        return SiteHelper::getAdminWaUrl($message);
    }
}

if (!function_exists('admin_wa_number')) {
    /**
     * Helper function untuk mendapatkan nomor WA admin
     */
    function admin_wa_number()
    {
        return SiteHelper::getAdminWaNumber();
    }
}
