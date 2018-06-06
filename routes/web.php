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



Route::get('/', 'ArticleController@index');
/*「インストールしたURL/create」にアクセスした時はをArticleコントローラのcreateメソッドに割り当て、
「インストールしたURL/create」にフォームのデータをPOSTした時はArticleコントローラのstoreメソッドに割り当て。*/
Route::get('create', 'ArticleController@create');
Route::post('create', 'ArticleController@store');
Route::get('edit/{id}', 'ArticleController@edit');
Route::post('edit', 'ArticleController@update');
Route::get('delete/{id}', 'ArticleController@show');
Route::post('delete', 'ArticleController@delete');