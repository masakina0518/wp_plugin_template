<?php
/**
 * @name db_setting
 */

class Sample_DBSetting extends Sample_PluginSetting {
	public $table_name = '';

	public function __construct(){
		parent::__construct();

	    global $wpdb;
		// 接頭辞（$wpdb--->prefix）を付けてテーブル名を設定
	   	$this->table_name = $wpdb->prefix . $this->table;
		//有効時
	    if(function_exists('register_activation_hook')) {
			register_activation_hook (SAMPLE_PLUGINDIR . 'index.php', array($this , 'activate'));
	    }
	    //削除時
	    if(function_exists('register_uninstall_hook')) {
    		//register_uninstall_hook(SAMPLE_PLUGINDIR . 'index.php', array($this , 'uninstall'));
		}
		//無効化
		if(function_exists('register_deactivation_hook')) {
    		register_deactivation_hook(SAMPLE_PLUGINDIR . 'index.php', array($this , 'deactivation'));
		}
	}

	public function sql() {
		$sql = "CREATE TABLE " . $this->table_name . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					created datetime DEFAULT NULL,
					modified datetime DEFAULT NULL,
					title tinytext NOT NULL,
					contents text NOT NULL,
					UNIQUE KEY id (id)
				);";
		return $sql;
	}

	public function activate(){
		global $wpdb;
		global $jal_db_version;
		if($wpdb->get_var("SHOW TABLES LIKE '$this->table_name'") != $this->table_name) {

			//作成
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($this->sql());
			
			$this->first_insert();
			//オプション追加
			add_option($this->table . "_db_version", $this->version);
		}
	}

	public function first_insert() {
		global $wpdb;
		$title = $wpdb->escape("初めての投稿です");
		$contents = $wpdb->escape("インストールが完了しました");
		$wpdb->insert(
			$this->table_name,
            array( 'title' => $title, 'contents' => $contents ),
        	array( '%s', '%s' )
        );
	}

	public function deactivation() {
	}

	public function uninstall() {
	    global $wpdb;
	    $wpdb->query("DROP TABLE IF EXISTS $this->table_name");
		delete_option($this->table . "_db_version");
	}
}
