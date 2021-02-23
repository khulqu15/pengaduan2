<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check()) {

        } else {
            return redirect()->route('loginView')->with('error', 'Login dulu');
        }
    }
}
