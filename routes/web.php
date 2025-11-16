<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

// public routes
Route::get('/', [ClientController::class, 'index'])->name('client.home');
Route::get('/about', [ClientController::class, 'about'])->name('client.about');
Route::get('/about/bujuk-nur-kasian', [ClientController::class, 'aboutBujukNK'])->name('client.about.bujuk');
Route::get('/visi-misi', [ClientController::class, 'vision'])->name('client.vision');
Route::get('/news', [ClientController::class, 'news'])->name('client.news');
Route::get('/news/{id}/details', [ClientController::class, 'newsDetails'])->name('client.news.details');


// admin routes
Route::get('/admin/login-page', [AdminController::class, 'index'])->name('admin.login');
Route::post('/admin/login-process', [AdminController::class, 'processLogin'])->name('admin.login.process');
Route::get('/admin/logout-process', [AdminController::class, 'processLogout'])->name('admin.logout.process');


Route::group(['middleware' => 'userlogin'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/articles', [AdminController::class, 'articles'])->name('admin.articles');
    Route::post('/admin/add/articles', [AdminController::class, 'addArticles'])->name('admin.articles.add');
    Route::post('/admin/update/articles', [AdminController::class, 'updateArticles'])->name('admin.articles.update');
    Route::get('/admin/delete/{id}/articles', [AdminController::class, 'deleteArticles'])->name('admin.articles.delete');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/add/users', [AdminController::class, 'addUsers'])->name('admin.users.add');
    Route::post('/admin/update/users', [AdminController::class, 'updateUsers'])->name('admin.users.update');
    Route::get('/admin/delete/{id}/users', [AdminController::class, 'deleteUsers'])->name('admin.users.delete');

});