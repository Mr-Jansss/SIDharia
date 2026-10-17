<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageProfileController extends Controller
{
    public function index()
    {
        // Get the single village profile record (or create if doesn't exist)
        $profile = VillageProfile::firstOrCreate([]);
        
        return view('admin.village-profiles.index', compact('profile'));
    }

    public function edit(VillageProfile $villageProfile)
    {
        return view('admin.village-profiles.edit', compact('villageProfile'));
    }

    public function update(Request $request, VillageProfile $villageProfile)
    {
        $validated = $request->validate([
            'village_name' => 'nullable|string|max:255',
            'profile_overview' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'pemerintahan' => 'nullable|string',
            'struktur_organisasi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($villageProfile->logo) {
                Storage::disk('public')->delete($villageProfile->logo);
            }
            $validated['logo'] = $request->file('logo')->store('village', 'public');
        }

        $villageProfile->update($validated);

        return redirect()
            ->route('admin.village-profiles.index')
            ->with('success', 'Profil Negeri berhasil diperbarui!');
    }
}

