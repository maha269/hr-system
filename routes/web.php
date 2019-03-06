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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'AttendanceController@index')->name('home');
Route::get('/create_attendance', 'AttendanceController@create')->name('create_attendance');
Route::get('/edit_attendance/{id}', 'AttendanceController@edit')->name('edit_attendance');
Route::post('/store_attendance', 'AttendanceController@store')->name('store_attendance');
Route::post('/update_attendance/{id}', 'AttendanceController@update');
Route::get("/delete_attendance/{id}",'AttendanceController@destroy')->name('delete_attendance');
Route::post("/display_user_attendance",'AttendanceController@display_user_attendance');

Route::post("/display_report",'AttendanceController@display_report');
Route::get("/show_attendance_report",'AttendanceController@show_attendance_report');

Route::get('/show_user_attendance/{id}', 'AttendanceController@showUserAttendance');
//Route::resource('attendance', 'AttendanceController');
