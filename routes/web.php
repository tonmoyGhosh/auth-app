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
    return view('auth.login');
});
    
Auth::routes(); 

Route::group(['middleware' => ['role:Administrative']], function () {
    Route::resource('/role', 'RoleManagementController');
    Route::get('/user-role-setting/{id}', 'UserController@userRoleForm')->name('user.role_form');
    Route::post('/set-user-role/{id}', 'UserController@setUserRole')->name('user.role_set');
});

Route::group(['middleware' => ['role:Administrative|Operator']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/users', 'UserController@index')->name('user.list');
});

Route::group(['middleware' => ['role:User']], function () {
    Route::get('/user-dashboard', 'UserController@userdashboard')->name('user.dashboard');
});

