<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($attributes)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors('Provided credentials does not matched');
    }
}
