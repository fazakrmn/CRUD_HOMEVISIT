<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function login()
    {
        return view('sign.login');
    }

    /**
     * Menampilkan halaman sign up
     */
    public function signin()
    {
        return view('sign.signin');
    }

    /**
     * Proses login
     */
    public function logingin(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil kredensial
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Coba login
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')
                ->with('success', 'Login berhasil! Selamat datang ' . Auth::user()->name);
        }

        // Jika login gagal
        return redirect()->back()
            ->withErrors(['email' => 'Email atau password salah'])
            ->withInput($request->only('email'));
    }

    /**
     * Proses sign up / register
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto login setelah register
        Auth::login($user);

        return redirect('dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang ' . $user->name);
    }

    /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Logout berhasil');
    }

    /**
     * Login dengan Google (perlu setup Google OAuth)
     */
    public function redirectToGoogle()
    {
        return redirect()->away('https://accounts.google.com/o/oauth2/auth');
        // Atau gunakan Laravel Socialite:
        // return Socialite::driver('google')->redirect();
    }

    /**
     * Callback dari Google
     */
    public function handleGoogleCallback()
    {
        // Implementasi callback dari Google OAuth
        // Menggunakan Laravel Socialite
        
        /*
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::updateOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                ]
            );

            Auth::login($user);

            return redirect()->intended('dashboard');
            
        } catch (\Exception $e) {
            return redirect('login')
                ->with('error', 'Gagal login dengan Google');
        }
        */
    }
}