<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@Main')->name('main');


Route::get('/admin/dashboard/pages', 'NavPageController@Page')->name('pages');

Route::get('/admin/dashboard/pages/add', 'NavPageController@PageAdd')->name('pageAdd');

Route::post('/admin/dashboard/pages/add', 'NavPageController@PageAddSubmit')->name('pageAddSubmit');

Route::get('/admin/dashboard/pages/edit/{id}', 'NavPageController@PageEdit')->name('pageEdit');

Route::post('/admin/dashboard/pages/edit/{id}', 'NavPageController@PageEditSubmit')->name('pageEditSubmit');

Route::get('/admin/data/page/delete/{id}', 'NavPageController@PageDeleteSubmit')->name('PageDeleteSubmit');


Route::get('/admin/dashboard/gallery', 'GalleryController@Gallery')->name('gallery');

Route::get('/admin/dashboard/gallery/add', 'GalleryController@GalleryAdd')->name('galleryAdd');

Route::post('/admin/dashboard/gallery/add', 'GalleryController@GalleryAddSubmit')->name('galleryAddSubmit');

Route::get('/admin/dashboard/gallery/edit/{id}', 'GalleryController@GalleryEdit')->name('galleryEdit');

Route::post('/admin/dashboard/gallery/edit/{id}', 'GalleryController@GalleryEditSubmit')->name('galleryEditSubmit');

Route::get('/admin/data/gallery/delete/{id}', 'GalleryController@GalleryDeleteSubmit')->name('galleryDeleteSubmit');

Auth::routes();
