<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SelfProfileController;

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

Route::controller(NewsController::class)->prefix('admin')->name('news.')->group(function(){
  Route::get('news/create', 'add')->name('add');
});

Route::controller(SelfProfileController::class)->prefix('admin')->name('profile.')->group(function(){
  Route::get('profile/create', 'add')->name('create');
  Route::get('profile/edit', 'edit')->name('edit');
});