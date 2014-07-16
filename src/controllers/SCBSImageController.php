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

class SCBSImageController extends \BaseController {

	 protected $layout = 'Scbanner::banners.layouts.manage';

	
	
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
	
	
	

}