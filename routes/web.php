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
use Illuminate\Http\Request;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BillProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductProviderController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BillController;
use  App\Http\Controllers\NegativeSoldController;



use MongoDB\Client as Mongo;







// $router->get('/mongo', function(Request $request) {
//     $collection = (new Mongo)->mydatabase->mycollection;
//     return $collection->find()->toArray();
// });

/*Route::get('/mongo', function(Request $request) {
    $collection = Mongo::get()->mydatabase->mycollection;
    return $collection->find()->toArray();
});*/


/**--------------------------------------------------------------------
|*CRUD USERS
|*
|*
*/
$router->post('/users/login', 'UsersController@getToken');
//devuelve users por id
$router->get('/users/{id}', 'UsersController@show');
//crea users
$router->post('/users', 'UsersController@create');
//devuelve todas las users
$router->get('/users', 'UsersController@index');
//Actualizr users
$router->put('/users/{id}', 'UsersController@update');
//Borra users
$router->delete('/users/{id}', 'UsersController@delete');


/**--------------------------------------------------------------------
		|*CRUD ROL
		|*
		|*
		*/
		//devuelve rol por id
		$router->get('/roles/{id}', 'RoleController@show');
		//crea rol
		$router->post('/roles', 'RoleController@create');
		//devuelve todas las rol
		$router->get('/roles', 'RoleController@index');
		//Actualizr rol
		$router->put('/roles/{id}', 'RoleController@update');
		//Borra rol
		$router->delete('/roles/{id}', 'RoleController@delete');


		/**--------------------------------------------------------------------
		|*CRUD ROL
		|*
		|*
		*/
		//devuelve rol por id
		$router->get('/api/{id}', 'NegativeSoldController@show');
		//crea rol
		$router->post('/api', 'NegativeSoldController@create');
		//devuelve todas las rol
		$router->get('/api', 'NegativeSoldController@index');
		//Actualizr rol
		$router->put('/api/{id}', 'NegativeSoldController@update');
		//Borra rol
		$router->delete('/api/{id}', 'NegativeSoldController@delete');




$router->group(['middleware' => 'auth'], function () use ($router) {

			/**--------------------------------------------------------------------
		|*CRUD ProductProvider
		|*
		|*
		*/
		//devuelve product-provider relationship por id
		$router->get('/products-providers/{id}', 'ProductProviderController@show');
		//crea product-provider relationship
		$router->post('/products-providers', 'ProductProviderController@create');
		//devuelve todas las product-provider relationship
		$router->get('/products-providers', 'ProductProviderController@index');
		//Actualizr product-provider relationship
		$router->put('/products-providers/{id}', 'ProviderController@update');
		//Borra product-provider relationship
		$router->delete('/products-providers/{id}', 'ProductProviderController@delete');
		/**--------------------------------------------------------------------
		|*CRUD PRODUCTOS
		|*
		|*
		*/
		//devuelve product por id
		$router->get('/products/{id}', 'ProductController@show');
		//crea product
		$router->post('/products', 'ProductController@create');
		//devuelve todas las product
		$router->get('/products', 'ProductController@index');
		//Actualizr product
		$router->put('/products/{id}', 'ProductController@update');
		//Borra product
		$router->delete('/products/{id}', 'ProductController@delete');
		//Obtiene categoría
		$router->get('/products/{id}/category/', 'ProductController@getCategory');





		/**--------------------------------------------------------------------
		|*CRUD CATEGORIES
		|*
		|*
		*/
		//devuelve category por id
		$router->get('/categories/{id}', 'CategoryController@show');
		//crea category
		$router->post('/categories', 'CategoryController@create');
		//devuelve todas las categorías
		$router->get('/categories', 'CategoryController@index');
		//Actualizr category
		$router->put('/categories/{id}', 'CategoryController@update');
		//Borra category
		$router->delete('/categories/{id}', 'CategoryController@delete');






		/**--------------------------------------------------------------------
		|*CRUD SALES
		|*
		|*
		*/
		//devuelve sale (user-product relationship) por id
		$router->get('/sales/{id}', 'BillProductController@show');
		//crea sale (user-product relationship)
		$router->post('/sales', 'BillProductController@create');
		//devuelve todas las sale (user-product relationship)
		$router->get('/sales', 'BillProductController@index2');
		//Actualizr sale (user-product relationship)
		$router->put('/sales/{id}', 'BillProductController@update');
		//Borra sale (user-product relationship)
		$router->delete('/sales/{id}', 'BillProductController@delete');
		//Product of sale
		$router->get('/sales/{id}/product', 'BillProductController@getProduct');
		//Bill of product
		$router->get('/sales/{id}/bill', 'BillProductController@getProduct');

		$router->get('/bill2', 'BillController@lastBill');



		/**--------------------------------------------------------------------
		|*CRUD BILL
		|*
		|*
		*/
		//devuelve sale (user-product relationship) por id
		$router->get('/bill/{id}', 'BillController@show');
		//crea sale (user-product relationship)
		$router->post('/bill', 'BillController@create');
		//devuelve todas las sale (user-product relationship)
		$router->get('/bill', 'BillController@index');
		//Actualizr sale (user-product relationship)
		$router->put('/bill/{id}', 'BillController@update');
		//Borra sale (user-product relationship)
		$router->delete('/bill/{id}', 'BillController@delete');



		/**--------------------------------------------------------------------
		|*CRUD PROVIDERS
		|*
		|*
		*/
		//devuelve provider por id
		$router->get('/providers/{id}', 'ProviderController@show');
		//crea provider
		$router->post('/providers', 'ProviderController@create');
		//devuelve todas las provider
		$router->get('/providers', 'ProviderController@index');
		//Actualizr provider
		$router->put('/providers/{id}', 'ProviderController@update');
		//Borra provider
		$router->delete('/providers/{id}', 'ProviderController@delete');




		/**--------------------------------------------------------------------
		|*CRUD USERROL
		|*
		|*
		*/
		//devuelve role-user relationship por id
		$router->get('/role-user/{id}', 'RoleUserController@show');
		//crea role-user relationship
		$router->post('/role-user', 'RoleUserController@create');
		//devuelve todas las user-rol relationship
		$router->get('/role-user', 'RoleUserController@index');
		//Actualizr role-user relationship
		$router->put('/role-user/{id}', 'RoleUserController@update');
		//Borra role-user relationship
		$router->delete('/role-user/{id}', 'RoleUserController@delete');




});


