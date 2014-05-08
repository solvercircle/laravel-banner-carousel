<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//SC Banner Routes
Route::get('/banner-test', function()
{
	return View::make('Scbanner::hellopack');
	//echo "Hello, how are you?";
});

/*Route::get('/banner-test', 'HomeController@showBanner');


Route::get('/banners/settings', 'SCBSBannerController@settings');
Route::post('/banners/update-settings', 'SCBSBannerController@updateSettings');
Route::resource('banners', 'SCBSBannerController');


Route::get('img/{width}/{filename?}', array(
	'as'   => 'image.view',
	'uses' => 'SCBSBannerController@image'
))->where('width', '[0-9]+');
*/


//Route::get('/test/test', 'Solvercircle\Scbanner\TestController@test');
Route::get('/banner-test', 'Solvercircle\Scbanner\HomeController@showBanner');

Route::get('/banners/settings', 'Solvercircle\Scbanner\SCBSBannerController@settings');
Route::post('/banners/update-settings', 'Solvercircle\Scbanner\SCBSBannerController@updateSettings');
Route::resource('banners', 'Solvercircle\Scbanner\SCBSBannerController');


Route::get('img/{width}/{filename?}', array(
	'as'   => 'image.view',
	'uses' => 'Solvercircle\Scbanner\SCBSBannerController@image'
))->where('width', '[0-9]+');