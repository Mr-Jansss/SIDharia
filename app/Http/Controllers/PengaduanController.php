<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\FotoPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Tampilkan form pengaduan (dengan gate Google OAuth)
     */
    public function create(Request $request)
    {
        // Cek apakah user sudah login via Google
        $googleAuth = session('google_auth');
        
        // Fallback: cek dari cache kalau session hilang
        if (!$googleAuth) {
            $sessionId = $request->session()->getId();
            $googleAuth = cache()->get("google_auth_{$sessionId}");
            
            // Kalau ada di cache, restore ke session
            if ($googleAuth) {
                session()->put('google_auth', $googleAuth);
                session()->save();
                \Log::info('Google Auth restored from cache', ['session_id' => $sessionId]);
            }
        }
        
        \Log::info('=== PENGADUAN CREATE PAGE ===');
        \Log::info('Google Auth exists:', ['exists' => !is_null($googleAuth)]);
        if ($googleAuth) {
            \Log::info('Google Auth Data:', $googleAuth);
        }
        
        return view('pengaduan.create', compact('googleAuth'));
    }

    /**
     * Simpan pengaduan baru
     */
    public function store(Request $request)
    {
        // Debug logging
        \Log::info('=== PENGADUAN STORE CALLED ===');
        \Log::info('Request Data:', $request->all());
        \Log::info('Session Data:', session()->all());
        
        // Validasi session Google
        $googleAuth = session('google_auth');
        \Log::info('Google Auth:', ['exists' => !is_null($googleAuth), 'data' => $googleAuth]);
        
        if (!$googleAuth) {
            \Log::warning('Google Auth Not Found - Redirecting to create');
            return redirect()->route('pengaduan.create')
                ->with('error', 'Silakan login dengan Google terlebih dahulu');
        }

        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_laporan' => 'required|string|min:20',
            'foto.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048', // max 2MB per foto
        ], [
            'judul.required' => 'Judul pengaduan wajib diisi',
            'judul.max' => 'Judul maksimal 255 karakter',
            'isi_laporan.required' => 'Isi laporan wajib diisi',
            'isi_laporan.min' => 'Isi laporan minimal 20 karakter',
            'foto.*.image' => 'File harus berupa gambar',
            'foto.*.mimes' => 'Format foto harus jpeg, jpg, png, atau webp',
            'foto.*.max' => 'Ukuran foto maksimal 2MB',
        ]);

        // Validasi maksimal 5 foto
        if ($request->hasFile('foto') && count($request->file('foto')) > 5) {
            return back()->with('error', 'Maksimal 5 foto yang dapat diunggah')->withInput();
        }

        DB::beginTransaction();
        try {
            // Simpan pengaduan
            $pengaduan = Pengaduan::create([
                'google_email' => $googleAuth['email'],
                'nama_pelapor' => $googleAuth['nama'],
                'judul' => $validated['judul'],
                'isi_laporan' => $validated['isi_laporan'],
                'status' => 'menunggu',
            ]);

            // Upload foto jika ada
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $foto) {
                    $path = $foto->store('pengaduan', 'public');
                    
                    FotoPengaduan::create([
                        'pengaduan_id' => $pengaduan->id,
                        'file_path' => $path,
                    ]);
                }
            }

            DB::commit();

            \Log::info('Pengaduan berhasil disimpan', ['id' => $pengaduan->id, 'nomor' => $pengaduan->nomor_pengaduan]);
            
            return redirect()->route('pengaduan.success', $pengaduan->id)
                ->with('success', 'Pengaduan berhasil dikirim');

        } catch (\Exception $e) {
            DB::rollBack();
            
            \Log::error('Error menyimpan pengaduan', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.')
                ->withInput();
        }
    }

    /**
     * Halaman sukses setelah pengaduan dikirim
     */
    public function success($id)
    {
        $pengaduan = Pengaduan::with('fotos')->findOrFail($id);
        
        // Validasi akses (hanya pelapor yang bisa lihat)
        $googleAuth = session('google_auth');
        if (!$googleAuth || $googleAuth['email'] !== $pengaduan->google_email) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini');
        }

        return view('pengaduan.success', compact('pengaduan'));
    }

    /**
     * Halaman cek status pengaduan
     */
    public function checkStatus()
    {
        return view('pengaduan.check-status');
    }

    /**
     * Proses cek status pengaduan (AJAX)
     */
    public function getStatus(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nomor_pengaduan' => 'required|string',
        ]);

        // Format nomor pengaduan: PGD-YYYYMMDD-ID
        $pengaduan = Pengaduan::where('google_email', $request->email)
            ->where('nomor_pengaduan', $request->nomor_pengaduan)
            ->with(['fotos', 'latestTanggapan'])
            ->first();

        if (!$pengaduan) {
            return response()->json([
                'success' => false,
                'message' => 'Pengaduan tidak ditemukan atau email tidak cocok',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'nomor_pengaduan' => $pengaduan->nomor_pengaduan,
                'judul' => $pengaduan->judul,
                'isi_laporan' => $pengaduan->isi_laporan,
                'status' => $pengaduan->status,
                'status_label' => $pengaduan->getStatusLabel(),
                'status_color' => $pengaduan->getStatusColor(),
                'tanggal_lapor' => $pengaduan->created_at->format('d/m/Y H:i'),
                'jumlah_foto' => $pengaduan->fotos->count(),
                'tanggapan' => $pengaduan->latestTanggapan ? [
                    'isi' => $pengaduan->latestTanggapan->isi_tanggapan,
                    'tanggal' => $pengaduan->latestTanggapan->created_at->format('d/m/Y H:i'),
                ] : null,
            ],
        ]);
    }
}
