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

Route::get('/admin/data/gallery/delete/{id}', 'GalleryController@GalleryDeleteSubmit')->name('galleryDeleteSubmit');


Route::get('/admin/dashboard/contacts', 'ContactController@Contacts')->name('contacts');

Route::get('/admin/dashboard/contacts/add', 'ContactController@ContactAdd')->name('contactAdd');

Route::post('/admin/dashboard/contacts/add', 'ContactController@ContactAddSubmit')->name('contactAddSubmit');

Route::get('/admin/dashboard/contacts/edit/{id}', 'ContactController@ContactEdit')->name('contactEdit');

Route::post('/admin/dashboard/contacts/edit/{id}', 'ContactController@ContactEditSubmit')->name('contactEditSubmit');

Route::get('/admin/data/contacts/delete/{id}', 'ContactController@ContactDeleteSubmit')->name('contactDeleteSubmit');


Route::get('/admin/dashboard/news', 'NewsController@News')->name('news');

Route::get('/admin/dashboard/news/add', 'NewsController@NewsAdd')->name('newsAdd');

Route::post('/admin/dashboard/news/add', 'NewsController@NewsAddSubmit')->name('newsAddSubmit');

Route::get('/admin/dashboard/news/edit/{id}', 'NewsController@NewsEdit')->name('newsEdit');

Route::post('/admin/dashboard/news/edit/{id}', 'NewsController@NewsEditSubmit')->name('newsEditSubmit');

Route::get('/admin/data/news/delete/{id}', 'NewsController@NewsDeleteSubmit')->name('newsDeleteSubmit');


Auth::routes();
