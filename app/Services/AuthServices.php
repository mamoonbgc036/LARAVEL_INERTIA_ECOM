<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthServices{
    public function login($attributes, $request)
    {
        if(Auth::attempt($attributes))
        {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors('Provided credentials does not matched');
    }
}