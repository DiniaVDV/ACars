<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
    // return view('pages.main');
// });

Route::get('/', 'PagesController@index');

Route::get('index', 'PagesController@index');

Route::get('about', 'PagesController@about');

Route::get('paymentAndDelivery', 'PagesController@paymentAndDelivery');

Route::get('contacts', 'PagesController@contacts');

