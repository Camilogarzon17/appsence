<?php
	require_once('./controller/autoload.php');
	$autoload = new autoload();
	$router = isset($_GET['r']) ? $_GET['r'] : 'inicio';
	$develtec = new router($router);
