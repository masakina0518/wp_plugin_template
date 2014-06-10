<?php

class Sample_Admin_LoadAsset extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action("admin_head", array($this, "load"));
	}

	public function load() {
		//CSS load
		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url(__FILE__)."css/default.css",
			array(),
			$this->version,
			'all'
		);

		//JS load
		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url(__FILE__)."js/default.js",
			array(),
			$this->version,
			true
		);
	}
}
