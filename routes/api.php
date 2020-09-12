<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/news/attention', 'NewsController@attention')->name('news.attention');
Route::get('/news/history', 'NewsController@history')->middleware('auth')->name('news.history');
Route::get('/news/player/{playerId}', 'NewsController@player')->name('news.player');
Route::get('/news/competition/{competitionId}', 'NewsController@competition')->name('news.competition');
Route::post('/news/comment/{commentId}/favorite', 'NewsController@commentFavorite')->middleware('auth')->name('news.commentFavorite');
Route::post('/news/comment/{id}', 'NewsController@comment')->middleware('auth')->name('news.comment');
Route::delete('/news/comment/{commentId}/favorite', 'NewsController@commentNotFavorite')->middleware('auth')->name('news.commentNotFavorite');
Route::delete('/news/comment/{commentId}', 'NewsController@commentDelete')->middleware('auth')->name('news.commentDelete');
Route::get('/news/{id}', 'NewsController@show')->name('news.show');

Route::get('/player', 'PlayerController@index')->name('player.index');
Route::get('/player/favorite', 'PlayerController@favoriteList')->middleware('auth')->name('player.favoriteList');
Route::get('/player/{id}', 'PlayerController@show')->name('player.show');
Route::post('/player/{id}/favorite', 'PlayerController@favorite')->middleware('auth')->name('player.favorite');
Route::delete('/player/{id}/favorite', 'PlayerController@notFavorite')->middleware('auth')->name('player.notFavorite');

Route::get('/competition', 'CompetitionController@index')->name('competition.index');
Route::get('/competition/favorite', 'CompetitionController@favoriteList')->middleware('auth')->name('competition.favoriteList');
Route::get('/competition/{id}', 'CompetitionController@show')->name('competition.show');
Route::post('/competition/{id}/favorite', 'CompetitionController@favorite')->middleware('auth')->name('competition.favorite');
Route::delete('/competition/{id}/favorite', 'CompetitionController@notFavorite')->middleware('auth')->name('competition.notFavorite');

Route::get('/user', 'UserController@user')->name('user');
Route::put('/user/edit/name', 'UserController@editName')->middleware('auth')->name('user.editName');
Route::put('/user/edit/password', 'UserController@editPassword')->middleware('auth')->name('user.editPassword');
Route::delete('/user/delete', 'UserController@delete')->middleware('auth')->name('user.delete');