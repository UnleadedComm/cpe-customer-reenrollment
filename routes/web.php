<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/




Route::get('/', 'HomeController@Customer');




Auth::routes();

/* Proxy for Vue JS */
Route::get('/reenroll/utilities/{id}/legal_terms', 'HomeController@GetLegalTerms');
Route::get('/reenroll/products/{id}', 'HomeController@CustomerProducts');
Route::get('/reenroll/{zip}/{account_number}', 'HomeController@ValidateCustomer');
Route::get('/reenroll/{zip}/{account_number}/{meter_number}', 'HomeController@ValidateMeter');
Route::post('/reenroll/complete', 'HomeController@Enrollment'); 

//Route::get('/enroll/utilities/{id}/products/{zip}/{segment}', 'HomeController@ValidateUtility');



