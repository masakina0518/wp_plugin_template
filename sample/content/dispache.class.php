<?php
/**
 * ƒTƒCƒg‘¤
 **/

class Sample_Content_Dispache extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		$this->init();
		$this->setting();
	}

	public function init() {
		// Load Asset
		new Sample_Content_LoadAsset;
	}

	public function setting() {

	}
}
