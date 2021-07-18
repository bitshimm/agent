<?php

Route::get('/', function () {
    return view('layouts/app');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();