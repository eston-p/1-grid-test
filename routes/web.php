<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RatingController;
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

Route::get('/', [PostsController::class, 'get'])->name('show');

Route::get('/create', [PostsController::class, 'create'])->name('create');
Route::post('/create/post', [PostsController::class, 'store'])->name('post.store');
Route::get('/update/post/{id}', [PostsController::class, 'updatePostView'])->name('update.post.view');
Route::put('/update/post/{id}', [PostsController::class, 'update'])->name('update.post');

Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');

Route::get('delete/post/{id}', [PostsController::class, 'delete'])->name('delete.post');

Route::get('/rating/post/{id}/score/{value}', [RatingController::class, 'store'])->name('rating.store');

require __DIR__.'/auth.php';
