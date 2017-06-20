<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'PagesController@index');

Route::get('/index', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/payment_and_delivery', 'PagesController@paymentAndDelivery');

Route::get('/contacts', 'PagesController@contacts');

Route::get('/list_of_items', 'ItemsController@listOfItems');

Route::get('/get_years', 'CarsController@getYears');

Route::get('/get_models', 'CarsController@getModels');

Route::get('/get_engines', 'CarsController@getEngines');
Route::get('/cars/{alias}', 'ItemsController@getItems');
Route::get('/cars/{alias}/categories/{category_name}', 'CategoriesController@select');
Route::get('/cars/{alias}/select/{item_name}', 'ItemsController@selectItem');

Route::get('/add_to_cart/{id}', 'ItemsController@addToCart');
Route::get('/delete_from_cart/{id}', 'ItemsController@deleteFromCart');

Route::post('/change_instance', 'ItemsController@changeInstance');

Route::get('/shopping_cart', 'ItemsController@getCart');

Route::get('checkout', 'ItemsController@getCheckout');
Route::post('checkout', 'ItemsController@postCheckout');
Route::get('clean_cart', 'ItemsController@cleanCart');

Route::get('/user/profile', 'UserController@getProfile');

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
	Route::get('/', 'AdminController@index');
	Route::get('/categories', 'CategoryController@index')->name('admin.categories');
	Route::get('/categories/change_parent_category', 'CategoryController@changeParentCategory');
	Route::get('/categories/change_has_child', 'CategoryController@changeHasChild');
	Route::resource('/category', 'CategoryController');
	Route::get('category/{id}/delete', 'CategoryController@destroy');
	
	Route::resource('/cars', 'CarsController');
	Route::resource('/brands', 'BrandController');
	Route::resource('/items', 'ItemsController');
});


