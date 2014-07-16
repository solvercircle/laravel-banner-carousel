<?php
namespace Solvercircle\Scbanner;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;


class HomeController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	protected $layout = 'Scbanner::banners.layouts.manage';

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function showBanner()
	{
		//die(SCBSSettings::get_setting(Config::get('Scbanner::config.key_banner_width')));
		//$banners = SCBSBanner::all();
		//$banners = SCBSBanner::whereRaw('published=?',array(1))->get();
		$this->layout->content = View::make('Scbanner::banners.banner');
				//->with('banners', $banners);
		
	}

}