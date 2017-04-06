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

Auth::routes();

Route::get('/', 'QuestionController@index');

Route::resource('questions', 'QuestionController');

Route::post('questions/{question}/votes', 'QuestionController@vote')->name('question.votes');

Route::post('questions/photos', 'PhotoController@store')->name('questions.photo');

Route::resource('answers', 'AnswerController');

Route::post('answers/{answer}/votes', 'AnswerController@vote')->name('answer.votes');

Route::post('answers/photos', 'PhotoController@store')->name('answers.photo');

Route::post('answers/{answer}/comment', 'CommentController@store')->name('answers.comment');

Route::get('{username}', 'ProfileController@show')->name('profile.show');

Route::match(['put', 'patch'],'profiles/{profile}', 'ProfileController@update')->name('profile.update');

