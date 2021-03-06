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
    return $router->app->version();
});



// aca se definen las rutas del api
// se debe especificar de primero el verbo HTTP como un metodo,
// puede ser get, post, put, delete, etc...
// luego, el primer parametro es la ruta a la que se va a responder
// y el segundo parametro es el controlador y el nombre del metodo que
// responde a esa ruta: NombreControlador@nombreMetodo


//Funciones para creaciones varias
$router->post('/categorias/create', 'LuisController@createCat');
$router->post('/marcas/create', 'LuisController@createMar');
$router->post('/clientes/create', 'LuisController@createCli');
$router->post('/productos/create', 'GustavoController@createPro');
$router->post('/opcional/create', 'GustavoController@createOpc');
$router->post('/valoropcional/create', 'GustavoController@createValOp');
$router->post('/facturas/create', 'GustavoController@createFac');
$router->post('/linea_factura/create', 'GustavoController@createLinFac');

$router->get('/categorias', 'LuisController@getCat');
$router->get('/categoriasF', 'FakeControle@getCatF');
$router->post('/categoriasFa', 'FakeControle@createProdF');
$router->get('/marcas', 'LuisController@getMar');
$router->get('/clientes', 'LuisController@getCli');
$router->get('/productos', 'GustavoController@getPro');
$router->get('/opcional', 'GustavoController@getOpc');
$router->get('/valoropcional', 'GustavoController@getValOp');
$router->get('/facturas2', 'LuisController@getFac');
$router->get('/lineas', 'LuisController@getLin');
$router->get('/linea_factura', 'GustavoController@getLinFac');
$router->get('/facturas', 'GustavoController@getFac');
$router->get('/opcional2', 'LuisController@getOpc');
$router->get('/productos2', 'LuisController@getPro');
$router->get('/valoropcional2', 'LuisController@getVOpc');


$router->post('/users/createFaker', 'FakeControle@storeFaker');
$router->get('/users/Faker', 'FakeControle@getUsersF');
