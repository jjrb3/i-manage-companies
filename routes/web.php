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
    Route::get('/show', 'CompanyController@index')->name('companies.list');
    Route::get('/add', 'CompanyController@addIndex')->name('companies.add');
    Route::get('/{id}/edit', 'CompanyController@editIndex')->name('companies.edit');

    Route::post('/create', 'CompanyController@create')->name('companies.create');
    Route::post('/{id}/destroy', 'CompanyController@destroy')->name('companies.destroy');
});

// Employees
Route::prefix('employees')->group(function () {
    Route::get('/show', 'EmployeeController@index')->name('employees.list');
});
