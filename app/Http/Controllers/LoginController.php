<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($login)) {
            return redirect('/index-mhs');
        } else {
            return redirect('/');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
