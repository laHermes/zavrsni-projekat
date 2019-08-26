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
Route::post('/home/chf', 'HomeController@addChf');
Route::post('/home/eur', 'HomeController@addEur');
Route::post('/home/usd', 'HomeController@addUsd');
Route::post('/home/gbp', 'HomeController@addGbp');


// Route::get('/addChf', 'HomeController@viewAddChf')->name('addChf');
// Route::post('/addChf', 'HomeController@addChf')->name('addChf');


Route::get('/addCurrencies', 'HomeController@viewAddCurrencies')->name('addChfCurrencies');
Route::post('/addCurrencies', 'HomeController@addCurrency')->name('addChfCurrency');


Route::get('/sendMoney', 'HomeController@viewSendMoney')->name('sendMoney');
Route::post('/sendMoney', 'HomeController@SendMoney')->name('sendMoney');

Route::get('/addMoney', 'HomeController@viewAddMoney');
Route::post('/addMoney', 'HomeController@addMoney');

Route::get('/exchange', 'HomeController@viewExchange');
Route::post('/exchange', 'HomeController@exchange');

Route::get('/history', 'HomeController@viewHistory');

Route::get('/photoUpload', 'HomeController@viewUploadPhoto');
Route::post('/photoUpload', 'HomeController@uploadPhoto');


