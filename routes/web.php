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

$router->get('api/getCars', 'TemplateController@index');
$router->get('api/getCar/{id}', 'TemplateController@getTemplate');
$router->post('api/listCar', 'TemplateController@createTemplate');
$router->post('api/updateCar/{id}', 'TemplateController@updateTemplate');
$router->post('api/deleteCar/{id}', 'TemplateController@deleteTemplate');
