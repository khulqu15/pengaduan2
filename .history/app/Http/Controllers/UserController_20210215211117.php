<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function loginGet()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        if(Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
        }
        return view('dashboard.index');
    }

    public function registerGet()
    {
        return view('auth.register');
    }
}
