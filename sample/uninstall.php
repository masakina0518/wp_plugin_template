<?php
include_once 'classes/all_plugin_setting.class.php';
include_once 'classes/db_setting.class.php';

if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) exit();
// Drop Table
$db_setting = new Sample_DBSetting;
$db_setting->uninstall();