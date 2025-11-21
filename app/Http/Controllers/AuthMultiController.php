<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMultiController extends Controller
{
    public function loginAdmin(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect('/admin/dashboard');
        }
        return back()->withErrors(['email' => 'Login gagal']);
    }

    public function loginSeller(Request $request)
    {
        if (Auth::guard('seller')->attempt($request->only('email', 'password'))) {
            return redirect('/seller/dashboard');
        }
        return back()->withErrors(['email' => 'Login gagal']);
    }

    public function loginBuyer(Request $request)
    {
        if (Auth::guard('buyer')->attempt($request->only('email', 'password'))) {
            return redirect('/buyer/dashboard');
        }
        return back()->withErrors(['email' => 'Login gagal']);
    }
}
