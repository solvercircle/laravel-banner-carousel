<?php
namespace Solvercircle\Scbanner;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class SCBSSettings extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'scbs_settings';
	protected $primaryKey='key';
	protected $fillable = array('key', 'value');
	
	public static function get_setting($key)
	{
		//$setting = SCBSSettings::where('key', $key)->get()->first();
		$setting=SCBSSettings::firstOrNew(array('key' =>$key));
		if(is_null($setting->value) || trim($setting->value)=='')
		{
		//die(var_dump(Config::get('scbs_config.default_'.$key)));
			$setting->value=Config::get('Scbanner::config.default_'.$key);
		}
		return $setting->value;
	}

	
}