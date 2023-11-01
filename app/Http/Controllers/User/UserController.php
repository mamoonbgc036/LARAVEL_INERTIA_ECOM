<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        User::create($attributes);
        return to_route('home');
    }
}
