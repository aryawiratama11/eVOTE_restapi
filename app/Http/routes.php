<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

Route::get('/', function () {
    return view('welcome');
});

$api->version('v1',function($api){

    $api->get('getUsers','App\Http\Controllers\homeController@index');
    $api->post('addUser','App\Http\Controllers\homeController@insertUser');
    $api->get('getUserGroups/{user_id}','App\Http\Controllers\groupsController@index');

    $api->post('authenticate','App\Http\Controllers\homeController@authenticate');
});