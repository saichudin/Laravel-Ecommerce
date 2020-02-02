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

Route::get('/', 'IndexController@index')->name('cust_home');
//Route::get('/product/{id}-{slug}','IndexController@viewProduct');
//Route::get('/viewproduct/{product}','IndexController@viewProduct');
Route::Post('/addCart/{product}','IndexController@addCart');

Route::group(['prefix' => '', 'as' => 'product.'], function() {
    Route::get('product/{product}', 'IndexController@viewProduct')->name('show');
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function() {
    Route::get('show', 'CartController@show')->name('show');
    Route::post('add/{product}', 'CartController@add')->name('add');
    Route::post('update/{cart_item}', 'CartController@update')->name('update');
    Route::post('remove/{cart_item}', 'CartController@remove')->name('remove');
});

Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function() {
    Route::get('show', 'CheckoutController@show')->name('show');
    Route::post('submit', 'CheckoutController@submit')->name('submit');
});

Auth::routes();

Route::get('/home', 'IndexController@index')->name('home');

// Route::get('/admin/customer', function(){
//     return View('test');
//  });

// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
//     Route::get('customer', 'CustomerController@index')->name('appshell.customer.index');
// });

Route::get('admin/customer', 'CustomerController@index')->name('appshell.customer.index');

Route::get('customer/product', 'CustomerProductController@index')->name('customer.product.index');
Route::get('customer/product/{product}', 'CustomerProductController@show')->name('customer.product.show');
Route::get('customer/product/create', 'CustomerProductController@create')->name('customer.product.create');
Route::post('customer/product/store', 'CustomerProductController@store')->name('customer.product.store');
Route::get('customer/product/{product}/edit', 'CustomerProductController@edit')->name('customer.product.edit');
Route::put('customer/product/{product}', 'CustomerProductController@update')->name('customer.product.update');
Route::delete('customer/product/{product}', 'CustomerProductController@destroy')->name('customer.product.destroy');

Route::get('profile/{id}', 'UserProfileController@show');

Route::get('user_profile/{id}', 'UserProfileController@showUser');
Route::post('user_profile/{id}', 'UserProfileController@update');
Route::post('avatar_profile', 'UserProfileController@update_avatar');


// Route::resource('customer', 'CustomerController', ['names' => [
//     'index' => 'admin.customer'
// ]]);

