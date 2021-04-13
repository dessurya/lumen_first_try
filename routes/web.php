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

$router->group(['prefix' => 'react-request'], function() use ($router) {
    $router->post('/auth', function () use ($router) {
        return response()->json([
            'user' => [
                'name'=>'john doe',
                'email'=>'john.doe@mail.com',
                'gander'=>'male',
            ],
            'token' => 'blablabla-dracula',
        ], 201);
    });
    $router->get('/verify-token', function () use ($router) {
        return response()->json([
            'user' => [
                'name'=>'john doe',
                'email'=>'john.doe@mail.com',
                'gander'=>'male',
            ],
            'token' => 'blablabla-dracula',
        ], 201);
    });
});

$router->group(['prefix' => 'auth'], function() use ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/logout', 'AuthController@logout');
    $router->post('/me', 'AuthController@me');
    $router->post('/refresh', 'AuthController@refresh');
});

$router->group(['prefix' => 'try'], function() use ($router) {
    $router->post('/', 'TryController@index');

    $router->group(['middleware' => 'auth:api'], function() use ($router) {
        $router->post('/coba', 'TryController@try');
    });
});
