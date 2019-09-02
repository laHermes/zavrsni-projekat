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




Route::get('/addCurrencies', 'HomeController@viewAddCurrencies');
Route::post('/addCurrencies', 'HomeController@addCurrency');


Route::get('/sendMoney', 'HomeController@viewSendMoney');
Route::post('/sendMoney', 'HomeController@SendMoney');

Route::get('/addMoney', 'HomeController@viewAddMoney');
Route::post('/addMoney', 'HomeController@addMoney');

Route::get('/exchange', 'HomeController@viewExchange');
Route::post('/exchange', 'HomeController@exchange');

Route::get('/history', 'HomeController@viewHistory');

Route::get('/photoUpload', 'HomeController@viewUploadPhoto');
Route::post('/photoUpload', 'HomeController@uploadPhoto');

Route::get('/changePassword', 'HomeController@viewChangePassword');
Route::post('/changePassword', 'HomeController@changePassword');
Route::post('/changePassword/reset', 'HomeController@resetPassword');



Route::get('/bitcoin', 'HomeController@viewBitcoin');


