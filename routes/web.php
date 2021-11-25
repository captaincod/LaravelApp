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

Route::get('/','WelcomeController@index');

Route::get('/hello','HelloController@index');
Route::get('/hello/{user}.html','HelloController@user');

Route::post('/articles/{slug}comments','ArticleController@addComent');

Route::get('/json',function(){
    return ['status' => 'ok', 'date' => date(Y-m-d)];
});



Route::get('/users','UserController@index');

Route::prefix('/articles')->group(function(){
    Route::get('','PostController@index')
        ->name('posts');
    Route::get('{post}','PostController@show')
        ->name('post');
    Route::post('{post}','PostController@postComment');
});

Route::get('/form','FormController@index');

Route::get('/catalog','CatalogController');