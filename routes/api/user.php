<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::get('/','\App\Http\Controllers\API\User\UsersController@index');
    Route::put('update','\App\Http\Controllers\API\User\UsersController@update');
    Route::post('avatar', '\App\Http\Controllers\API\User\UsersController@setAvatar');
    Route::post('photo', '\App\Http\Controllers\API\User\UsersController@setMedia');
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/','ClientController@index');
    Route::get('{client}','ClientController@item');
    Route::put('{client}/update','ClientController@update');
    Route::delete('{client}/delete','ClientController@delete');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/','\App\Http\Controllers\API\Admin\UsersController@index');
    Route::get('{user}','\App\Http\Controllers\API\Admin\UsersController@item');
    Route::put('{user}/update','\App\Http\Controllers\API\Admin\UsersController@update');
    Route::delete('{user}/delete', '\App\Http\Controllers\API\Admin\UsersController@update');
});

Route::group(['prefix' => 'preagreements'], function (){
    Route::get('/', "\App\Http\Controllers\API\User\PreagreementController@index");
});
