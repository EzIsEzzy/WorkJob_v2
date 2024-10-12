<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile',[UserController::class, 'index']);

//home page
Route::get('/home', [UserController::class, 'home']);
//all job page, create job page, show a specific job to apply
Route::get('job/index',[JobController::class,'index']);
Route::get('job/create',[JobController::class, 'create']);
Route::get('job/show',[JobController::class, 'show']);
//all post page, create post page
Route::get('post/index',[PostController::class, 'index']);
Route::get('post/create',[PostController::class, 'create']);
Route::get('post/show',[PostController::class, 'show']);
Route::post('post/store',[PostController::class, 'store']);
//for simplicity
Route::post('comment/store/post_id={post_id}',[CommentController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
