<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/changepass', [App\Http\Controllers\HomeController::class, 'changepass'])->name('changepass');
Route::post('/changepassword',[App\Http\Controllers\HomeController::class, 'changepassword'])->name('changepassword');

// Route::get('/user',[App\Http\Controllers\UserController::class,'index'])->name('index');
// Route::get('/user/{id}',[App\Http\Controllers\UserController::class,'show'])->name('show');
// Route::post('/user',[App\Http\Controllers\UserController::class,'store'])->name('store');
// Route::put('/user/{id}',[App\Http\Controllers\UserController::class,'update'])->name('update');
// Route::delete('/user/{id}',[App\Http\Controllers\UserController::class,'destroy'])->name('destroy');
Route::resources([
    'user'=>'App\Http\Controllers\UserController',
    'level'=>'App\Http\Controllers\LevelController',
]);