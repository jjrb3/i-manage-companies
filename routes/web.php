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
    Route::post('/{id}/update', 'CompanyController@update')->name('companies.update');
    Route::post('/{id}/destroy', 'CompanyController@destroy')->name('companies.destroy');
});

// Employees
Route::prefix('employees')->group(function () {
    Route::get('/show', 'EmployeeController@index')->name('employees.list');
    Route::get('/add', 'EmployeeController@addIndex')->name('employees.add');
    Route::get('/{id}/edit', 'EmployeeController@editIndex')->name('employees.edit');

    Route::post('/create', 'EmployeeController@create')->name('employees.create');
    Route::post('/{id}/update', 'EmployeeController@update')->name('employees.update');
    Route::post('/{id}/destroy', 'EmployeeController@destroy')->name('employees.destroy');
});
