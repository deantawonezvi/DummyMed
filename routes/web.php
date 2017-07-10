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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/patients', 'ViewsController@viewPatients')->name('patient_home');
Route::get('/staff', 'ViewsController@viewStaff')->name('staff_home');
Route::get('/inventory', 'ViewsController@viewInventory')->name('inventory_home');
Route::get('/reports', 'ViewsController@viewReports')->name('reports_home');
Route::get('/settings', 'ViewsController@viewSettings')->name('settings_home');
Route::get('/clients', 'ViewsController@viewPayments')->name('payments_home');
