<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;



Route::get('/', function () {
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/dashboard/jurusan',[JurusanController::class,'index'])->middleware('auth');
Route::get('/dashboard/jurusan/{jurusan:slug}',[JurusanController::class,'kelas'])->middleware('auth');
Route::get('/dashboard/jurusan/{jurusan:slug}/kelas/{kelas:kelas}/siswa',[JurusanController::class,'siswa'])->middleware('auth');
Route::resource('/dashboard/siswa',SiswaController::class)->middleware('auth');




