<?php

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

Route::view('/dashboard','dashboard')->middleware(['auth'])->name('dashboard');
Route::get( 'timeline', TimelineContorller::class)->middleware(['auth'])->name('timeline');
require __DIR__.'/auth.php';