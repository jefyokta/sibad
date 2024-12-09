<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    public function login(Request $request)
    {


        try {
            $credential =  $request->only("username", "password");
            if (Auth::attempt($credential)) redirect("/dashboard");
            return back()->with("error", 'Username/password salah!');

        } catch (\Throwable $th) {
            dd($th);
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
