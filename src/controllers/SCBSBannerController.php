<?php

namespace Solvercircle\Scbanner;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

// import the Intervention Image Class
use Intervention\Image\Image;
use Intervention\imagecache;

class SCBSBannerController extends \BaseController {

	 protected $layout = 'Scbanner::banners.layouts.manage';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the banners
		$banners = SCBSBanner::all();

		// load the view and pass the banners
		//return View::make('scbs_banners.index')
			//->with('banners', $banners);
		$this->layout->content = View::make('Scbanner::banners.index')
			->with('banners', $banners);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/scbs_banners/create.blade.php)
		//return View::make('scbs_banners.create');
		
		$this->layout->content = View::make('Scbanner::banners.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'image'      => 'required|image'			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('banners/create')
				->withErrors($validator)
				->withInput(Input::except('image'));
		} else {
			// store
			$upload_path=SCBSSettings::get_setting(Config::get('Scbanner::config.key_upload_path'));
			$destinationPath=$upload_path;
			$file=Input::file('image');
			$filename=uniqid().'_'.$file->getClientOriginalName();				
			$file->move($destinationPath,$filename);
			$banner = new SCBSBanner;
			$banner->name       = Input::get('name');
			$banner->image_file_name      = $filename;
			$banner->published       = Input::get('published');
			$banner->save();

			// redirect
			Session::flash('message', 'Successfully created banner!');
			return Redirect::to('banners');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the banner
		$banner = SCBSBanner::find($id);

		// show the view and pass the banner to it
		//return View::make('scbs_banners.show')
			//->with('banner', $banner);
		
		$this->layout->content = View::make('Scbanner::banners.show')
			->with('banner', $banner);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the banner
		$banner = SCBSBanner::find($id);

		// show the edit form and pass the banner
		//return View::make('scbs_banners.edit')
			//->with('banner', $banner);
		
		$this->layout->content = View::make('Scbanner::banners.edit')
			->with('banner', $banner);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'image'      => 'image'			
		);
		$validator = Validator::make(Input::all(), $rules);

		// validating
		if ($validator->fails()) {
			return Redirect::to('banners/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('image'));
		} else {
			// store
			$upload_path=SCBSSettings::get_setting(Config::get('Scbanner::config.key_upload_path'));
			$banner = SCBSBanner::find($id);
			if(Input::hasFile('image'))
			{
				$destinationPath=$upload_path;
				$file=Input::file('image');
				$filename=uniqid().'_'.$file->getClientOriginalName();				
				$file->move($destinationPath,$filename);
				File::delete($upload_path.$banner->image_file_name);
				$banner->image_file_name      = $filename;
			}
			
			$banner->name       = Input::get('name');			
			$banner->published       = Input::get('published');
			$banner->save();

			// redirect
			Session::flash('message', 'Successfully updated banner!');
			return Redirect::to('banners');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$upload_path=SCBSSettings::get_setting(Config::get('Scbanner::config.key_upload_path'));
		$banner = SCBSBanner::find($id);
		File::delete($upload_path.$banner->image_file_name);
		$banner->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the banner!');
		return Redirect::to('banners');
	}
	
	
	public function image($width, $filename = null)
	{	
		$upload_path=SCBSSettings::get_setting(Config::get('Scbanner::config.key_upload_path'));
		$image_cache_enabled=(SCBSSettings::get_setting(Config::get('Scbanner::config.key_enable_image_cache'))=='1')?true:false;
		//$path =Config::get('scbs_config.upload_path'). $filename;
		$path =$upload_path. $filename;
		

		$imgobj = Image::cache(function($image) use($width, $path)
		{
			if( ! is_file($path))
			{
				$color = '#ddd';
				$image->resize((int) $width, null, true);
				$image->fill('#fff');
				$image->line($color, 0, 0, $width, $width);
				$image->line($color, $width, 0, 0, $width);
				$image->rectangle($color, 0, 0, ($width -1), ($width -1), false);
			}
			else
			{
				$image = $image->make($path)->resize((int) $width, null, true);
			}

			return $image;

		}, $image_cache_enabled, true);

		
			
		return Response::make($imgobj, 200)
			->header('Content-Type', 'image/jpeg');
			
		
	}
	
	
	public function settings()
	{
	//die("Hello, this is setting method.");
		// get all the banners
		$all_settings = SCBSSettings::all();
		$settings=new \StdClass();
		foreach($all_settings as $st)
		{
			$settings->{$st->key}=$st->value;
		}
		$this->layout->content = View::make('Scbanner::banners.settings')
				->with('settings', $settings);
			//->with('banners', $banners);
	}
	
	public function updateSettings()
	{	
	//die(var_dump(Input::get(Config::get('scbs_config.key_enable_image_cache'))));
		$setting = SCBSSettings::firstOrNew(array('key' => Config::get('Scbanner::config.key_upload_path')));
		//die(print_r($setting));
		$setting->value=Input::get(Config::get('Scbanner::config.key_upload_path'));
		$setting->save();
		
		$setting = SCBSSettings::firstOrNew(array('key' => Config::get('Scbanner::config.key_interval')));		
		$setting->value=Input::get(Config::get('Scbanner::config.key_interval'));
		$setting->save();
		
		$setting = SCBSSettings::firstOrNew(array('key' => Config::get('Scbanner::config.key_enable_image_cache')));		
		$setting->value=Input::get(Config::get('Scbanner::config.key_enable_image_cache'));
		$setting->save();
		
		$setting = SCBSSettings::firstOrNew(array('key' => Config::get('Scbanner::config.key_banner_width')));		
		$setting->value=Input::get(Config::get('Scbanner::config.key_banner_width'));
		$setting->save();
		
		return Redirect::to('banners');
	}

}