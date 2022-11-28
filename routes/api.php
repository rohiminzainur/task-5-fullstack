<?php

use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');

        Route::post('add-article', 'Api\ArticleController@store')->name('article.store');
        Route::post('update-article/{id}', 'Api\ArticleController@update')->name('article.update');
        Route::post('delete-article', 'Api\ArticleController@destroy')->name('article.delete');
        Route::get('list-article', 'Api\ArticleController@index')->name('article.index');
        Route::get('show-article/{id}', 'Api\ArticleController@show')->name('article.show');
        Route::resource('category', 'Api\CategoryController');
    });
});