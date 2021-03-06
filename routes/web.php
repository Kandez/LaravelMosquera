<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => 'auth'], function(){
    
    //Petitions
    Route::get('petitions', 'PetitionController@index')->name('petitions');
    Route::get('petition/create', 'PetitionController@create')->name('createpetition');
    Route::post('addpetition', 'PetitionController@store')->name('addpetition');
    Route::get('petition/edit/{id}', 'PetitionController@edit')->name('editpetition');
    Route::post('updatepetition/{id}', 'PetitionController@update')->name('updatepetition');
    Route::post('deletepetition/{id}', 'PetitionController@destroy')->name('deletepetition');
    Route::post('petition/listone', 'PetitionController@listone')->name('listone');
    Route::post('petition/listtwo', 'PetitionController@listtwo')->name('listtwo');
    Route::post('petition/listthree', 'PetitionController@listthree')->name('listthree');
    Route::post('pdfPetition','PetitionController@generatePDF')->name('pdf');
   
    //Companies
    Route::get('companies', 'CompanyController@index')->name('companies');
    Route::get('company/create', 'CompanyController@create')->name('createcompany');
    Route::post('addcompany', 'CompanyController@store')->name('addcompany');
    Route::get('company/edit/{id}', 'CompanyController@edit')->name('editcompany');
    Route::post('updatecompany/{id}', 'CompanyController@update')->name('updatecompany');
    Route::post('deletecompany/{id}', 'CompanyController@destroy')->name('deletecompany');
   
    //students
    Route::get('students', 'StudentController@index')->name('students');
    Route::get('studies/{id}', 'StudentController@indexStudies')->name('studies');
    Route::get('student/create', 'StudentController@create')->name('createstudent');
    Route::post('addstudent', 'StudentController@store')->name('addstudent');
    Route::get('student/edit/{id}', 'StudentController@edit')->name('editstudent');
    Route::post('updatestudent/{id}', 'StudentController@update')->name('updatestudent');
    Route::post('deletestudent/{id}', 'StudentController@destroy')->name('deletestudent');
    Route::post('deletestudies/{id}', 'StudentController@destroyStudie')->name('deletestudie');
   
    //grades
    Route::get('grades', 'GradeController@index')->name('grades');
    Route::get('grade/create', 'GradeController@create')->name('creategrade');
    Route::post('addgrade', 'GradeController@store')->name('addgrade');
    Route::get('grade/edit/{id}', 'GradeController@edit')->name('editgrade');
    Route::post('updategrade/{id}', 'GradeController@update')->name('updategrade');
    Route::post('deletegrade/{id}', 'GradeController@destroy')->name('deletegrade');
 
    //Route::get('/home', 'HomeController@index')->name('home');
 
});
 
 
Auth::routes();