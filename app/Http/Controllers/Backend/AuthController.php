<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->post()) {
            $request->validate([
                "email" => ['required', 'email'],
                "password" => ['required']
            ]);

            $email = $request->email;
            $password = $request->password;

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return to_route('admin.dashboard.dashboard');
            }

            return back()->withErrors(['email' => 'Provided Credentials Are Not Valid'])
                ->onlyInput('email');
        }

        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();

        return to_route('login');
    }
}
