<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mylaravel/{nama?}',function($nama='Guest'){
    return view('mylaravel', compact('nama'));
});

Route::get('/aboutus/{namakementerian}', function($namakementerian){
    return view('aboutus', compact('namakementerian'));
});

// Route::get('/aboutus/{namakementerian}', [MyFirstController::class, 'aboutus']);

Route::get('/users', [UserController::class, 'index']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
