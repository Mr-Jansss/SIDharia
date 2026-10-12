<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\TanggapanPengaduan;
use App\Mail\TanggapanPengaduanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class PengaduanController extends Controller
{
    /**
     * Tampilkan daftar pengaduan
     */
    public function index(Request $request)
    {
        $query = Pengaduan::with('fotos');

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search berdasarkan nomor pengaduan, judul, atau nama pelapor
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nomor_pengaduan', 'like', "%{$search}%")
                  ->orWhere('judul', 'like', "%{$search}%")
                  ->orWhere('nama_pelapor', 'like', "%{$search}%")
                  ->orWhere('google_email', 'like', "%{$search}%");
            });
        }

        $pengaduans = $query->latest()->paginate(15);

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    /**
     * Tampilkan detail pengaduan
     */
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load(['fotos', 'tanggapans']);

        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Tampilkan form edit pengaduan (update status)
     */
    public function edit(Pengaduan $pengaduan)
    {
        $pengaduan->load(['fotos', 'tanggapans']);

        return view('admin.pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update status pengaduan dan simpan tanggapan
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
            'isi_tanggapan' => 'required|string|min:20',
        ], [
            'isi_tanggapan.required' => 'Tanggapan wajib diisi',
            'isi_tanggapan.min' => 'Tanggapan minimal 20 karakter',
            'status.required' => 'Status wajib dipilih',
        ]);

        DB::beginTransaction();
        try {
            // Update status pengaduan
            $pengaduan->update(['status' => $validated['status']]);

            // Simpan tanggapan
            $tanggapan = TanggapanPengaduan::create([
                'pengaduan_id' => $pengaduan->id,
                'isi_tanggapan' => $validated['isi_tanggapan'],
            ]);

            // Kirim email notifikasi
            try {
                Mail::to($pengaduan->google_email)->send(
                    new TanggapanPengaduanMail($pengaduan, $tanggapan)
                );
                $emailStatus = 'Email notifikasi berhasil dikirim ke pelapor';
            } catch (\Exception $e) {
                $emailStatus = 'Tanggapan tersimpan tapi email gagal dikirim: ' . $e->getMessage();
            }

            DB::commit();

            return redirect()->route('admin.pengaduan.show', $pengaduan)
                ->with('success', 'Status dan tanggapan berhasil disimpan. ' . $emailStatus);

        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->with('error', 'Gagal menyimpan tanggapan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Hapus pengaduan (hard delete dengan cleanup foto)
     */
    public function destroy(Pengaduan $pengaduan)
    {
        DB::beginTransaction();
        try {
            // Hapus semua foto dari storage
            foreach ($pengaduan->fotos as $foto) {
                if (Storage::disk('public')->exists($foto->file_path)) {
                    Storage::disk('public')->delete($foto->file_path);
                }
            }

            // Hard delete pengaduan (cascade akan hapus fotos dan tanggapan)
            $pengaduan->delete();

            DB::commit();

            return redirect()->route('admin.pengaduan.index')
                ->with('success', 'Pengaduan dan semua file terkait berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Gagal menghapus pengaduan: ' . $e->getMessage());
        }
    }

    /**
     * Statistik pengaduan untuk dashboard
     */
    public function statistics()
    {
        $stats = [
            'total' => Pengaduan::count(),
            'menunggu' => Pengaduan::where('status', 'menunggu')->count(),
            'diproses' => Pengaduan::where('status', 'diproses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
            'today' => Pengaduan::whereDate('created_at', today())->count(),
            'this_week' => Pengaduan::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => Pengaduan::whereMonth('created_at', now()->month)->count(),
        ];

        $recentPengaduans = Pengaduan::latest()->take(5)->get();

        return response()->json([
            'stats' => $stats,
            'recent' => $recentPengaduans,
        ]);
    }
}
