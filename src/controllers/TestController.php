<?php
namespace Solvercircle\Scbanner;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class TestController extends BaseController {

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
	
	protected $layout = 'layouts.master';

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function test()
	{
		//die("This is test mehtod in TestController");
		$upload_path=SCBSSettings::get_setting(Config::get('Scbanner::config.key_interval'));
		die($upload_path);
		return View::make('Scbanner::hellopack');
	}
	
	public function showBanner()
	{
		//$banners = SCBSBanner::all();
		$banners = SCBSBanner::whereRaw('published=?',array(1))->get();
		$this->layout->content = View::make('scbs_banners.banner')
				->with('banners', $banners);
		//return View::make('scbs_banners.banner');
	}

}