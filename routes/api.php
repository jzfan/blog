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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('paragraphs', 'ParagraphController');
Route::apiResource('tags', 'TagController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::delete('marks', 'MarkController@destroy');
Route::post('marks', 'MarkController@store');

Route::get('categories', 'CategoryController@index');