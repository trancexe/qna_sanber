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
})->name('index');

Route::group(['middleware' => 'auth'], function () {
    Route::put('vote/{id}', 'VoteController@vote')->name('votes');
    Route::put('vote/banswer/{id}', 'VoteController@banswer')->name('banswer');
    Route::post('answer', 'AnswerController@store')->name('answer.store');
    Route::get('comm/create/{q_id}/{a_id}', 'CommentController@create')->name('comm.create');;
    Route::get('question/create', 'QuestionModelController@create')->name('question.create');
});




Auth::routes();


Route::get('/user', 'HomeController@alUser')->name('alluser');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('question', 'QuestionModelController', ['except' => 'create']);
Route::resource('answer', 'AnswerController', ['except' => ['index','store']]);
Route::resource('comm', 'CommentController', ['except' => ['index','create']]);