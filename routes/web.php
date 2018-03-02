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

/*
HOMEPAGE SECTION
1.Only For User/Guest
*/

Route::get('/','HomeController@index')->name('home');

/*END OF HOMEPAGE SECTION*/

/*AUTH SECTION*/
Auth::routes();
/*END OF AUTH*/


/*
ADMIN SECTION
1. Using CheckRole Middleware (admin)
2. Prefix Admin
*/
Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::get('/', 'UserManagementController@index')->name('dashboard');
	
	//Route::get('/upload','HomeController@upload');
	//Route::post('/upload', 'HomeController@store')->name('upload');

	//User Management
    Route::get('/user/delete/{id}','UserManagementController@destroy');
    Route::get('/user/edit/{id}','UserManagementController@edit')->name('user_edit');
    Route::post('/user/update/{id}','UserManagementController@update')->name('user_update');

    //Payment Confirmation
    Route::get('/payment/confirmation','TransactionManagementController@index')->name('confirmation');
    Route::get('/payment/approve/{id}','TransactionManagementController@approve')->name('approve_payment');
    Route::get('/payment/decline/{id}','TransactionManagementController@decline')->name('decline_payment');
    Route::get('/transaction','TransactionManagementController@showTransactions')->name('all_transaction');

    //Product Management
    Route::get('/product','ProductManagementController@index')->name('product');
    Route::get('/product/delete/{id}','ProductManagementController@destroy');
    Route::get('/product/new','ProductManagementController@create')->name('product_new');
    Route::post('/product','ProductManagementController@store')->name('product_store');
    Route::get('/product/edit/{id}','ProductManagementController@edit')->name('product_edit');
    Route::post('/product/update/{id}','ProductManagementController@update')->name('product_update');

    //Coffin Management
    Route::get('/coffin','CoffinManagementController@index')->name('coffin');
    Route::get('/coffin/delete/{id}','CoffinManagementController@destroy');
    Route::get('/coffin/new','CoffinManagementController@create')->name('coffin_new');
    Route::post('/coffin','CoffinManagementController@store')->name('coffin_store');
    Route::get('/coffin/edit/{id}','CoffinManagementController@edit')->name('coffin_edit');
    Route::post('/coffin/update/{id}','CoffinManagementController@update')->name('coffin_update');

    //Color Management
    Route::get('/color','ColorManagementController@index')->name('color');
    Route::get('/color/delete/{id}','ColorManagementController@destroy');
    Route::get('/color/new','ColorManagementController@create')->name('color_new');
    Route::post('/color','ColorManagementController@store')->name('color_store');
    Route::get('/color/edit/{id}','ColorManagementController@edit')->name('color_edit');
    Route::post('/color/update/{id}','ColorManagementController@update')->name('color_update');

    //Pattern Management
    Route::get('/pattern','PatternManagementController@index')->name('pattern');
    Route::get('/pattern/delete/{id}','PatternManagementController@destroy');
    Route::get('/pattern/new','PatternManagementController@create')->name('pattern_new');
    Route::post('/pattern','PatternManagementController@store')->name('pattern_store');
    Route::get('/pattern/edit/{id}','PatternManagementController@edit')->name('pattern_edit');
    Route::post('/pattern/update/{id}','PatternManagementController@update')->name('pattern_update');

    //Accessories Management
    Route::get('/accessories','AccessoriesManagementController@index')->name('accessories');
    Route::get('/accessories/delete/{id}','AccessoriesManagementController@destroy');
    Route::get('/accessories/new','AccessoriesManagementController@create')->name('accessories_new');
    Route::post('/accessories','AccessoriesManagementController@store')->name('accessories_store');
    Route::get('/accessories/edit/{id}','AccessoriesManagementController@edit')->name('accessories_edit');
    Route::post('/accessories/update/{id}','AccessoriesManagementController@update')->name('accessories_update');

    //Slider Management
   	Route::get('/slider','SliderManagementController@index')->name('slider');
   	Route::get('/slider/delete/{id}','SliderManagementController@destroy');
   	Route::get('/slider/new','SliderManagementController@create')->name('slider_new');
   	Route::post('/slider','SliderManagementController@store')->name('slider_store');
    Route::get('/slider/edit/{id}','SliderManagementController@edit')->name('slider_edit');
    Route::post('slider/update/{id}','SliderManagementController@update')->name('slider_update');

    //Additional
    Route::get('/order/{id}','TransactionManagementController@order_detail')->name('order_detail');
    Route::post('/order/change/pattern/price','TransactionManagementController@update_pattern_price')->name('update_pattern_price');
});
/*END OF ADMIN SECTION*/

/*

USER SECTION
1. Using CheckRole Middleware (user)
2. No Prefix
*/
Route::group(['middleware' => 'user'], function () {
	
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::post('/profile','ProfileController@update')->name('update_profile');
	Route::get('/transaction','TransactionController@allTransaction')->name('transaction');
	Route::get('/checkout/{id}','TransactionController@checkout')->name('checkout');
	Route::get('/custom','CustomController@index')->name('custom');
	Route::post('/custom/checkout','TransactionController@customCheckout')->name('custom_process');
	Route::post('/checkout','TransactionController@finalizeCheckout')->name('checkout_final');
	Route::get('/payment/{id}','TransactionController@payment')->name('payment');
	Route::post('/confirmation','TransactionController@confirmation')->name('payment_confirm');
});
/*END OF USER SECTION*/

	

	
