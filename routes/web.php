<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('question.index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::put('vote/{id}', 'VoteController@vote')->name('votes');
    Route::post('answer', 'AnswerController@store')->name('answer.store');
    //add more Routes here
});




Auth::routes();

Route::get('comm/create/{q_id}/{a_id}', [
    'as' => 'comm.create',
    'uses' => 'CommentController@create'
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('question/create', 'QuestionModelController@create')->name('question.create');
Route::resource('question', 'QuestionModelController', ['except' => 'create']);
Route::resource('answer', 'AnswerController', ['except' => ['index','store']]);
Route::resource('comm', 'CommentController', ['except' => ['index','create']]);