<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['namespace' => 'Auth\Controllers', 'prefix' => 'auth'], function () use ($router) {
        $router->post('token', ['as' => 'login', 'uses' => 'AuthController@login']);
        $router->post('register', ['as' => 'register', 'uses' => 'AuthController@register']);
    });
    $router->group(['namespace' => 'Auth\Controllers', 'prefix' => 'auth', 'middleware' => 'auth:api'], function () use ($router) {
        $router->delete('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    });
});
//$router->group(['namespace' => 'Auth\Controllers', 'prefix' => 'auth', 'middleware' => 'auth:api'], function () use ($router) {
//    $router->apiResource('users', 'UserController');
//});


