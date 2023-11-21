<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   
    protected $authServices;
    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }
    public function index(){
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($attributes))
        {
            $request->session()->regenerate();
            if(Auth::user()->role==1){
                return Inertia::render('Admin/AdminDashboard');
            }
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors('Provided credentials does not matched');
    }
}
