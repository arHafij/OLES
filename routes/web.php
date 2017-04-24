<?php


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication
Auth::routes();

// Student
Route::get('/student/home','StudentController@getHome')->name('student.home');
Route::get('/student/lessons', 'StudentController@getLessons')->name('student.lessons');
Route::get('/student/lessons/{id}', 'StudentController@showLesson')->name('student.lessons.show');
Route::get('/student/profile','StudentController@getProfile')->name('student.profile');
Route::get('/student/exams/{id}/questions','StudentController@getExamQuestions')->name('student.exam.questions');

// Teacher
Route::get('/teacher/home','TeacherController@getHome')->name('teacher.home');
Route::get('/teacher/profile','TeacherController@getProfile')->name('teacher.profile');


// Lesson
Route::get('/lessons', 'LessonController@index')->name('lessons');
Route::get('/lessons/create', 'LessonController@create')->name('lessons.create');
Route::post('/lessons', 'LessonController@store')->name('lessons.store');
Route::put('/lessons/{id}', 'LessonController@update')->name('lessons.update');
Route::delete('/lessons/{id}', 'LessonController@destroy')->name('lessons.destroy');
Route::get('/lessons/{id}', 'LessonController@show')->name('lessons.show');
Route::get('/lessons/{id}/edit', 'LessonController@edit')->name('lessons.edit');

//search
Route::get('/search','SearchController@getSearchingLessons')->name('student.lessons.search');


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
Route::get('/result/{id}','ResultController@show')->name('result.show');

//paypal
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
