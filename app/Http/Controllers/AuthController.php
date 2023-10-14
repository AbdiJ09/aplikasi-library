<?php

namespace App\Http\Controllers;

use App\Enums\StatusUser;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $level = $request->input('level');

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {

            if(Auth::user()->level == StatusUser::Admin)
            {
                $request->session()->regenerate();

                dd("berhasil login sebgai admin", $level);
            } else {
                dd('kotil', $level);
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
