<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/register', function(){
    return view('welcome');
});
Route::get('/register/{id}','Auth\LoginController@custom')->name('custom.login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('create_profile', function (){
    return view('create_profile');
});
Route::get('/new_shipment', 'NewShipController@details')->name('new_shipment');

Route::get('/new_ship/sevice', 'NewShipController@sevice');
Route::get('/new_ship/date_time', 'NewShipController@date_time');
Route::get('/new_ship/summary_pay', 'NewShipController@summary_pay');
Route::post('/cal_price_express', 'CalController@express')->name('express_cal');
Route::post('/cal_price_full_truck', 'CalController@full_truck')->name('full_truck');
Route::post('/cal_price_part_load', 'CalController@part_load')->name('part_load');
Route::post('/cal_price_full_specify', 'CalController@full_specify')->name('full_specify');
Route::post('/get_time','NewShipController@get_time');
Route::post('/cal_pick_up_date_express', 'CalController@pick_up_express');
Route::post('/cal_pick_up_date_full_truck', 'CalController@pick_up_truck');
Route::post('/cal_pick_up_date_full_truck_specify', 'CalController@pick_up_truck_specify');
Route::post('/cal_pick_up_date_part_load', 'CalController@pick_up_part');

Route::post('/cal_time_express', 'CalController@cal_time_express');
Route::post('/cal_time_full_truck', 'CalController@cal_time_full_truck');
Route::post('/cal_time_part', 'CalController@cal_time_part');
Route::post('/cal_time_truck_specify', 'CalController@cal_time_truck_specify');

Route::post('/register-shipment', 'CalController@create_db')->name('register_shipment');

Route::get('/active_shipment', 'ShipmentController@all')->name('active_shipment');
// Route::get('create_profile', function (){
//     return view('layouts.apply   ');
// });
