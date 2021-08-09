<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@Main')->name('main');


Route::get('/admin/dashboard/pages', 'NavPageController@Page')->name('pages')->middleware('auth');

Route::get('/admin/dashboard/pages/add', 'NavPageController@PageAdd')->name('pageAdd')->middleware('auth');

Route::post('/admin/dashboard/pages/add', 'NavPageController@PageAddSubmit')->name('pageAddSubmit')->middleware('auth');

Route::get('/admin/dashboard/pages/edit/{id}', 'NavPageController@PageEdit')->name('pageEdit')->middleware('auth');

Route::post('/admin/dashboard/pages/edit/{id}', 'NavPageController@PageEditSubmit')->name('pageEditSubmit')->middleware('auth');

Route::get('/admin/data/page/delete/{id}', 'NavPageController@PageDeleteSubmit')->name('PageDeleteSubmit')->middleware('auth');


Route::get('/admin/dashboard/gallery', 'GalleryController@Gallery')->name('gallery')->middleware('auth');

Route::get('/admin/dashboard/gallery/add', 'GalleryController@GalleryAdd')->name('galleryAdd')->middleware('auth');

Route::post('/admin/dashboard/gallery/add', 'GalleryController@GalleryAddSubmit')->name('galleryAddSubmit')->middleware('auth');

Route::get('/admin/data/gallery/delete/{id}', 'GalleryController@GalleryDeleteSubmit')->name('galleryDeleteSubmit')->middleware('auth');


Route::get('/admin/dashboard/contacts', 'ContactController@Contacts')->name('contacts')->middleware('auth');

Route::get('/admin/dashboard/contacts/add', 'ContactController@ContactAdd')->name('contactAdd')->middleware('auth');

Route::post('/admin/dashboard/contacts/add', 'ContactController@ContactAddSubmit')->name('contactAddSubmit')->middleware('auth');

Route::get('/admin/dashboard/contacts/edit/{id}', 'ContactController@ContactEdit')->name('contactEdit')->middleware('auth');

Route::post('/admin/dashboard/contacts/edit/{id}', 'ContactController@ContactEditSubmit')->name('contactEditSubmit')->middleware('auth');

Route::get('/admin/data/contacts/delete/{id}', 'ContactController@ContactDeleteSubmit')->name('contactDeleteSubmit')->middleware('auth');


Route::get('/admin/dashboard/news', 'NewsController@News')->name('news')->middleware('auth');

Route::get('/admin/dashboard/news/add', 'NewsController@NewsAdd')->name('newsAdd')->middleware('auth');

Route::post('/admin/dashboard/news/add', 'NewsController@NewsAddSubmit')->name('newsAddSubmit')->middleware('auth');

Route::get('/admin/dashboard/news/edit/{id}', 'NewsController@NewsEdit')->name('newsEdit')->middleware('auth');

Route::post('/admin/dashboard/news/edit/{id}', 'NewsController@NewsEditSubmit')->name('newsEditSubmit')->middleware('auth');

Route::get('/admin/data/news/delete/{id}', 'NewsController@NewsDeleteSubmit')->name('newsDeleteSubmit')->middleware('auth');


Route::get('/admin/dashboard/social', 'SocialController@Social')->name('social')->middleware('auth');

Route::get('/admin/dashboard/social/add', 'SocialController@SocialAdd')->name('socialAdd')->middleware('auth');

Route::post('/admin/dashboard/social/add', 'SocialController@SocialAddSubmit')->name('socialAddSubmit')->middleware('auth');

Route::get('/admin/dashboard/social/edit/{id}', 'SocialController@SocialEdit')->name('socialEdit')->middleware('auth');

Route::post('/admin/dashboard/social/edit/{id}', 'SocialController@SocialEditSubmit')->name('socialEditSubmit')->middleware('auth');

Route::get('/admin/data/social/delete/{id}', 'SocialController@SocialDeleteSubmit')->name('socialDeleteSubmit')->middleware('auth');


Route::get('/admin/dashboard/aboutUs', 'AboutUsController@AboutUs')->name('aboutUs')->middleware('auth');

Route::get('/admin/dashboard/aboutUs/add', 'AboutUsController@AboutUsAdd')->name('aboutUsAdd')->middleware('auth');

Route::post('/admin/dashboard/aboutUs/add', 'AboutUsController@AboutUsAddSubmit')->name('aboutUsAddSubmit')->middleware('auth');

Route::get('/admin/dashboard/aboutUs/edit/{id}', 'AboutUsController@AboutUsEdit')->name('aboutUsEdit')->middleware('auth');

Route::post('/admin/dashboard/aboutUs/edit/{id}', 'AboutUsController@AboutUsEditSubmit')->name('aboutUsEditSubmit')->middleware('auth');

Route::get('/admin/data/aboutUs/delete/{id}', 'AboutUsController@AboutUsDeleteSubmit')->name('aboutUsDeleteSubmit')->middleware('auth');


Route::get('/admin/dashboard/logotype', 'LogotypeController@Logotype')->name('logotype')->middleware('auth');

Route::post('/admin/dashboard/logotype/add', 'LogotypeController@LogotypeAddSubmit')->name('logotypeAddSubmit')->middleware('auth');

Route::get('/admin/data/logotype/delete/{id}', 'LogotypeController@LogotypeDeleteSubmit')->name('logotypeDeleteSubmit')->middleware('auth');

Auth::routes();
