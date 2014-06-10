<?php
/*
Plugin Name: PlugIn-Sample
Plugin URI: http://PlugIn-Template.com
Description: プラグインのテンプレートです。
Version: 1.0
Author: Masaki Naito
Author URI: http://PlugIn-Template.com
License: GPL2
*/
define('SAMPLE_PLUGINDIR' , dirname(__FILE__) . DIRECTORY_SEPARATOR);

include_once 'classes/all_plugin_setting.class.php';
include_once 'classes/file_autoload.class.php';
$loder = new Sample_PluginAutoload;
$loder->init( SAMPLE_PLUGINDIR );

//DB setting
new Sample_DBSetting;
new Sample_Admin_Dispache;
new Sample_Content_Dispache;