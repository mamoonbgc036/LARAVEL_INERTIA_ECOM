<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Product\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [HomeController::class, 'index'])->name('home');


// Authantication

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/store', [UserController::class, 'store'])->name('user.store');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::resource('product', ProductController::class);
});

// Route::get('/', function(){
//     return Inertia::render('Laracast/Home',
//         ['username' => 'Jhon deo']  
// );
// });

// Route::get('/setting', function(){
//     return Inertia::render('Laracast/Setting');
// });

// Route::get('/user', function(){
//     return Inertia::render('Laracast/User');
// });

// Route::post('logout', function(){
//     dd('User is logout');
// });

Route::get('/', function(){
    $time = now()->toTimeString();
    return Inertia::render('Inertia/Home',[
        'time' => $time
    ]);
});

Route::get('/setting', function(){
    return Inertia::render('Inertia/Setting');
});

Route::get('/user', function(){
    $users = User::where(function ($query) {
        $query->where('address->city', 'Kobymouth');
    })->get();
    dd($users[0]->address);
    return Inertia::render('Inertia/User',[
        'users'=>$users
    ]);
});

Route::post('/logout', function(){
    dd('User is logout');
});