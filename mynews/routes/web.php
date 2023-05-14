<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SelfProfileController;
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

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(NewsController::class)->prefix('admin')->middleware('auth')->name('news.')->group(function(){
  Route::get('news/create', 'add')->name('add');
});

Route::controller(SelfProfileController::class)->prefix('admin')->middleware('auth')->name('news.')->group(function(){
  Route::get('profile/create', 'add')->name('add_create');
  Route::get('profile/edit', 'add')->name('add_edit');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
