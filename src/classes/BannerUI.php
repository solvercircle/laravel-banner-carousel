<?php
namespace Solvercircle\Scbanner;

class BannerUI {
	
	public static function display()
	{		
		$banners = SCBSBanner::whereRaw('published=?',array(1))->get();
		return \View::make('Scbanner::banners.bannerui')
			->with('banners', $banners);
	}

	
}