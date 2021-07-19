<?php
use Illuminate\Support\Facades\Route;


Route::post('/', 'MainController@main')->name('main');

Route::get('/admin', 'AdminController@admin')->name('admin');

Auth::routes();