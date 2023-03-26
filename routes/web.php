<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
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

Route::prefix('cms/admin/')->group(function(){
    Route::view('parent','cms.parent');
    Route::view('temp','cms.temp');
    Route::resource('countries',CountryController::class);
    Route::resource('cities',CityController::class);
    Route::resource('admins',AdminController::class);
    Route::resource('authors',AuthorController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('articles',ArticleController::class);

    Route::get('/create/articles/{id}',[ArticleController::class,'createArticle'])->name('createArticle');
    Route::get('/index/articles/{id}',[ArticleController::class,'indexArticle'])->name('indexArticle');



});
