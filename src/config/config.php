<?php

/*return array(
    'key_upload_path' => 'upload_path',
    'key_interval' => 'interval',
	'key_enable_image_cache' => 'enable_image_cache',
	
	'default_upload_path'=>'',
	'default_interval'=>100,
	'default_enable_image_cache'=>true
);*/

$arr_sbcs_conf=array(
    'key_upload_path' => 'upload_path',
    'key_interval' => 'interval',
	'key_enable_image_cache' => 'enable_image_cache',
	'key_banner_width'=>'banner_width'
);
$arr_sbcs_conf['default_'.$arr_sbcs_conf['key_upload_path']]='';
$arr_sbcs_conf['default_'.$arr_sbcs_conf['key_interval']]=5;
$arr_sbcs_conf['default_'.$arr_sbcs_conf['key_enable_image_cache']]=true;
$arr_sbcs_conf['default_'.$arr_sbcs_conf['key_banner_width']]=1140;

return $arr_sbcs_conf;