<?php
class Sample_SeoSetting extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action( 'add_meta_boxes', array($this, 'init'));
		add_action('save_post', array($this, 'save'));
	}

	public function init () {
		add_meta_box('sample_seo_setting', 'SEO設定', array($this, 'setting'), 'post', 'normal', 'high');
	}

	public function setting() {
		//編集中の記事に関するデータを保存
		global $post;
		//CSRF対策の設定（フォームにhiddenフィールドとして追加するためのnonceを「'my_nonce」として設定）
		wp_nonce_field(wp_create_nonce(__FILE__), 'sample_seo_setting_hidden');
		//画面表示
		$out = array();
		$out['test']		= "テスト";
		$out['keywords']	= esc_html(get_post_meta($post->ID, 'sample_seo_setting_keywords', true));
		$out['description']	= esc_html(get_post_meta($post->ID, 'sample_seo_setting_description', true));
 		$this->load_view($out);
	}

	public function load_view($vars = array(), $err = array()) {
		extract($vars, EXTR_PREFIX_ALL, 'out');
		extract($err,  EXTR_PREFIX_ALL, 'error');
		include_once 'views/index.tpl';
	}


	public function save() {
		global $post;
		$keywords = isset($_POST['sample_seo_setting_keywords']) ? $_POST['sample_seo_setting_keywords'] : '';
		$description = isset($_POST['sample_seo_setting_description']) ? $_POST['sample_seo_setting_description'] : '';
		var_dump($keywords);
		
	}

}