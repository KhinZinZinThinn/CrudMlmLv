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

Route::get('/Student_data',[
    'uses'=>'ApiController@getAll'
]);

Route::get('/data/{id}',[
    'uses'=>'ApiController@getDelete'
]);

Route::post('/insert_data',[
    'uses'=>'ApiController@getInsertStudentRecord'
]);
