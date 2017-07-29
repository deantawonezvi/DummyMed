<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * PATIENTS API
 * */
Route::post('/patient/add', 'PatientController@addPatient');
Route::post('/patient/update', 'PatientController@updatePatient');
Route::post('/patient/delete', 'PatientController@deletePatient');
Route::get('/patient/get', 'PatientController@getPatient');


/*
 * INVENTORY API
 * */
Route::post('/inventory/add', 'InventoryController@addInventory');
Route::post('/inventory/update', 'InventoryController@updateInventory');
Route::post('/inventory/delete', 'InventoryController@deleteInventory');
Route::get('/inventory/get', 'InventoryController@getInventory');
