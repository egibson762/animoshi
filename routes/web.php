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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@index');

Route::post('/profile/uploadpicture', 'ProfileController@uploadPicture');

Route::post('/profile/editprofile', 'ProfileController@editProfile');

Route::get('/profile/deletepicture', 'ProfileController@deleteProfilePicture');

Route::post('/profiles/searchprofiles', 'ProfileController@searchProfiles');

Route::get('/profile/search');

Route::get('/profiles/{id}', 'ProfileController@profiles');

Route::get('/post/delete/{postid}', 'PostController@deletePost');

Route::get('/postdownvote/{postid}/{userid}', 'VoteController@downVote');

Route::get('/postupvote/{postid}/{userid}', 'VoteController@upVote');

Route::post('/posts/newpost', 'PostController@newPost');

Route::post('/comment/new', 'CommentController@newComment');

Route::get('/top', 'HomeController@top');

Route::get('/worst', 'HomeController@worst');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('/rules', function () {
    return view('rules');
});

