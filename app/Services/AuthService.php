<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public function register($data)
    {
        $user = User::create([
    'name'      => $data['name'],
    'email'     => $data['email'],
    'password'  => Hash::make($data['password']),
    'role'      => 'user'
        ]);

        if ($user) {
            return true;
        }

        return false;
    }

    public function login($data)
    {
        try {
            if (Auth::attempt([
                'email' => $data['email'],
                'password' => $data['password']
            ])) {

    $user = Auth::user();

    Session::put('logged_in', true);
    Session::put('user_id', $user->id);
    Session::put('user_name', $user->name);
    Session::put('user_email', $user->email);
    Session::put('role', $user->role);

    return true;
}
            return false;
        } catch (\Exception $th) {
            Log::error('Auth service login failed', [
                'message'   => $th->getMessage(),
            ]);
            return false;
        }
    }
}

?>
