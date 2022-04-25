<?php 
class viewController{

	private static $view_path = './view/';
	public function load_module($module) {
	}
	public function load_view($view) {
		require_once( self::$view_path . 'modules/header.php' );
		require_once( self::$view_path . $view . '.php' );	
	}

	public function load_page($view) {
		require_once(self::$view_path.$view.'.php');
	}
}
