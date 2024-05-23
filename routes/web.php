<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PostController;
use App\Models\Detail;

Route::get('/login', [UserController::class,'index']);
Route::post('/login',[UserController::class,'store']);


Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', [UploadController::class, 'store'])->name('upload');

Route::get('/posts', [UploadController::class, 'landing'])->name('uploads.view');
Route::get('/posts/edit/{id}', [UploadController::class, 'edit'])->name('uploads.edit');
Route::post('/posts/update/{id}', [UploadController::class, 'edit'])->name('uploads.update');
Route::delete('/posts', [UploadController::class, 'forceDelete'])->name('uploads.force-delete');
Route::post('/posts/comments', [UploadController::class, 'addComment'])->name('uploads.addComment');