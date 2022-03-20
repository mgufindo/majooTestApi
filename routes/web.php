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

$router->post("/login", "LoginController@login");

$router->group(['prefix' => 'product', 'middleware' => [\App\Http\Middleware\Cors::class]], function () use ($router) {
    $router->get('/', 'ProductController@allProduct');
    $router->get("/list", "ProductController@listProduct");
    $router->post("/", "ProductController@create");
    $router->post("/delete", "ProductController@delete");
});

$router->group(['prefix' => 'kategori', 'middleware' => [\App\Http\Middleware\Cors::class]], function () use ($router) {
    $router->get('/', 'KategoriController@kategori');
    $router->get('/list', 'KategoriController@kategoriList');
    $router->post('/insert', 'KategoriController@insert');
});
