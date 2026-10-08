<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            AccessLog::create([
                'user_id' => Auth::id(),
                'action' => 'login',
                'description' => 'User berhasil login',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            Http::post(
                'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage',
                [
                    'chat_id' => env('TELEGRAM_CHAT_ID'),
                    'text' => "🔐 LOGIN\n\n"
                            . "User     : {$user->name}\n"
                            . "Username : {$user->username}\n"
                            . "Waktu    : " . now()->format('d F Y H:i') . "\n"
                            . "IP       : " . $request->ip(),
                ]
            );

            return redirect()->intended('/dashboard');
        }

        return back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        AccessLog::create([
            'user_id' => Auth::id(),
            'action' => 'logout',
            'description' => 'User berhasil logout',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $user = Auth::user();

        Http::post(
            'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage',
            [
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => "🔐 LOGOUT\n\n"
                            . "User     : {$user->name}\n"
                            . "Username : {$user->username}\n"
                            . "Waktu    : " . now()->format('d F Y H:i') . "\n"
                            . "IP       : " . $request->ip(),
            ]
        );

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}