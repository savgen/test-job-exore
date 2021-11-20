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

Route::get('/', 'BaseController@index')->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/employees/create', 'Employees\CreateController@index')->middleware(['permission:create employee'])->name('create-employee');
    Route::post('/employees/create', 'Employees\CreateController@index')->middleware(['permission:create employee'])->name('create-employee');

    Route::get('/employees', 'Employees\EmployeesController@index')->middleware(['permission:all employees'])->name('all-employees');

    Route::get('/', 'Article\ArticleController@index')->middleware(['permission:all articles'])->name('articles');
    Route::get('/articles/{id}', 'Article\ArticleController@article')->middleware(['permission:all articles'])->name('article');
    Route::get('/articles/create', 'Article\CreateController@index')->middleware(['permission:create article'])->name('create-article');
    Route::post('/articles/create', 'Article\CreateController@index')->middleware(['permission:create article'])->name('create-article');
    Route::get('/articles/edit/{id}', 'Article\EditController@index')->middleware(['permission:edit article'])->name('edit-article');
    Route::post('/articles/edit/{id}', 'Article\EditController@index')->middleware(['permission:edit article'])->name('edit-article');
    Route::post('/articles/delete/{id}', 'Article\DeleteController@index')->middleware(['permission:delete article'])->name('delete-article');

    Route::get('/articles/category/{id}', 'Article\ArticleController@category')->middleware(['permission:all articles'])->name('edit-article');
    Route::get('/articles/employee/{id}', 'Article\ArticleController@employee')->middleware(['permission:all articles'])->name('edit-article');

    Route::get('/home', 'HomeController@index')->name('home');
});


