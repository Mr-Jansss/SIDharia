<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    /**
     * Redirect ke Google OAuth
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google OAuth
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Simpan data user Google ke session (stateless - tidak disimpan ke database)
            session([
                'google_auth' => [
                    'email' => $googleUser->getEmail(),
                    'nama' => $googleUser->getName(),
                    'avatar' => $googleUser->getAvatar(),
                    'verified_at' => now(),
                ]
            ]);

            // Redirect ke halaman form pengaduan dengan session Google berhasil
            return redirect()->route('pengaduan.create')
                ->with('success', 'Berhasil login dengan Google');
                
        } catch (\Exception $e) {
            return redirect()->route('pengaduan.create')
                ->with('error', 'Gagal login dengan Google. Silakan coba lagi.');
        }
    }

    /**
     * Logout dari Google session
     */
    public function logout()
    {
        session()->forget('google_auth');
        
        return redirect()->route('pengaduan.create')
            ->with('success', 'Berhasil logout');
    }
}
