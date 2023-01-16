<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/changepass', [App\Http\Controllers\HomeController::class, 'changepass'])->name('changepass');
Route::post('/changepassword',[App\Http\Controllers\HomeController::class, 'changepassword'])->name('changepassword');


Route::resources([
    'user'=>'App\Http\Controllers\UserController',
    'level'=>'App\Http\Controllers\LevelController',
    'job'=>'App\Http\Controllers\JobController',
    'candidate'=>'App\Http\Controllers\CandidateController',
    'calendar'=>'App\Http\Controllers\CalendarController',

]);
Route::get('/detailcalendar', [App\Http\Controllers\CalendarController::class, 'detailCalendar'])->name('calendar.detailcalendar');
// Route::get('/detailcalendar/{id}', [App\Http\Controllers\CalendarController::class, 'detailCalendar'])->name('calendar.detailcalendar');
Route::get('/detailjob/{id}', [App\Http\Controllers\JobController::class, 'detailJob'])->name('job.detailjob');
Route::get('/detailcandidate/{id}', [App\Http\Controllers\CandidateController::class, 'detailCandidate'])->name('candidate.detailcandidate');
Route::put('/updatestatus/{id}', [App\Http\Controllers\CandidateController::class, 'updateStatus'])->name('candidate.updatestatus');

Route::post('/add-calendar/{id}', [App\Http\Controllers\SendMailController::class, 'addCalendar'])->name('addCalendar');
Route::post('/offering/{id}', [App\Http\Controllers\SendMailController::class, 'offerCandidate'])->name('offerCandidate');

