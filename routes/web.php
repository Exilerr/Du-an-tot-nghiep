<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::POST('/comment/store',  [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [\App\Http\Controllers\CommentController::class,'replyStore'])->name('reply.add');
Route::get('/search', [\App\Http\Controllers\PagesController::class,'search'])->name('PostSearch');