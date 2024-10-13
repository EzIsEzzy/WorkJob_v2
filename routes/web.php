<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\JobApplicationController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [UserController::class, 'home']);
//all job page, create job page, show a specific job to apply
Route::get('job/index',[JobController::class,'index']);
Route::get('job/create',[JobController::class, 'create']);
Route::get('job/show/job_id={job_id}',[JobController::class, 'show']);
Route::post('job/store',[JobController::class, 'store']);
//job application functionality
Route::get('apply/job={job_id}',[JobApplicationController::class, 'create']);
Route::post('apply/confirm', [JobApplicationController::class, 'store']);

//all post page, create post page
Route::get('post/index',[PostController::class, 'index']);
Route::get('post/create',[PostController::class, 'create']);
Route::get('post/show/post_id={post_id}',[PostController::class, 'show']);
Route::post('post/store',[PostController::class, 'store']);
Route::put('user/update',[UserController::class, 'update']);
//for simplicity
Route::post('comment/store/post_id={post_id}',[CommentController::class, 'store']);
//should view the user's profile, with the name, and the posts he has done, updates them and deletes them/user/edit/id=2
Route::get('user/',[UserController::class, 'show']);
Route::get('user/edit',[UserController::class, 'edit']);
Route::put('user/update', [UserController::class, 'update']);
Route::get('user/post/edit/{id}',[PostController::class, 'edit']);
Route::put('post/update/{id}',[PostController::class, 'update']);
Route::get('user/post/delete/{id}',[PostController::class, 'delete']);
//the user's jobs that he posted, applicant's info
Route::get('user/job',[JobApplicationController::class, 'index']);
Route::get('applicant/info/applicant_id={id}',[JobApplicationController::class, 'show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
