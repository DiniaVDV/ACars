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

Route::get('/list_of_items', 'PagesController@listOfItems');

Route::get('/get_years', 'CarsController@getYears');

Route::get('/get_models', 'CarsController@getModels');

Route::get('/get_engines', 'CarsController@getEngines');
Route::get('/cars/{alias}', 'CarsController@getItems');
Route::get('/cars/{alias}/select/{category_name}', 'CategoriesController@select');

Route::get('/add_to_cart/{id}', 'ItemsController@addToCart');

Route::get('/shopping_cart', 'ItemsController@getCart');

Route::get('checkout', 'ItemsController@getCheckout');
Route::post('checkout', 'ItemsController@postCheckout');

Route::get('/user/profile', 'UserController@getProfile');



Auth::routes();


