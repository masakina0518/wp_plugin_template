<?php
class Sample_SettingSideMenus extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action( 'admin_menu', array($this, 'init'));
	}

	public function init () {
		$this->hidden();
	}

	public function hidden() {
		if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
			global $menu;
			remove_menu_page('wpcf7'); //Contact Form 7
			unset($menu[2]); // ダッシュボード
			unset($menu[4]); // メニューの線1
			unset($menu[5]); // 投稿
			unset($menu[10]); // メディア
			unset($menu[15]); // リンク
			unset($menu[20]); // ページ
			unset($menu[25]); // コメント
			unset($menu[59]); // メニューの線2
			unset($menu[60]); // テーマ
			unset($menu[65]); // プラグイン
			unset($menu[70]); // プロフィール
			unset($menu[75]); // ツール
			unset($menu[80]); // 設定
			unset($menu[90]); // メニューの線3
		}
	}
}