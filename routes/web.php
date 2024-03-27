<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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
Route::get('logout', [LoginController::class,'logout'])->name('logout');

// ジョギング
Route::controller(JoggingController::class)->group(function(){
    Route::get('home','index');
    Route::get('jogging/add','jogging_add');
    Route::post('jogging/add','jogging_create');
    Route::get('jogging/target','target_index');
    Route::post('jogging/target','target_add')->name('jogging.target_add');
    Route::get('jogging/spot','spot_add');
    Route::post('jogging/spot','spot_create')->name('jogging.spot_create');
    Route::post('jogging/spot/serach', 'spot_serach')->name('jogging.spot_serach');
    Route::post('jogging/spot/edit','spot_edit')->name('jogging.spot_edit');
    Route::get('jogging/Course_Select','course_select');
    Route::post('jogging/course_serach','course_serach')->name('jogging.course_serach');
    
});