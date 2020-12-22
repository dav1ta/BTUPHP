<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TagController;
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


Route::get('/posts',[PostController::class,'index'])    ->name('index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create') ->middleware('auth');;
Route::get('/posts/{post}',[PostController::class,'show']) ->middleware('auth') ->middleware('auth');;;
Route::post('/posts/save',[PostController::class,'save'])->name('posts.save') ->middleware('auth');;
Route::delete('/posts/{post}/delete',[PostController::class,'delete'])->name('posts.delete') ->middleware('auth');;
Route::put('/posts/{post}/update',[PostController::class,'update'])->name('posts.update') ->middleware('auth');;
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit') ->middleware('auth');;
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/auth',[LoginController::class,'postLogin'])->name('auth');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/adduser',[LoginController::class,'postRegister'])->name('adduser');
Route::get('/my_posts', [PostController::class, 'my_posts'])->name('my_posts')
    ->middleware('auth');
Route::get('/tags', [TagController::class, 'index'])->name('tags.all');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create')->middleware('auth');
Route::post('/tags/save', [TagController::class, 'save'])->name('tags.save')->middleware('auth');
Route::delete('/tags/{tag}/delete', [TagController::class, 'delete'])->name('tags.delete')->middleware('auth');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit')->middleware('auth');
Route::put('/tags/{tag}/update', [TagController::class, 'update'])->name('tags.update')->middleware('auth');
Route::put('/posts/{post}/approve', [PostController::class, 'approve'])->name('approve');
Route::put('/posts/{post}/is_liked', [PostController::class, 'is_liked'])->name('is_liked');
Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');

