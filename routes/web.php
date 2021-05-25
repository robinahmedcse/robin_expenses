<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within 
0a group which
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


// -------------------------------------cash in type-----------------------------------------------

Route::get('/dashboard/cash/in/type/add', 'cashInTypeController@index');
Route::post('/dashboard/cash/in/type/save', 'cashInTypeController@store');
Route::get('/dashboard/cash/in/type/manage', 'cashInTypeController@manage');

Route::get('/dashboard/cash/in/type/edit/{id}', 'cashInTypeController@edit');
Route::post('/dashboard/cash/in/type/update', 'cashInTypeController@update');
Route::get('/dashboard/cash/in/type/delete/{id}', 'cashInTypeController@delete');

// -------------------------------------end of cash in type ----------------------------------------
 

// -------------------------------------cash in-----------------------------------------------
Route::get('/dashboard/cash/in/add', 'cashInController@index');
Route::post('/dashboard/cash/in/save', 'cashInController@store');
Route::get('/dashboard/cash/in/manage', 'cashInController@manage');

Route::get('/dashboard/cash/in/edit/cash_in/{id}/type/{type_id}', 'cashInController@edit');
Route::post('/dashboard/cash/in/update', 'cashInController@update');
// -------------------------------------End of cash in ---------------------------------------


// -------------------------------------person-----------------------------------------------
Route::get('/dashboard/loan/person/add', 'personController@person_add_form');
Route::post('/dashboard/loan/person/store', 'personController@person_save');

Route::get('/dashboard/loan/person/manage', 'personController@person_manage');

Route::get('/dashboard/loan/person/edit/{id}', 'personController@edit_person');
Route::post('/dashboard/loan/person/update', 'personController@update_person');
Route::get('/dashboard/loan/person/delete/{id}', 'personController@delete_person');
 
// -------------------------------------End person ---------------------------------------


// -------------------------------------Loan in-------------------------------------------
Route::get('/dashboard/loan/in/add', 'loanController@loan_in_index');
Route::post('/dashboard/loan/in/save', 'loanController@loan_in_store');
Route::get('/dashboard/loan/in/manage', 'loanController@loan_in_manage');

Route::get('/dashboard/loan/in/edit/{loan_id}', 'loanController@loan_in_edit');
Route::post('/dashboard/loan/in/update', 'loanController@loan_in_update');

Route::get('/dashboard/loan/status/change/to/pay/{loan_id}', 'loanController@loan_in_paid');
Route::get('/dashboard/loan/status/change/to/due/{loan_id}', 'loanController@loan_in_unpaid');

// -------------------------------------End Loan in---------------------------------------



 

 // -------------------------------------Exp Category------------------------------------------
Route::get('/dashboard/exp/category/add', 'exp\expCategoryController@index');
Route::post('/dashboard/exp/category/save', 'exp\expCategoryController@store');
Route::get('/dashboard/exp/category/manage', 'exp\expCategoryController@manage');
// -------------------------------------End Exp Category---------------------------------------




 // -------------------------------------Exp Item----------------------------------------------
Route::get('/dashboard/exp/item/add', 'exp\expItemController@index');
Route::get('/dashboard/exp/item/add/all/item/name', 'exp\expItemController@getAllItemName');
Route::post('/dashboard/exp/item/save', 'exp\expItemController@store');
Route::get('/dashboard/exp/item/manage', 'exp\expItemController@manage');
// -------------------------------------End Exp Item-------------------------------------------



 // -------------------------------------Daily Exp----------------------------------------------
Route::get('/dashboard/daily/exp/add', 'daily\dailyExpController@index');
Route::post('/get/item/name', 'daily\dailyExpController@getItemName');

Route::post('/dashboard/daily/exp/ref/store', 'daily\dailyExpController@ref_check');

Route::post('/dashboard/daily/exp/store', 'daily\dailyExpController@exp_store');

Route::get('/dashboard/daily/exp/manage', 'daily\dailyExpController@exp_manage');
Route::get('/dashboard/daily/exp/delete/by/{date}', 'daily\dailyExpController@exp_delete_by_date');


Route::get('/dashboard/daily/exp/view/by/{date}', 'daily\dailyExpController@exp_view_by_date');
Route::post('/dashboard/daily/view/edit/by/id', 'daily\dailyExpController@exp_view_edit_by_id');
Route::post('/dashboard/daily/view/update/by/id', 'daily\dailyExpController@exp_view_update_by_id');

// -------------------------------------End Daily Exp----------------------------------------------
 


// -------------------------------------Blance----------------------------------------------

Route::get('/dashboard/show/balance', 'balanceController@index');

// -------------------------------------End Blance------------------------------------------
 


// -------------------------------------Report----------------------------------------------


// -------------------------------------Cash In Report----------------------------------------------

Route::get('/dashboard/report/cash/in/date/waise', 'supper_admin\report\cashInReportController@cash_in_report_form');
Route::post('/dashboard/report/cash/in/date/waise/search', 'supper_admin\report\cashInReportController@cash_in_report_search');
//  ---------
Route::get('/dashboard/report/cash/in/category/waise', 'supper_admin\report\cashInReportController@category_wise_cash_in_report_form');

Route::post('/dashboard/report/cash/in/category/date/waise/search', 'supper_admin\report\cashInReportController@Category_wise_report_search_with_date');

Route::post('/dashboard/report/cash/in/category/waise/search', 'supper_admin\report\cashInReportController@category_wise_report_search_without_date');




//  ---------
// Route::get('/dashboard/report/cash/in/loan/waise', 'supper_admin\report\cashInReportController@loan_wise_cash_in_report_form');
// Route::post('/dashboard/report/cash/in/loan/waise/search', 'supper_admin\report\cashInReportController@loan_wise_cash_in_report_search');

// -------------------------------------End  Cash In Report----------------------------------------------
 


Route::get('/logout', 'dashboardController@adminLogOut');