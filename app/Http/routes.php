<?php

/**
 * Route untuk Halaman Utama
 */
Route::get('/','HomeController@index');

/**
 * Route untuk authenticate user
 */
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/**
 * Route Untuk Register User
 */
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/**
 * Route Utama Aplikasi
 */
Route::resource('companies', 'CompanyController');
Route::resource('accounts', 'AccountController');

Route::get('beginning-balance','JournalHistoryController@beginningBalance');
Route::post('beginning-balance','JournalHistoryController@postBeginningBalance');

Route::controller('journals', 'JournalController');
/*
Route::resource('histories', 'JurnalHistoriController');
*/
