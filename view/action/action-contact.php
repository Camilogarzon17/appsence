<?php 
$request = new requestController();
 if ($_POST['envi-form'] == 'form-contact'){
 	$request_data = array(
 		'soli_nom' => $_POST['soli_nom'],
 		'soli_ema' => $_POST['soli_ema'],
 		'soli_cel' => $_POST['soli_cel'],
 		'soli_ciu' => $_POST['soli_ciu'],
 		'soli_emp' => $_POST['soli_emp'],
 		'soli_serv_fk' => $_POST['soli_serv_fk'],
 		'soli_asu' => $_POST['soli_asu'], 
 		'soli_men' => $_POST['soli_men'],
 		'soli_fec' => strftime("%Y-%m-%d")
 	);
 	$r = (empty($_GET['r']))? "inicio": $_GET['r'];
 	$request->ins($request_data);
 	header("Location: ".$r."&alert=1&text=Solicitud envida con exito");
 }