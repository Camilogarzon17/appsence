<?php 
$service = new serviceController();
$function = new functionModel();
if ($_POST['crud'] == "add-serv") {
	$category_data = array(
		'serv_nom' => $_POST['serv_nom'],
		'serv_des' => $_POST['serv_des'],
		'serv_usua_fk' => $_SESSION['usua_id']
	);
	$ejecutar = $service->ins($category_data);
	header("Location: servicios&alert=1&text=Categoria registrada con exito");
}else if($_POST['crud'] == "edi-serv"){
	$category_data = array(
		'serv_id' => $_POST['serv_id'],
		'serv_nom' => $_POST['serv_nom'],
		'serv_des' => $_POST['serv_des'],
		'serv_usua_fk' => $_SESSION['usua_id']
	);
	$ejecutar = $service->upd($category_data);
	header("Location: servicios&alert=1&text=Categoria modificada con exito");
}else if($_POST['crud'] == "del-serv"){
	$ejecutar = $service->del($_POST['serv_id']);
	header("Location: servicios&alert=1&text=Categoria ".$_POST['serv_id']." eliminada con exito");
	exit;	
}else if($_POST['crud'] == "add-sdet"){
	$service_data = array(
		'sdet_nom' => $_POST['sdet_nom'],
		'sdet_des' => $_POST['sdet_des'],
		'sdet_gar' => $_POST['sdet_gar'],
		'sdet_val' => $_POST['sdet_val'],
		'sdet_serv_fk' => $_POST['sdet_serv_fk']
	);
	$ejecutar = $service->ins_service($service_data);
	header("Location: servicios&alert=1&text=Servicio registrado con exito");
	exit;
}else if($_POST['crud'] == "edi-sdet"){
	$service_data = array(
		'sdet_id' => $_POST['sdet_id'],
		'sdet_nom' => $_POST['sdet_nom'],
		'sdet_des' => $_POST['sdet_des'],
		'sdet_gar' => $_POST['sdet_gar'],
		'sdet_val' => $_POST['sdet_val'],
		'sdet_serv_fk' => $_POST['sdet_serv_fk']
	);
	$ejecutar = $service->upd_service($service_data);
	header("Location: servicios&alert=1&text=Servicio modificado con exito");
	exit;
}else if($_POST['crud'] == "del-sdet"){
	$ejecutar = $service->del_service($_POST['sdet_id']);
	header("Location: servicios&alert=1&text=Servicio ".$_POST['serv_id']." eliminada con exito");
	exit;	
}
 ?>