<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('member/{id}','MemberController@viewResume');
Route::auth();
Route::group(['middleware' => ['auth']], function () {
Route::any('/i', ['as' => 'i', 'uses' => 'HomeController@login']);

Route::any('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::any('/files', ['as' => 'files', 'uses' => 'FilesController@index']);
Route::any('/profile', ['as' => 'profile', 'uses' => 'FilesController@profile']);
Route::post('/files', ['as' => 'files', 'uses' => 'FilesController@showFileUpload']);
Route::post('/profile', ['as' => 'profile', 'uses' => 'FilesController@updateProfile']);
Route::any('/notifications', ['as' => 'notifications', 'uses' => 'HomeController@notifications']);
Route::resource('members', 'MemberController@members');
Route::resource('resume', 'MemberController');
Route::resource('/search','SearchController@index');
 Route::resource('postView','HomeController');
 Route::resource('postView/{id}','HomeController@postAction');

});
Route::group(['middleware' => ['web']], function () {



});

