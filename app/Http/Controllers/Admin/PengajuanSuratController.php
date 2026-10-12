<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    /**
     * Tampilkan daftar pengajuan surat
     */
    public function index(Request $request)
    {
        $query = PengajuanSurat::query();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search by NIK or nama
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nik', 'like', "%{$search}%")
                  ->orWhere('nama', 'like', "%{$search}%");
            });
        }

        $pengajuans = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.pengajuan-surat.index', compact('pengajuans'));
    }

    /**
     * Tampilkan detail pengajuan
     */
    public function show($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        return view('admin.pengajuan-surat.show', compact('pengajuan'));
    }

    /**
     * Form edit status dan catatan admin
     */
    public function edit($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        return view('admin.pengajuan-surat.edit', compact('pengajuan'));
    }

    /**
     * Update status dan catatan admin
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string|max:1000',
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->update($validated);

        return redirect()
            ->route('admin.pengajuan-surat.index')
            ->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    /**
     * Hapus pengajuan surat
     */
    public function destroy($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->delete();

        return redirect()
            ->route('admin.pengajuan-surat.index')
            ->with('success', 'Pengajuan surat berhasil dihapus!');
    }
}
