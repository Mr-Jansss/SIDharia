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
    public function redirect(Request $request)
    {
        // Simpan session ID untuk tracking
        $sessionId = $request->session()->getId();
        \Log::info('OAuth Redirect - Session ID:', ['session_id' => $sessionId]);
        
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google OAuth
     */
    public function callback(Request $request)
    {
        try {
            // Set Guzzle options untuk disable SSL verify (development only)
            $guzzleConfig = [
                'verify' => config('services.guzzle.verify', true)
            ];
            
            $googleUser = Socialite::driver('google')
                ->setHttpClient(new \GuzzleHttp\Client($guzzleConfig))
                ->user();
            
            \Log::info('=== GOOGLE OAUTH CALLBACK SUCCESS ===');
            \Log::info('Google User Data:', [
                'email' => $googleUser->getEmail(),
                'nama' => $googleUser->getName(),
            ]);
            
            // Data yang akan disimpan
            $googleAuthData = [
                'email' => $googleUser->getEmail(),
                'nama' => $googleUser->getName(),
                'avatar' => $googleUser->getAvatar(),
                'verified_at' => now()->toDateTimeString(),
            ];
            
            // Simpan ke session
            $request->session()->put('google_auth', $googleAuthData);
            $request->session()->save();
            
            // Backup ke cache (fallback)
            $sessionId = $request->session()->getId();
            cache()->put("google_auth_{$sessionId}", $googleAuthData, now()->addMinutes(120));
            
            \Log::info('Session saved:', [
                'session_id' => $sessionId,
                'has_google_auth' => $request->session()->has('google_auth'),
            ]);

            return redirect()->route('pengaduan.create')
                ->with('success', 'Berhasil login dengan Google. Silakan isi form pengaduan.');
                
        } catch (\Exception $e) {
            \Log::error('Google OAuth Error:', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            
            return redirect()->route('pengaduan.create')
                ->with('error', 'Gagal login dengan Google: ' . $e->getMessage());
        }
    }

    /**
     * Logout dari Google session
     */
    public function logout(Request $request)
    {
        \Log::info('=== LOGOUT ATTEMPT ===');
        \Log::info('Session ID before logout:', ['session_id' => $request->session()->getId()]);
        \Log::info('Has google_auth before:', ['has' => $request->session()->has('google_auth')]);
        
        // Hapus dari session
        $request->session()->forget('google_auth');
        
        // Hapus dari cache juga
        $sessionId = $request->session()->getId();
        cache()->forget("google_auth_{$sessionId}");
        
        // Regenerate session untuk security
        $request->session()->regenerate();
        
        \Log::info('User logged out from Google Auth');
        \Log::info('Has google_auth after:', ['has' => $request->session()->has('google_auth')]);
        
        return redirect()->route('pengaduan.create')
            ->with('success', 'Berhasil logout. Silakan login kembali jika ingin membuat pengaduan baru.');
    }
}
