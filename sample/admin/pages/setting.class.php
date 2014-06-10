<?php


class Sample_SettingPageMenu extends Sample_PluginSetting {

	public $page_list		= array('SamplePage_LoadPage', 'SamplePage2_LoadPage');
	public $custom_menu_list= array();

	public function __construct(){
		parent::__construct();
		add_action("admin_menu", array($this, "setting"));
	}

	public function setting() {
		//page 設定
		foreach($this->page_list as $key => $page_class_name) {
			$page_class = new $page_class_name;
			switch ($page_class->parent_menu) {
				//設定
				case 'option' :
					add_options_page($page_class->page_title, $page_class->menu_title, $page_class->page_level , $page_class->page_url , array($page_class, 'init'));
					break;

				//ツール
				case 'management' :
					add_management_page($page_class->page_title, $page_class->menu_title, $page_class->page_level , $page_class->page_url , array($page_class, 'init'));
					break;

				//その他・指定無しの場合
				case '' :
				default :
					if(in_array($page_class->parent_menu, $this->custom_menu_list)) {
						add_submenu_page($page_class->parent_menu, $page_class->page_title, $page_class->menu_title, $page_class->page_level , $page_class->page_url , array($page_class, 'init'));
					} else {
						add_menu_page($page_class->page_title, $page_class->menu_title, $page_class->page_level , $page_class->page_url , array($page_class, 'init'));
						array_push($this->custom_menu_list, $page_class->page_url);
					}
					break;
			}
		}
	}
}



