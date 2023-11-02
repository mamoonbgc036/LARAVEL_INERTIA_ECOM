<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return Inertia::render('Auth/Login');
    }

    public function register(){
        return Inertia::render('Auth/Registration');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'name'=>'required',
            'email' => 'required|email',
            'password'=>'required'
        ]);
        $user  = User::create($attributes);

         // event(new Registered($user));
        //without this it back to login page as dashboard routed is protected by auth middleware
        Auth::login($user);
        //External redirect. it take route beside get('/')
        // return Inertia::location('/');
        //vue redirect based on name
        return to_route('dashboard');
    }
}
