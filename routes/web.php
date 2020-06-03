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

$router->get('/', function () use ($router) {
    return response()->json([
        'success' => true,
        'message' => 'Hi'
    ]);
});

$router->group([
    'prefix' => 'api/v1',
], function () use ($router) {
     //$router->get('/', 'ExampleController@index');

     //user create
     $router->post('/users', 'UsersController@create');

     //Authentication
     $router->post('/login', 'UsersController@authenticate');


     //Restricted routes
     $router->group(['middleware' => 'auth:api'], function() use ($router) {
        

        //users index
        $router->get('/users', 'UsersController@index');

        //me
        $router->get('/me', 'UsersController@me');


     });
     
});