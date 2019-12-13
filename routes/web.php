<?php



Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');

Route::get('ajax/users', 'Ajax\UserController@index');
Route::get('ajax/roles', 'Ajax\RoleController@index');
Route::get('ajax/permissions', 'Ajax\PermissionController@index');