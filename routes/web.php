<?php

use App\Http\Controllers\StatusesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineContorller;
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


Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard','dashboard')->middleware(['auth'])->name('dashboard');
    Route::get( 'timeline', TimelineContorller::class)->name('timeline');
    Route::post('status',[StatusesController::class,'store'])->name('status.store');
});
require __DIR__.'/auth.php';
