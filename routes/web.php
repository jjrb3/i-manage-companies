<?php

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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Companies
Route::prefix('companies')->group(function () {
    Route::get('/list', 'Company\ListController@index')->name('companies.list');
});

// Employees
Route::prefix('employees')->group(function () {
    Route::get('/list', 'Employee\ListController@index')->name('employees.list');
});
