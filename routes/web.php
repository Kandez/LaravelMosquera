<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/public', function () {
    return view('welcome');
})->name('home');

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