<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Tampilkan form pengaturan site settings
     */
    public function index()
    {
        $settings = [
            'admin_wa_number' => SiteSetting::get('admin_wa_number', '081340089147'),
            'pengajuan_hero_text' => SiteSetting::get('pengajuan_hero_text', ''),
            'pengajuan_instruction_text' => SiteSetting::get('pengajuan_instruction_text', ''),
            'pengaduan_hero_text' => SiteSetting::get('pengaduan_hero_text', ''),
            'pengaduan_instruction_text' => SiteSetting::get('pengaduan_instruction_text', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update site settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'admin_wa_number' => 'required|string|max:20',
            'pengajuan_hero_text' => 'required|string|max:500',
            'pengajuan_instruction_text' => 'required|string|max:500',
            'pengaduan_hero_text' => 'required|string|max:500',
            'pengaduan_instruction_text' => 'required|string|max:500',
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
