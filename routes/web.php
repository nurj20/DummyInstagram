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
    return view('welcome');
});


Route::get('/email', function(){
    return new \App\Mail\NewUserRegistered();
});

Route::post('/comment/{post}', 'CommentController@store');

Route::get('/profile/{user}', 'ProfileController@show');
Route::patch('/profile/{user}', 'ProfileController@update');
Route::get('/profile/{user}/edit', 'ProfileController@edit');
 Route::post('/follow/{user}', 'FollowController@store');
Route::get('/follow/{user}', 'FollowController@show');
Route::get('/post/create', 'PostController@create');
Route::post('/post', 'PostController@store');

 Route::get('/post/{post}', 'PostController@show');
Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
