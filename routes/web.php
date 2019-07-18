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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('article/{id}', 'ArticleController@show');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('articles', 'ArticleController');
});
Route::group(['middleware'=>'auth', 'namespace'=>'Admin\Comments', 'prefix'=>'admin/articles/{articleID}/'],function(){
    Route::get('comments', 'CommentController@index');
    Route::get('comments/{id}/edit','CommentController@edit');
    Route::delete('comments/{id}','CommentController@destroy');
    Route::patch('comments/{id}','CommentController@update');
});
Route::post('comment', 'CommentController@store');
