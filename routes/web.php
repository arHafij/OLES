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
Route::get('/lessons', 'LessonController@index')->name('lessons');
Route::get('/lessons/create', 'LessonController@create')->name('lessons.create');
Route::post('/lessons', 'LessonController@store')->name('lessons.store');
Route::put('/lessons/{id}', 'LessonController@update')->name('lessons.update');
Route::delete('/lessons/{id}', 'LessonController@destroy')->name('lessons.destroy');
Route::get('/lessons/{id}', 'LessonController@show')->name('lessons.show');
Route::get('/lessons/{id}/edit', 'LessonController@edit')->name('lessons.edit');

//Exam
Route::resource('/exam', 'ExamController');
Route::get('/lessons/{id}/exams','ExamController@index')->name('exams');
Route::post('/lessons/{id}/exams','ExamController@store')->name('exams.store');
Route::get('/lessons/{id}/exams/create','ExamController@create')->name('exams.create');

//Question
Route::resource('/question', 'QuestionController');
Route::get('/lessons/{lesson}/exams/{exam}/questions', 'QuestionController@index')->name('questions');
Route::get('/exams/{exam}/questions/create', 'QuestionController@create')->name('questions.create');
Route::post('/exams/{exam}/questions', 'QuestionController@store')->name('questions.store');



//Result
Route::post('/result','ResultController@store')->name('result.store');
