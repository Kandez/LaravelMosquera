<?php

Route::get('/', function () {
    return view('welcome');
});

//students
Route::get('students', 'StudentController@index')->name('students');
Route::get('student/create', 'StudentController@create')->name('createstudent');
Route::post('addstudent', 'StudentController@store')->name('addstudent');
Route::get('student/edit/{id}', 'StudentController@edit')->name('editstudent');
Route::post('updatestudent/{id}', 'StudentController@update')->name('updatestudent');
Route::post('deletestudent/{id}', 'StudentController@destroy')->name('deletestudent');