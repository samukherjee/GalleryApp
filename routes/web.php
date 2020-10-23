<?php

use Illuminate\Support\Facades\Route;

// Routes For Upload Debug Process
// Route::get('/uploadebug', function(){return view('debug');});
// Route::post('/uploadebug', 'UploadController@store');


Auth::routes(['verify' => true]);


Route::get(	  '/latest', 					'WallpaperController@latest')->name('latest');
Route::get(	  '/random', 					'WallpaperController@random')->name('random');
Route::get(	  '/wallpaper/{wallpaper}', 	'WallpaperController@show');


Route::get(	  '/upload', 					'UploadController@create');
Route::post(  '/upload', 					'UploadController@store');


Route::get(	  '/profile/{user}', 			'UserController@general');
Route::get(	  '/profile/{user}/uploads', 	'UserController@upload');
Route::get(	  '/profile/{user}/favorites',	'UserController@favorite');


Route::get(	  '/setting/general', 			'SettingController@showGeneral');
Route::patch( '/setting/general', 			'SettingController@updateGeneral');
Route::get(	  '/setting/avatar-and-cover',  'SettingController@showAvatar');
Route::patch( '/setting/avatar-and-cover',  'SettingController@updateAvatar');


Route::get(	  '/tags', 						'TagController@index');
Route::get(	  '/untag', 					'TagController@create');
Route::post(  '/tag/{wallpaperId}', 		'TagController@store');
Route::get(	  '/tag/{tag}', 				'TagController@show');
Route::delete('/tagdetach/{wallpaperId}', 	'TagController@tagDetachFromWallpaper');
// Route::get('/tag/{tag}', 				'TagController@show');


// Route::get('/search', 					'SearchController@index');
Route::get(   'search', 					'AutoCompleteController@index');
Route::get(   'autocomplete', 				'AutoCompleteController@search');
