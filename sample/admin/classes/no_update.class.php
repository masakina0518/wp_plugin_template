<?php
class Sample_NoUpdate extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		$this->init();
	}

	public function init () {
		 // バージョン更新を非表示にする
		add_filter('pre_site_transient_update_core', '__return_zero');
		// APIによるバージョンチェックの通信をさせない
		remove_action('wp_version_check', 'wp_version_check');
		remove_action('admin_init', '_maybe_update_core');
	}
}