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




Route::get('/reg-admin', 'loginController@robinAdminReg');
Route::POST('/reg-admin/save', 'loginController@robinAdminSave');

Route::get('/login-admin', 'loginController@robinAdminLogin');
Route::POST('/login-admin/check', 'loginController@robinAdminCheck');


Route::get('/dashboard', 'dashboardController@index');

//////////////////////----------------- cash in type ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/dashboard/cash/in/type/add', 'cashInTypeController@index');
Route::post('/dashboard/cash/in/type/save', 'cashInTypeController@store');
Route::get('/dashboard/cash/in/type/manage', 'cashInTypeController@manage');
//////////////////////----------------- end of cash in type ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 



//////////////////////----------------- cash in ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/dashboard/cash/in/add', 'cashInController@index');
Route::post('/dashboard/cash/in/save', 'cashInController@store');
Route::get('/dashboard/cash/in/manage', 'cashInController@manage');
//////////////////////----------------- End of cash in ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 




//////////////////////----------------- cash in ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/dashboard/cash/in/add', 'cashInController@index');
Route::post('/dashboard/cash/in/save', 'cashInController@store');
Route::get('/dashboard/cash/in/manage', 'cashInController@manage');
//////////////////////----------------- End of cash in ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 




//////////////////////----------------- Exp Category--------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/dashboard/exp/category/add', 'exp\expCategoryController@index');
Route::post('/dashboard/exp/category/save', 'exp\expCategoryController@store');
Route::get('/dashboard/exp/category/manage', 'exp\expCategoryController@manage');
//////////////////////----------------- End of cash in ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 




//////////////////////----------------- Exp Item--------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/dashboard/exp/item/add', 'exp\expItemController@index');
Route::post('/dashboard/exp/item/save', 'exp\expItemController@store');
Route::get('/dashboard/exp/item/manage', 'exp\expItemController@manage');
//////////////////////----------------- End Exp Item ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 





//////////////////////----------------- Daily Exp --------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/dashboard/daily/exp/add', 'daily\dailyExpController@index');
Route::post('/get/item/name', 'daily\dailyExpController@getItemName');


Route::post('/dashboard/daily/exp/store', 'daily\dailyExpController@store');
Route::get('/dashboard/daily/exp/manage', 'daily\dailyExpController@manage');

Route::get('/dashboard/daily/exp/view/by/{date}', 'daily\dailyExpController@exp_view_by_date');

//////////////////////----------------- End Exp Item ---------------\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 



Route::get('/dashboard/show/balance', 'balanceController@index');



Route::get('/dashboard/report/per/day', 'balanceController@reportPerDay');
Route::post('/dashboard/get/per/day/date', 'balanceController@getDate');


Route::get('/logout', 'dashboardController@adminLogOut');