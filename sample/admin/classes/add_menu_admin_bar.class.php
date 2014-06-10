<?php
class Sample_AddMenuAdminBar extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action( 'wp_before_admin_bar_render', array($this, 'init'));
	}

	public function init () {
		global $wp_admin_bar;
		$wp_admin_bar->add_menu(array(
			'id' => 'new_item_in_admin_bar',
			'title' => __('ログアウト'),
			'href' => wp_logout_url()
		));
	}
}