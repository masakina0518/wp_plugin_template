<?php
/**
 * @name sample_page_setting
 */
class SamplePage_LoadPage extends Sample_PluginSetting {

	public $page_name	= 'samplepage';
	public $menu_title	= 'サンプルページ';
	public $page_title	= 'サンプルページです';
	public $page_level	= 'level_8';
	public $page_url	= 'samplepage';
	public $parent_menu = '';

	public function __construct(){
		parent::__construct();
	}

	public function init() {
		//CSS load
		wp_enqueue_style(
			$this->plugin_name . '-' . $this->page_name,
			plugin_dir_url(__FILE__)."css/default.css",
			array(),
			$this->version,
			'all'
		);

		//JS load
		wp_enqueue_script(
			$this->plugin_name . '-' . $this->page_name,
			plugin_dir_url(__FILE__)."js/default.js",
			array(),
			$this->version,
			true
		);
		
		$this->load_view();
	}

	public function load_view($vars = array(), $err = array()) {
		extract($vars, EXTR_PREFIX_ALL, 'out');
		extract($err,  EXTR_PREFIX_ALL, 'error');
		include_once 'views/index.tpl';
	}
}
