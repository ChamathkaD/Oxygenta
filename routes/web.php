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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');

Route::get('/articles', 'ArticleController@index')->name('articles');
Route::get('/articles/{id}', 'ArticleController@show')->name('article.show');

Route::middleware('auth')->group(function () {
    Route::get('/order', 'OrderController@index')->name('orders');
    Route::post('/order/store', 'OrderController@store')->name('order.store');
    Route::get('/account', 'AccountController@index')->name('account');
    Route::get('/account/information', 'AccountController@showInformationForm')->name('account.information');
    Route::post('/account/information/{id}', 'AccountController@storeInformation')->name('account.information.store');
    Route::get('/account/address', 'AccountController@showAddressForm')->name('account.address');
    Route::post('/account/address/{id}', 'AccountController@storeAddress')->name('account.address.store');
    Route::get('/account/order', 'AccountController@showOrders')->name('account.order');
    Route::get('/account/prescription', 'AccountController@showPrescriptions')->name('account.prescription');
    Route::get('/account/approved', 'AccountController@approved')->name('account.approved');
    Route::get('/cart', 'OrderController@cart')->name('cart');
    Route::post('/add-cart', 'OrderController@addCart')->name('addCart');
    Route::get('/delete-cart/{id}', 'OrderController@deleteCart')->name('deleteCart');
    Route::get('/decline/{id}', 'OrderController@decline')->name('decline');
    Route::post('/checkout', 'OrderController@checkout')->name('checkout');
    Route::match(['get', 'post'], '/review/{order_id}', 'OrderController@orderReview')->name('review');
    Route::match(['get', 'post'], '/place-order', 'OrderController@placeOrder')->name('place-order');
    Route::get('/thanks', 'OrderController@thanks')->name('thanks');
    Route::match(['get', 'post'], '/change', 'UserController@changePassword')->name('password.change');
});

Route::view('/doctors', 'doctors')->name('doctors');
Route::get('/search', 'MyController@search')->name('search');
Route::view('/about', 'about')->name('about');

Route::get('/contact', 'ContactUsController@index')->name('contact');
Route::post('/contact', ['as'=>'contact.store','uses'=>'ContactUsController@store']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'admin.user'], function () {
        Route::post('logout', 'MyController@logout')->name('voyager.logout');
        Route::get('users', 'UserController@getRegisteredUsers')->name('voyager.users.index');
        Route::get('users/{id}', 'UserController@getUserDetails')->name('voyager.users.show');
        Route::get('view_requests', 'OrderController@getRequests')->name('voyager.requests.index');
        Route::get('view_requests/{id}', 'OrderController@getRequestsDetails')->name('voyager.requests.show');
        Route::post('notify_price/{id}', 'OrderController@notify')->name('notify');
        Route::get('view_orders', 'OrderController@getOrder')->name('voyager.order.index');
        Route::get('view_orders/{id}', 'OrderController@getOrderDetails')->name('voyager.order.show');
        Route::get('view_contacts', 'ContactUsController@getContacts')->name('voyager.contact.show');
    });

});

