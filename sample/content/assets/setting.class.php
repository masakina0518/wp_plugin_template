<?php

class Sample_Content_LoadAsset extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action("wp_enqueue_scripts", array($this, "load"));
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
			array('jquery'),
			$this->version,
			true
		);
	}
}
