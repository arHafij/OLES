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
Route::resource('lesson', 'LessonController');
//Exam
Route::resource('exam', 'LessonController');
//Question
Route::resource('question', 'LessonController');