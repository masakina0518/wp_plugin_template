<?php
class Sample_CustomAdminFooter extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_filter( 'admin_footer_text', array($this, 'init'));
	}

	public function init( $text ) {
		echo '<a href="mailto:xxx@zzz">お問い合わせ</a>';
	}
}