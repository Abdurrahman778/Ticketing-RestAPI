<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', 'UserController@login');
$router->post('/register', 'UserController@register');
$router->post('/logout', 'UserController@logout');


$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/me', 'UserController@me');

    $router->group(['prefix' => 'transports'], function () use ($router) {
        $router->get('/', 'TransportController@index');
        $router->get('/{id}', 'TransportController@show');
        $router->post('/', 'TransportController@store');
        $router->patch('/{id}', 'TransportController@update');
        $router->delete('/{id}', 'TransportController@destroy');
    });
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', 'UserController@index');
    $router->post('/', 'UserController@store');
    $router->patch('/{id}', 'UserController@update');
    $router->delete('/{id}', 'UserController@destroy');
    $router->get('/{id}', 'UserController@show');
});
