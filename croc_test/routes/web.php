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

Route::get('/poll', 'PollController@Index');
Route::get('/poll/create', 'PollController@Form');
Route::get('/group', 'GroupController@Index')->name('groupsList');
Route::get('/group/create', 'GroupController@Form')->name('groupCreate');
Route::post('/group/create', 'GroupController@Save')->name('groupSave');
Route::get('/group/edit/{group}', 'GroupController@Form')->name('groupEdit');