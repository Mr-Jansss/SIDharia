<?php

namespace App\Http\Controllers;

use App\Helpers\SiteHelper;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    /**
     * Tampilkan form pengajuan surat (Public)
     */
    public function create()
    {
        $heroText = site_setting('pengajuan_hero_text', '');
        $instructionText = site_setting('pengajuan_instruction_text', '');
        
        // Ambil jenis surat yang aktif dari database
        $jenisSuratList = JenisSurat::active()->ordered()->get();
        
        return view('public.pengajuan.create', compact('heroText', 'instructionText', 'jenisSuratList'));
    }

    /**
     * Simpan pengajuan surat dan redirect ke halaman sukses
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16',
            'nama' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:20',
            'jenis_surat' => 'required|string|max:255',
            'keperluan' => 'required|string|max:1000',
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus 16 digit',
            'nama.required' => 'Nama lengkap wajib diisi',
            'nomor_wa.required' => 'Nomor WhatsApp wajib diisi',
            'jenis_surat.required' => 'Jenis surat wajib dipilih',
            'keperluan.required' => 'Keperluan wajib diisi',
        ]);

        // Simpan data pengajuan dengan status pending
        $pengajuan = PengajuanSurat::create($validated);

        // Redirect ke halaman sukses dengan ID pengajuan
        return redirect()->route('pengajuan-surat.success', $pengajuan->id);
    }

    /**
     * Halaman sukses setelah submit (dengan tombol WhatsApp)
     */
    public function success($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);

        // Get syarat surat dari database
        $jenisSurat = JenisSurat::where('nama_surat', $pengajuan->jenis_surat)->first();
        $syarat = $jenisSurat ? $jenisSurat->persyaratan : ['Fotokopi KTP', 'Fotokopi Kartu Keluarga (KK)'];

        // Generate pesan WhatsApp otomatis
        $message = "Halo Admin Negeri Haria,\n\n";
        $message .= "Saya telah mengisi formulir pengajuan surat:\n\n";
        $message .= "NIK: {$pengajuan->nik}\n";
        $message .= "Nama: {$pengajuan->nama}\n";
        $message .= "Jenis Surat: {$pengajuan->jenis_surat}\n";
        $message .= "Keperluan: {$pengajuan->keperluan}\n\n";
        $message .= "Berikut berkas persyaratan yang saya lampirkan:\n\n";
        
        // Tambahkan daftar syarat
        foreach ($syarat as $index => $item) {
            $num = $index + 1;
            $message .= "{$num}. {$item}\n";
        }
        
        $message .= "\nTerima kasih.";

        $waUrl = admin_wa_url($message);

        return view('public.pengajuan.success', compact('pengajuan', 'waUrl', 'syarat'));
    }

    /**
     * Halaman cek status pengajuan by NIK
     */
    public function checkStatus()
    {
        return view('public.pengajuan.check-status');
    }

    /**
     * Proses cek status berdasarkan NIK
     */
    public function getStatus(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16',
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus 16 digit',
        ]);

        $pengajuans = PengajuanSurat::where('nik', $request->nik)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($pengajuans->isEmpty()) {
            return back()->with('error', 'Tidak ada pengajuan surat ditemukan dengan NIK tersebut.');
        }

        return view('public.pengajuan.status-result', compact('pengajuans'));
    }
}
