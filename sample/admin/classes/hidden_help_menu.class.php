<?php
class Sample_hiddenHelpMenu extends Sample_PluginSetting {

	public function __construct(){
		parent::__construct();
		add_action( 'admin_head', array($this, 'init'));
	}

	public function init() {
		echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
	}
}