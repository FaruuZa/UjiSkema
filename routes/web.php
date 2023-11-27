<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index']);

// Route::get('/', function () {
// return view('tes3');
// });


// Hak Akses


// Bagi yang sudah login (User atau Pemilih)
Route::middleware('auth:web,pemilih')->group(function () {


    // Route::get('/home', function () {});
    Route::get('/logout', [AuthController::class, 'logout']);
});


// Bagi yang sudah login sebagai Pemilih/Siswa
Route::middleware('auth:pemilih')->group(function () {
    Route::get('/user', [MainController::class,'pemilih']);
    Route::get('/user/detail/{id}', [MainController::class, 'detail']);
    Route::post('/vote', [MainController::class, 'vote']);
});


// Bagi yang sudah login sebagai User/Admin
Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', [AdminController::class,'index']);
    Route::get('/dashboard/hasil-vote', [AdminController::class,'hasil']);

    // FUNCTION PEMILIH
    Route::get('/dashboard/data-pemilih', [AdminController::class,'dataPemilih']);
    Route::get('/dashboard/data-pemilih/add', [AdminController::class,'pemilihTambah']);
    Route::post('/dashboard/data-pemilih/add', [AdminController::class,'pemilihStore']);
    Route::get('/dashboard/data-pemilih/edit/{id}', [AdminController::class,'pemilihEdit']);
    Route::post('/dashboard/data-pemilih/edit/{id}', [AdminController::class,'pemilihUpdate']);
    Route::post('/dashboard/data-pemilih/delete', [AdminController::class,'pemilihDelete']);

    // FUNCTION ADMIN
    Route::get('/dashboard/data-admin', [AdminController::class,'dataAdmin']);
    Route::get('/dashboard/data-admin/add', [AdminController::class,'adminTambah']);
    Route::post('/dashboard/data-admin/add', [AdminController::class,'adminStore']);
    Route::get('/dashboard/data-admin/edit/{id}', [AdminController::class,'adminEdit']);
    Route::post('/dashboard/data-admin/edit/{id}', [AdminController::class,'adminUpdate']);
    Route::post('/dashboard/data-admin/delete', [AdminController::class,'adminDelete']);

    // FUNCTION KANDIDAT
    Route::get('/dashboard/data-kandidat', [AdminController::class,'dataKandidat']);
    Route::get('/dashboard/data-kandidat/add', [AdminController::class,'kandidatTambah']);
    Route::post('/dashboard/data-kandidat/add', [AdminController::class,'kandidatStore']);
    Route::get('/dashboard/data-kandidat/edit/{id}', [AdminController::class,'kandidatEdit']);
    Route::post('/dashboard/data-kandidat/edit/{id}', [AdminController::class,'kandidatUpdate']);
    Route::post('/dashboard/data-kandidat/delete', [AdminController::class,'kandidatDelete']);
    Route::get('/dashboard/data-kandidat/detail/{id}', [AdminController::class, 'kandidatDetail']);

});


// Bagi yang belum login
Route::middleware('guest:web,pemilih')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});