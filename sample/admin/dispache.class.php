<?php
/**
 * ŠÇ—‰æ–Ê‘¤
 **/

class Sample_Admin_Dispache extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		$this->init();
		$this->setting();
	}

	public function init() {
		new Sample_Admin_LoadAsset;
		new Sample_SettingPageMenu;
	}
	
	public function setting() {
		new Sample_AdminBarMenu;
		new Sample_NoUpdate;
		new Sample_hiddenHelpMenu;
		new Sample_CustomAdminFooter;
		new Sample_AddMenuAdminBar;
		new Sample_SettingDashboardWidgets;
		new Sample_SettingSideMenus;
		
		new Sample_SeoSetting;
	}
}
