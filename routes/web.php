<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'login_store'])->name('login.store');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_store'])->name('register.store');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/mahasiswas', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
    Route::get('/mahasiswas/create', [MahasiswaController::class, 'create'])->name('mahasiswas.create');
    Route::post('/mahasiswas', [MahasiswaController::class, 'store'])->name('mahasiswas.store');
    Route::get('/mahasiswas/{mahasiswa}', [MahasiswaController::class,'show'])->name('mahasiswas.show');
});
