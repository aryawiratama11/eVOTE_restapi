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
    $api->get('getUserGroups/{user_id}','App\Http\Controllers\groupsController@index');
    $api->get('getGroupPolls/{group_id}','App\Http\Controllers\pollController@index');
    $api->get('getPollInfo/{poll_id}','App\Http\Controllers\pollController@show');
    $api->get('getPollChoices/{poll_id}','App\Http\Controllers\pollController@getChoices');
    $api->get('getUserVote/{user_id}/poll/{poll_id}','App\Http\Controllers\homeController@getVote');
    $api->get('getUsersNinGroup/{group_id}','App\Http\Controllers\groupsController@getUserNiGroup');
    $api->get('getGroupUsers/{group_id}','App\Http\Controllers\groupsController@getGroupUsers');
    $api->get('getVoteSummary/{group_id}','App\Http\Controllers\voteController@getVoteSummary');
    $api->get('removePoll/{poll_id}','App\Http\Controllers\pollController@destroy');
    $api->get('removeGroup/{group_id}','App\Http\Controllers\groupsController@destroy');


    $api->post('addVote','App\Http\Controllers\voteController@insertVote');
    $api->post('getPollByName','App\Http\Controllers\pollController@getPollByName');
    $api->post('authenticate','App\Http\Controllers\homeController@authenticate');
    $api->post('addUser','App\Http\Controllers\homeController@insertUser');
    $api->post('addGroup','App\Http\Controllers\groupsController@insertGroup');
    $api->post('addPoll','App\Http\Controllers\pollController@insertPoll');
    $api->post('addUserGroup','App\Http\Controllers\groupsController@insertUserGroup');
    $api->post('addUserPollGroup','App\Http\Controllers\pollController@insertUserPoll');
    $api->post('addPollChoices','App\Http\Controllers\voteController@insertPollChoices');
    $api->post('addUsersToGroup','App\Http\Controllers\groupsController@insertUsersIntoGroup');
    

});