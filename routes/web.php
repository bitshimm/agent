<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@Main')->name('main');

Route::get('/admin/dashboard/pages', 'NavPageController@Page')->name('pages');

Route::get('/admin/dashboard/pages/add', 'NavPageController@PageAdd')->name('pageAdd');

Route::post('/admin/dashboard/pages/add', 'NavPageController@PageAddSubmit')->name('pageAddSubmit');


Auth::routes();
