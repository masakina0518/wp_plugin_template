<?php
class Sample_SettingDashboardWidgets extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action( 'wp_dashboard_setup', array($this, 'init'));
	}

	public function init () {
		$this->hidden();
	}

	public function hidden() {
		 if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
			 global $wp_meta_boxes;
			 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
			 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
			 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
			 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
			 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
			 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
			 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
			 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
		 }
	}
}