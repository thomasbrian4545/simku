<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('auth.login');
})->name('/');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/users/create', [RegisterController::class,'create'])->name('users.create');
Route::post('/users', [RegisterController::class,'store'])->name('users.store');
