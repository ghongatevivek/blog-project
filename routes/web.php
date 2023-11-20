<?php

use App\Http\Controllers\Admin\{ManageReminderTypeController,ManageUserController};
use App\Http\Controllers\Client\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix'=>'admin','middleware'=>['auth','is_admin']],function(){
    Route::resource('remindertype',ManageReminderTypeController::class);
    Route::resource('user',ManageUserController::class);
    Route::post('remindertype/updateStatus',[ManageReminderTypeController::class,'updateStatus'])->name('remindertype.status');
    Route::post('user/updateStatus',[ManageUserController::class,'updateStatus'])->name('user.status');
    Route::get('profile',[ManageUserController::class,'getProfile'])->name('update.profile');
});

Route::get('/home',[HomeController::class,'index'])->name('client.home');
Route::group(['prefix'=>'client'],function(){
});