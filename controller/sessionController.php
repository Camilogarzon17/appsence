<?php
class sessionController{
	private $session;

	public function __construct() {
		$this->session = new userModel();
	}
	public function login($user, $pass ='') {
		return $this->session->validate_user($user, $pass);
	}
	public function newHistory($user, $pass ='') {
		return $this->session->ins_historial($user, $pass);
	}
	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./&alert=1&text=Sesión cerrada con exito!');
	}
}
?>