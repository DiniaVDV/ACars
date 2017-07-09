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
Route::post('/addComment', 'CommentsController@addComment');
Route::get('/countLikes', 'CommentsController@countLikes');

Route::get('/get_engines', 'CarsController@getEngines');
Route::get('/cars/{alias}', 'ItemsController@getItems');
Route::get('/cars/{alias}/about', 'CarsController@aboutCar');
Route::get('/cars/{alias}/categories/{category_name}', 'CategoriesController@select');
Route::get('/cars/{alias}/select/{item_name}', 'ItemsController@selectItemCar');
Route::get('/select/{item_name}', 'ItemsController@selectItem');

Route::get('/add_to_cart/{id}', 'ItemsController@addToCart');
Route::get('/delete_from_cart/{id}', 'ItemsController@deleteFromCart');

Route::post('/change_instance', 'ItemsController@changeInstance');

Route::get('/shopping_cart', 'ItemsController@getCart');

Route::get('checkout', 'ItemsController@getCheckout');
Route::post('checkout', 'ItemsController@postCheckout');
Route::get('clean_cart', 'ItemsController@cleanCart');
Route::group(['prefix' => 'user/{name}'], function()
{
	Route::get('/', 'UserController@getProfile')->name('user');
	Route::get('/edit/own_info', 'UserController@editOwnInfo');
	Route::post('/store', 'UserController@store');
	Route::get('/order_history', 'UserController@orderHistory');
	Route::get('/my_comments', 'UserController@myComments');
	
});


Auth::routes();
Route::post('/register','AdvancedReg@register');
// такой маршрут  auth/register у нас уже есть в router.php, его надо изменить на этот
Route::get('register/confirm/{token}','AdvancedReg@confirm');
Route::get('repeat_confirm','AdvancedReg@getRepeat');
Route::post('repeat_confirm','AdvancedReg@postRepeat');
Route::post('login', 'Auth\MyAuth@auth');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
	 Route::group(['middleware' => 'admin'], function()
    {
		Route::get('/', 'CategoryController@index');
		Route::get('/categories', 'CategoryController@index')->name('admin.categories');
		Route::get('/categories/change_parent_category', 'CategoryController@changeParentCategory');
		Route::get('/categories/change_has_child', 'CategoryController@changeHasChild');
		Route::resource('/category', 'CategoryController');
		Route::get('category/{id}/delete', 'CategoryController@destroy');
		
		Route::resource('/cars', 'CarsController');
		Route::resource('/brands', 'BrandController');
		Route::resource('/items', 'ItemsController');
        Route::get('/items/{id}/delete', 'ItemsController@destroy');
		Route::get('/orders', 'OrdersController@index');
		Route::get('/orders/change_type_of_delivery', 'OrdersController@changeTypeOfDelivery');
		Route::get('/orders/change_type_of_payment', 'OrdersController@changeTypeOfPayment');
		Route::get('/orders/change_status', 'OrdersController@changeStatus');
		Route::get('/orders/{id}/delete', 'OrdersController@destroy');
		Route::get('/orders/{id}/edit', 'OrdersController@edit');
		
		Route::get('/orders/waiting', 'OrdersController@waiting');
		Route::group(['prefix' => '/orders/{id}'], function()
		{
			Route::get('/details', 'OrdersController@details');
			Route::get('/details/add_item_to_order', 'OrdersController@getAddItemToOrder');
			Route::post('/details/add_item_to_order', 'OrdersController@postAddItemToOrder');
            Route::get('/details/delete/{idItem}', 'OrdersController@deleteItem');
			Route::get('/details/change', 'OrdersController@changeDetails');
			Route::post('/details/change/{idItem}', 'OrdersController@changeQtyItem');
			Route::get('/edit/{idItem}', 'OrdersController@editDetails');
		});
        Route::get('/comments', 'CommentsController@index');
        Route::get('/comments/{id}/edit', 'CommentsController@edit');
        Route::patch('/comments/{id}', 'CommentsController@update');
        Route::get('/comments/{id}/delete', 'CommentsController@delete');

		Route::resource('/users', 'UserController');
        Route::get('/users/{id}/delete', 'UserController@destroy');
        Route::get('/changeRole', 'UserController@changeRole');
	});
	
	Route::group(['middleware' => 'moderator'], function()
    {
		Route::get('/', 'CategoryController@index');
		Route::get('/categories', 'CategoryController@index')->name('admin.categories');
		Route::get('/cars', 'CarsController@index');
		Route::get('/brands', 'BrandController@index');
		Route::get('/items', 'ItemsController@index');
		Route::get('/orders', 'OrdersController@index');	
		Route::group(['prefix' => '/orders/{id}'], function()
		{
			Route::get('/details', 'OrdersController@details');
		});

        Route::resource('/users', 'UserController');

	});

	
});


