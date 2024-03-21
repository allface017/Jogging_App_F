<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoggingController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ジョギング
Route::controller(JoggingController::class)->group(function(){
    Route::get('jogging','index');
    Route::get('jogging/add','jogging_add');
});