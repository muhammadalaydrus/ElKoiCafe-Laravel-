<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'UserController@showRegisterForm');
Route::post('/registerUser', 'UserController@store');
Route::get('/login', 'UserController@showLoginForm');
Route::post('/log-in', 'UserController@Login');
Route::get('/logout', 'UserController@logout');

Route::get('/product', 'ProductController@index');

Route::get('/confirm', 'ConfirmController@index');
Route::post('/confirmpayment', 'ConfirmController@patchConfirm')->name('update.payment');

Route::post('/addtocart/{id}', 'CartController@store');

Route::get('/profile/{id}', 'ProfileController@index');
Route::get('/updateprofile/{id}', 'ProfileController@showUpdateProfileForm')->name('show.update.profile');
Route::patch('/updateprofile/{id}', 'ProfileController@patchProfile')->name('update.profile');

Route::get('/manageProduct', 'ProductController@manage');
Route::post('/addProduct', 'ProductController@storeProduct');

//Route::get('/Products/{types}','MilkTeaController@showpage');
Route::get('/Products/{types}', 'MilkTeaController@showpage')->name('filter');

Route::get('/updateProduct/{id}', 'ProductController@showUpdateForm');
Route::patch('/update/{id}' , 'ProductController@patch');
Route::delete('/deleteProduct/{id}' , 'ProductController@destroy');

Route::get('/types', 'TypeController@index');
Route::post('/addType' , 'TypeController@store');
Route::patch('/updateType/{id}' ,'TypeController@patch');
Route::delete('/deleteType/{id}' , 'TypeController@destroy');

Route::get('/manageUser', 'UserController@showUser');
Route::post('/addUser', 'UserController@addUser');
Route::get('/updateUser/{id}', 'UserController@gotoUser');
Route::get('/userUpdateform/{id}', 'UserController@userPatchForm')->name('user.update');
Route::patch('/updateuser/{id}','UserController@patchUser')->name('user.patch');
Route::delete('/deleteUser/{id}', 'UserController@destroyUser');

Route::get('/cart','CartController@index');
Route::get('/carts/{id}', 'CartController@destroy');

Route::get('/history', 'TransactionController@index');
Route::get('/adminHistory', 'TransactionController@adminIndex');
Route::post('/transaction','TransactionController@store');

Route::get('/receipt_history', 'ReceiptController@index2');
Route::get('/adminReceiptHistory', 'ReceiptController@index');
Route::post('/receipt','ReceiptController@store');

Route::get('/howto', 'HowToController@index');

Route::get('/shipping', 'ShippingController@index');
