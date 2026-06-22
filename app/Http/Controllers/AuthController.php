<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        
    
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
            ]
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        try {
            $response = $this->authService->register($validated);

            if (!$response) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Registrasi gagal');
            }

            return redirect()->route('login')
                ->with('success', 'Registrasi berhasil');

        } catch (\Throwable $th) {
            Log::error('Error during registration', [
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'message' => $th->getMessage()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan');
        }
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password wajib diisi'
        ]);

        try {
            $response = $this->authService->login($validated);

            if (!$response) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Email atau password salah');
            }

            $user = Auth::user();

            if ($user && $user->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Login admin berhasil');
            }

            return redirect()->route('user.dashboard')
                ->with('success', 'Login user berhasil');

        } catch (\Throwable $th) {
            Log::error('Error during login', [
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'message' => $th->getMessage(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->with('success', 'Logout berhasil');

        } catch (\Throwable $th) {
            Log::error('Error during logout', [
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'message' => $th->getMessage(),
            ]);

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan');
        }
    }
}
