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
Route::resource('/assets','AssetMasterController');
Route::resource('/category','CategoryController');
Route::resource('/consumables','ConsumableController');
Route::resource('/issue','ConsumableIssueController');
Route::resource('/invoicedetails','InvoiceDetailsController');
Route::resource('/items','ItemMasterController');
Route::resource('/relation','ItemConRelationController');
Route::resource('/invoice','InvoiceEntryController');
Route::resource('/section','SectionController');
Route::resource('/supplier','SupplierController');
Route::resource('/issues','AssetIssueController');
Route::resource('/request','RequestsController');
Route::resource("/approve",'approve');

Route::get('request/approve/{id}','approve@approve');
Route::get('request/issue/{id}','approve@issue');
Route::get('request/reject/{id}','approve@reject');
Route::get('/acategory/{id}','ItemConRelationController@acategory');



Route::get('/acon','ajax@consumable');
Route::get('/ahard','ajax@hardware');
Route::post('/assets/add','AssetMasterController@add');
Route::get('/assets/receive/{id}','AssetMasterController@addview');

Route::get('/relation/add','ItemConRelationController@add');
Route::post('/aasset','AssetIssueController@assets');
Route::post('/asection','SectionController@section');

