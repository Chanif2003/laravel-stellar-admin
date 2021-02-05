<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email','password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        }else{
            return redirect()->intended('/login');
        }
    }
}
