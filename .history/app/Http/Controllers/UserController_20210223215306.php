<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->route('home')->with('success', 'Login Success');
        } else {
            return redirect()->back()->with('error', 'Invalid Email Password');
        }
    }

    public function registerGet()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('loginView')->with('Register Success');
    }
}
