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
Auth::routes();

Route::get('/', function () {
    return view('customer/index');
});



//Route::get('/home', 'HomeController@index')->name('home');

//customer
Route::prefix('customer')->group(function() {
	Route::get('home', 'CustomerControllerRedirect@index')->name('shopHome');
	Route::get('customer_login', 'Customer\CustomerLoginController@LoginForm')->name('customer.login');
	Route::post('customer_login', 'Customer\CustomerLoginController@Login');
});
	

//dashboard
Route::group(['middleware' => ['auth']], function(){
	Route::prefix('admin')->group(function() {
		
		Route::get('home', 'HomeController@index')->name('home');
		//here is view product
		Route::get('register_product', 'HomeController@registerProduct')->name('registerProduct');
		Route::get('product_list', 'HomeController@productList')->name('productList');
		Route::get('cod', 'HomeController@cash_on_delivery')->name('cod');
		Route::get('product_delete/{id}', 'HomeController@productDelete')->name('productDelete');
		Route::get('add_stock/{id}', 'HomeController@addStock')->name('stock');
		Route::get('edit_product/{id}', 'HomeController@editProduct')->name('editProduct');
		Route::get('category', 'HomeController@category')->name('category');
		Route::get('comments', 'HomeController@comment')->name('comment');


		Route::post('product_trigger', 'HomeController@registerProductTrigger')->name('addProduct');
		Route::post('add_stocks/{id}', 'HomeController@addStocks');
		Route::post('edit_product_trigger', 'HomeController@editProductTrigger');
		Route::post('add_category', 'HomeController@addCategory');


	});

});
	
