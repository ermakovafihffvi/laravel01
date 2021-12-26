<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [IndexController::class, 'index'])->name('root');

Route::view('/about', 'about')->name('about');


Route::name('news.')->prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news_list');
    Route::get('/detail/{id}', [NewsController::class, 'show_detail'])->name('detail');
    Route::name('category.')
    ->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('index');
        Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show');
    });
});

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/users', [UserController::class, 'index'])->name('updateUsers');
        Route::get('/users/toggleAdmin/{user}', [UserController::class, 'toggleAdmin'])->name('toggleAdmin');

        Route::name('news.')->prefix('news')->group(function(){
            Route::get('/create', [AdminNewsController::class, 'create'])->name('create');
            Route::get('/{news}/edit', [AdminNewsController::class, 'edit'])->name('edit');
            Route::post('/store', [AdminNewsController::class, 'store'])->name('store');
            Route::put('/{news}', [AdminNewsController::class, 'update'])->name('update');
            Route::delete('/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');
            Route::get('/show', [AdminNewsController::class, 'index'])->name('show');
        });
        Route::name('categories.')->prefix('categories')->group(function(){
            Route::get('/create', [AdminCategoriesController::class, 'create'])->name('create');
            /*Route::get('/{news}/edit', [AdminCategoriesController::class, 'edit'])->name('edit');*/
            Route::post('/store', [AdminCategoriesController::class, 'store'])->name('store');
            Route::put('/{news}', [AdminCategoriesController::class, 'update'])->name('update');
            Route::delete('/{news}', [AdminCategoriesController::class, 'destroy'])->name('destroy');
            Route::get('/show', [AdminCategoriesController::class, 'index'])->name('show');
        });

        Route::get('/parser', [ParserController::class, 'parser'])->name('parser');
        Route::get('/parser/index', [ParserController::class, 'index'])->name('parserIndex');
        Route::delete('/parser/{url}', [ParserController::class, 'destroy'])->name('parserDestroy');
        Route::get('/parser/create', [ParserController::class, 'create'])->name('parserCreate');
        Route::post('/parser/store', [ParserController::class, 'store'])->name('parserStore');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout', [LoginController::class, 'logout']);
Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile');
Route::get('/registration', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/registration', [RegisterController::class, 'register']);

Route::get('/auth/github', [LoginController::class, 'loginGH'])->name('GHLogin');
Route::get('/auth/github/response', [LoginController::class, 'responseGH'])->name('GHResponse');
