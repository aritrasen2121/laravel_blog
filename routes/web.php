<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard',[PostController::class, 'getAllPost'])->name('dashboard');
    Route::get('/post',[PostController::class, 'index'])->name('post.index');
    Route::get('/dashboard/mypost',[PostController::class, 'userPost'])->name('post.userPost');
    Route::post('/post',[PostController::class, 'create'])->name('post.create');
    Route::get('/post/{id}',[PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{id}',[PostController::class, 'update'])->name('post.update');
    Route::get('/post/delete/{id}',[PostController::class, 'destroy'])->name('post.destroy');
});


require __DIR__.'/auth.php';
