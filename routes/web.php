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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/addRsd', 'HomeController@viewAddRsd')->name('addRsd');


Route::post('/addRsd', 'HomeController@addRsd')->name('addRsd');


Route::get('/addCurrencies', 'HomeController@viewAddCurrencies')->name('addRsdCurrencies');

Route::post('/addCurrencies', 'HomeController@addCurrency')->name('addRsdCurrencies');

Route::get('/sendMoney', 'HomeController@viewSendMoney')->name('sendMoney');

Route::post('/sendMoney', 'HomeController@SendMoney')->name('sendMoney');

