<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
Route::post('post',[\App\Http\Controllers\PostController::class,'post'])->name('post');
Route::get('/home/posts',[\App\Http\Controllers\HomeController::class,'posts'])->name('posts');
Route::get('/home/my-posts',[\App\Http\Controllers\HomeController::class,'myPosts'])->name('my-posts');
Route::get('delete/{id}',[\App\Http\Controllers\PostController::class,'delete'])->name('delete');
Route::get('edit/{id}',[\App\Http\Controllers\HomeController::class,'edit'])->name('edit');
Route::post('editpost', [\App\Http\Controllers\PostController::class,'edit'])->name('edit-post');
Route::post('add-comment',[\App\Http\Controllers\CommentsController::class,'add'])->name('addComment');
Route::post('add-reply',[\App\Http\Controllers\CommentsController::class,'addReply'])->name('addReply');
