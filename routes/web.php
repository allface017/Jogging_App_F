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
    return view('auth.login');
});

Auth::routes();

// ジョギング
Route::controller(JoggingController::class)->group(function(){
    Route::get('home','index');
    Route::get('jogging/add','jogging_add');
    Route::post('jogging/add','jogging_create');
    Route::get('jogging/target','target_index');
    Route::post('jogging/target','target_add')->name('jogging.target_add');; 
    Route::get('jogging/edit','jogging_edit');
    Route::post('jogging/edit','jogging_update');
});