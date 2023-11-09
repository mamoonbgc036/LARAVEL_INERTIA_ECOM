<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


// Authantication

Route::get('/user/login', [LoginController::class, 'index'])->name('user.login');
Route::post('/user/login', [LoginController::class, 'store']);

Route::get('/user/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/user/register', [RegisterController::class, 'store']);


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

// Route::get('/', function(){
//     $time = now()->toTimeString();
//     return Inertia::render('Inertia/Home',[
//         'time' => $time
//     ]);
// });

// Route::get('/setting', function(){
//     return Inertia::render('Inertia/Setting');
// });

// Route::get('/user', function(){
//     $users = User::query()
//         ->when(Request::input('search'), function($query, $value){
//             $query->where('name', 'like', "%{$value}%");
//         })
//         ->paginate(10)
//         ->withQueryString()
//         ->through(fn($user)=>[
//         'name' => $user->name,
//         'id' => $user->id
//     ]);
//     return Inertia::render('Inertia/User',[
//         'users'=>$users,
//         'filter'=>Request::only(['search'])
//     ]);
// });

// Route::get('/user/{search}', function($search){
//     dd($search);
// });

// Route::post('/logout', function(){
//     dd('User is logout');
// });

// Route::get('/user/create', function(){
//     return Inertia::render('Inertia/UserCreate');
// });

// Route::post('/usermake', function(){

//    $attributes = Request::validate([
//     'name'=>'required',
//     'email'=>'required|email',
//     'password'=>'required'
//    ]);

//    User::create($attributes);
//    return redirect('/user');
// });