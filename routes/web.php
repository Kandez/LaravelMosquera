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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/public', function () {
    return view('welcome');
})->name('home');

//Petitions
Route::get('petitions', 'PetitionController@index')->name('petitions');
Route::get('petition/create', 'PetitionController@create')->name('createpetition');
Route::post('addpetition', 'PetitionController@store')->name('addpetition');
Route::get('petition/edit/{id}', 'PetitionController@edit')->name('editpetition');
Route::post('updatepetition/{id}', 'PetitionController@update')->name('updatepetition');
Route::post('deletepetition/{id}', 'PetitionController@destroy')->name('deletepetition');
//Companies
Route::get('companies', 'CompanyController@index')->name('companies');
Route::get('company/create', 'CompanyController@create')->name('createcompany');
Route::post('addcompany', 'CompanyController@store')->name('addcompany');
Route::get('company/edit/{id}', 'CompanyController@edit')->name('editcompany');
Route::post('updatecompany/{id}', 'CompanyController@update')->name('updatecompany');
Route::post('deletecompany/{id}', 'CompanyController@destroy')->name('deletecompany');
