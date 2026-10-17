<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageStatistic;
use Illuminate\Http\Request;

class VillageStatisticController extends Controller
{
    public function index()
    {
        $statistic = VillageStatistic::firstOrCreate([]);
        return view('admin.statistics.index', compact('statistic'));
    }

    public function edit(VillageStatistic $villageStatistic)
    {
        return view('admin.statistics.edit', compact('villageStatistic'));
    }

    public function update(Request $request, VillageStatistic $villageStatistic)
    {
        $validated = $request->validate([
            'total_kk' => 'required|integer|min:0',
            'total_penduduk' => 'required|integer|min:0',
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
            'pendidikan_paud' => 'required|integer|min:0',
            'pendidikan_tk' => 'required|integer|min:0',
            'pendidikan_sd' => 'required|integer|min:0',
            'pendidikan_smp' => 'required|integer|min:0',
            'pendidikan_sma' => 'required|integer|min:0',
            'pendidikan_s1' => 'required|integer|min:0',
        ]);

        $villageStatistic->update($validated);

        return redirect()
            ->route('admin.statistics.index')
            ->with('success', 'Statistik Negeri berhasil diperbarui!');
    }
}
