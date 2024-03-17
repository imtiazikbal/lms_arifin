<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
});

Route::get('/',[FontendController::class,'index']);

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Category Route
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::get('/admin/create/category', [CategoryController::class, 'create']);
Route::post('/admin/store/category', [CategoryController::class, 'store']);
Route::get('/admin/edit/{category}', [CategoryController::class, 'edit']);
Route::post('/admin/update/category/{category}', [CategoryController::class, 'update']);
Route::post('/admin/destroy/category/{category}', [CategoryController::class, 'destroy']);


require __DIR__.'/auth.php';
