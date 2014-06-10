<?php
class Sample_AdminBarMenu extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action( 'admin_bar_menu', array($this, 'init'), 70 );
	}

	public function init ( $wp_admin_bar ) {
		$wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressシンボルマーク
		$wp_admin_bar->remove_menu('my-account'); // マイアカウント
	}
}