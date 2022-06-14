<?php

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\MahasiswaLumen;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [MahasiswaController::class, 'index']);
// Route::get('/', function () {
//     $dataMahasiswa = Mahasiswa::all();
//     return view('dashboard.index', [
//         'dataMahasiswa' => $dataMahasiswa
//     ]);
// })->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard-data/mahasiswa', DashboardController::class)->middleware('auth');
Route::resource('/dashboard/mahasiswa', DashboardMahasiswaController::class)->middleware('auth');

Route::get('/dashboard-lumen/mahasiswa', [MahasiswaLumen::class, 'index'])->middleware('auth');

Route::get('/fetchdatamahasiswa', [DashboardMahasiswaController::class, 'fetchdatamahasiswa'])->middleware('auth');
// Route::get('/editdatamahasiswa/{id}', [DashboardMahasiswaController::class, 'editdatamahasiswa'])->middleware('auth');
// Route::put('/updatedatamahasiswa/{id}', [DashboardMahasiswaController::class, 'updatedatamahasiswa'])->middleware('auth');
// Route::delete('/deletedatamahasiswa/{id}', [DashboardMahasiswaController::class, 'deletedatamahasiswa'])->middleware('auth');
