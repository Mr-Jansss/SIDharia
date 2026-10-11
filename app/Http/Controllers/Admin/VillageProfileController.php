<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;

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
            'history' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
        ]);

        $villageProfile->update($validated);

        return redirect()
            ->route('admin.village-profiles.index')
            ->with('success', 'Profil desa berhasil diperbarui!');
    }
}
