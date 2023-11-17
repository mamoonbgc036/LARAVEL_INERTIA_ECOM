<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index(){
        return Inertia::render('Auth/Registration');
    }

    public function store(Request $request){
        $attribute = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user  = User::create($attribute);
        
        event(new Registered($user));

        Auth::login($user);
        return to_route('dashboard');
    }
}
