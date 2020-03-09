<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('customers', 'CustomerController');

Route::get('/customers/{id}/account',[
    'as' => 'accounts.show',
    'uses' => 'AccountController@show'
]);

Route::get('/customers/{id}/transaction/new',[
    'as' => 'transaction.new',
    'uses' => 'AccountController@createTransaction'
]);

Route::get('/customers/transaction/store',[
    'as' => 'accounts.transaction.store',
    'uses' => 'AccountController@storeTransaction'
]);



