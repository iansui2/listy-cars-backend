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

$router->get('api/getCars', ['as' => 'template', 'uses' => 'TemplateController@index']);
$router->get('api/getCar/{id}', ['as' => 'template', 'uses' => 'TemplateController@getTemplate']);
$router->post('api/listCar', ['as' => 'template', 'uses' => 'TemplateController@createTemplate']);
$router->put('api/updateCar/{id}', ['as' => 'template', 'uses' => 'TemplateController@updateTemplate']);
$router->delete('api/deleteCar/{id}', ['as' => 'template', 'uses' => 'TemplateController@deleteTemplate']);
