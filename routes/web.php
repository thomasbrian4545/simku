<?php

use App\Livewire\Dosens;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Dashboard;

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('mahasiswas', MahasiswaController::class);
    Route::get('dosens', Dosens::class)->name('dosens');
});

Route::get('/test-faker', function () {
    $jenis_kelamin = ["L", "P"];
    $daftar_jurusan = ["Teknik Informatika", "Sistem Informasi", "Ilmu Komputer", "Teknik Komputer", "Teknik Telekomunikasi"];
    $faker = \Faker\Factory::create('id_ID');
    echo $faker->randomNumber(8) . "<br>";
    echo $faker->firstName() . " " . $faker->lastName() . "<br>";
    echo $faker->randomElement($jenis_kelamin) . "<br>";
    echo $faker->randomElement($daftar_jurusan) . "<br>";
    echo $faker->address();
});
