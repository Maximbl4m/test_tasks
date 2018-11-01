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

Route::get('/poll', 'PollController@Index')->name('pollsList');
Route::get('/poll/create', 'PollController@Form')->name('pollCreate');
Route::post('/poll/create', 'PollController@Save')->name('pollSave');
Route::get('/poll/edit/{poll}', 'PollController@Form')->name('pollEdit');
Route::post('/poll/edit/{poll}', 'PollController@Save');
Route::get('/poll/delete/{poll}', 'PollController@Remove');

Route::get('/poll/{poll}/questions', 'QuestionsController@Index')->name('questionsList');
Route::get('/poll/{poll}/questions/create', 'QuestionsController@Form')->name('questionCreate');
Route::get('/poll/{poll}/questions/edit/{question}', 'QuestionsController@Form')->name('questionEdit');
Route::post('/poll/{poll}/questions/edit/{question}', 'QuestionsController@Save')->name('questionEdit');
Route::post('/poll/{poll}/questions/create', 'QuestionsController@Save');
Route::get('/poll/{poll}/questions/remove/{question}', 'QuestionsController@Remove');


Route::get('/group', 'GroupController@Index')->name('groupsList');
Route::get('/group/create', 'GroupController@Form')->name('groupCreate');
Route::post('/group/create', 'GroupController@Save')->name('groupSave');
Route::post('/group/edit/{group}', 'GroupController@Save');
Route::get('/group/edit/{group}', 'GroupController@Form')->name('groupEdit');
Route::get('/group/delete/{group}', 'GroupController@Remove');