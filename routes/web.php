<?php

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD

=======
>>>>>>> 4c610c932ed53f96703e042e83b5ce142e7b306b
Route::get('/public', function () {
    return view('welcome');
})->name('home');

<<<<<<< HEAD
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
=======
//students
Route::get('students', 'StudentController@index')->name('students');
Route::get('student/create', 'StudentController@create')->name('createstudent');
Route::post('addstudent', 'StudentController@store')->name('addstudent');
Route::get('student/edit/{id}', 'StudentController@edit')->name('editstudent');
Route::post('updatestudent/{id}', 'StudentController@update')->name('updatestudent');
Route::post('deletestudent/{id}', 'StudentController@destroy')->name('deletestudent');

//grades
Route::get('grades', 'GradeController@index')->name('grades');
Route::get('grade/create', 'GradeController@create')->name('creategrade');
Route::post('addgrade', 'GradeController@store')->name('addgrade');
Route::get('grade/edit/{id}', 'GradeController@edit')->name('editgrade');
Route::post('updategrade/{id}', 'GradeController@update')->name('updategrade');
Route::post('deletegrade/{id}', 'GradeController@destroy')->name('deletegrade');
>>>>>>> 4c610c932ed53f96703e042e83b5ce142e7b306b
