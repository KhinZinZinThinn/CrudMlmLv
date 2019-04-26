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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/StudentRecord', [
    'uses'=>'StudentController@getStudentRecord',
    'as'=>'StudentRecord'
]);

Route::post('/StudentRecord/new',[
    'uses'=>'StudentController@postStudentRecord',
    'as'=>'new.student'
]);

Route::get('/StudentRecord/photo/{img_name}',[
    'uses'=>'StudentController@getPhoto',
    'as'=>'photo.image'
]);

Route::get('/StudentRecord/edit/{id}',[
    'uses'=>'StudentController@getEditStudentRecord',
    'as'=>'edit.student'
]);

Route::post('/StudentRecord/update',[
    'uses'=>'StudentController@postUpdateStudentRecord',
    'as'=>'update.student'
]);

Route::get('/StudentRecord/delete',[
    'uses'=>'StudentController@getDeleteStudentRecord',
    'as'=>'delete.student'
]);

