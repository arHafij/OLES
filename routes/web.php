<?php


Route::get('/', function () {
    return view('welcome');
});

// Authentication
Auth::routes();

// Student
Route::get('/student', 'StudentController@index');

// Teacher
Route::get('/teacher', 'TeacherController@index');

//Lesson
Route::resource('/lesson', 'LessonController');

//Exam
Route::resource('/exam', 'ExamController');

//Question
Route::resource('/question', 'QuestionController');

//Result
Route::post('/result','ResultController@store')->name('result.store');
