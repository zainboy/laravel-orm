<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    route::get('articles','ArticleController@index');
    route::get('articles/{id}','ArticleController@getArticle');
    route::get('articles/{id}/comments','ArticleController@getComments');
    route::post('articles','ArticleController@createArticle');
    route::post('articles/search','ArticleController@search');
    route::post('comments','CommentController@createComment');
});
