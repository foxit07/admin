<?php


Route::get('ajax/users', 'Ajax\UserController@index');
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');

